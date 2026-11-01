<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HeroSection;
use App\Models\Hotel;
use App\Models\Message;
use App\Models\Promo;
use App\Models\SEOSetting;
use App\Models\Setting;
use App\Models\Tour;
use App\Models\TourGuide;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Full-page cache for guests to serve pre-rendered HTML fast
        $homeCacheKey = null;
        if (!auth()->check() && request()->method() === 'GET') {
            $homeCacheKey = 'home_fullpage_' . app()->getLocale();
            if (Cache::has($homeCacheKey)) {
                return response(Cache::get($homeCacheKey), 200)
                    ->header('Cache-Control', 'public, max-age=300');
            }
        }

        $seoSettings = SEOSetting::where('page_name', 'homepage')->first();

        $title = $seoSettings->meta_title;
        $descriptionSeo = $seoSettings->meta_description;
        $keywords = $seoSettings->meta_keywords;
        $ogTitle = $title;
        $ogDescription = $descriptionSeo;
        $ogImage = asset('storage/' . ($seoSettings->seo_image));
        $canonicalUrl = url()->current();

        // Cache these settings to avoid multiple database queries
        $settings = Cache::remember('homepage_settings', 3600, function () {
            return [
                'hero_section' => HeroSection::first(),
                'homepage_style' => Setting::where('key', 'homepage_style')->first()->value ?? 'static',
                'static_homepage' => Setting::where('key', 'static_homepage')->first()->value ?? 'home1',
                'change_interval' => Setting::where('key', 'change_interval')->first()->value ?? '1_hour'
            ];
        });

        $heroSection = $settings['hero_section'];
        $style = $settings['homepage_style'];
        $staticHomepage = $settings['static_homepage'];
        $changeInterval = $settings['change_interval'];
        // Cache tours and hotels to avoid expensive queries
        $tours = Cache::remember('homepage_tours', 1800, function () {
            return Tour::with(['pricing'])
                ->inRandomOrder()
                ->take(30)
                ->get();
        });

        $hotels = Cache::remember('homepage_hotels', 1800, function () {
            return Hotel::with(['destination'])
                ->where('status', 'active')
                ->take(30)
                ->get();
        });

        // Cache the featured hotel
        $hotelData = Cache::remember('featured_hotel', 3600, function () {
            $hotel = Hotel::where('status', 'active')
                ->with(['destination', 'reviews'])
                ->first();

            if (!$hotel) {
                return ['hotel' => null, 'rating' => 0];
            }

            $totalAverageRating = $hotel->reviews->count() > 0
                ? $hotel->reviews->sum('average_rating') / $hotel->reviews->count()
                : 0;

            return ['hotel' => $hotel, 'rating' => $totalAverageRating];
        });

        $hotel = $hotelData['hotel'];
        $totalAverageRating = $hotelData['rating'];

         // Cache destinations and related data
         $destinationData = Cache::remember('homepage_destinations', 3600, function () {
             $featuredDestinations = Destination::with(['tours', 'hotels'])->get();
             return [
                 'featured' => $featuredDestinations,
                 'countries' => $featuredDestinations->pluck('country')->unique()->shuffle()->take(5),
                 'all' => Destination::all(),
                 'types' => Type::all(),
                 'amenities' => Amenity::all()
             ];
         });

         $featuredDestinations = $destinationData['featured'];
         $countries = $destinationData['countries'];
         $destinations = $destinationData['all'];
         $types = $destinationData['types'];
         $amenities = $destinationData['amenities'];

         // Cache popular tours and random hotels
         $popularTours = Cache::remember('popular_tours', 3600, function () {
             return Tour::withCount('views')
                 ->orderBy('views_count', 'desc')
                 ->take(4)
                 ->get();
         });

         $randomHotels = Cache::remember('random_hotels', 1800, function () {
             return Hotel::where('status', 'active')
                 ->with(['destination'])
                 ->inRandomOrder()
                 ->take(4)
                 ->get();
         });


            // Fetch recent reviews more efficiently using cache but maintain object structure
            $reviews = Cache::remember('recent_reviews', 1800, function () {
                // Get recent hotel reviews with proper relationships
                $hotelReviews = \App\Models\Review::with(['user', 'reviewable'])
                    ->where('reviewable_type', 'App\\Models\\Hotel')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();

                // Get recent tour reviews with proper relationships
                $tourReviews = \App\Models\Review::with(['user', 'reviewable'])
                    ->where('reviewable_type', 'App\\Models\\Tour')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();

                // Merge and sort
                return $hotelReviews->merge($tourReviews)->sortByDesc('created_at')->take(20);
            });



        if ($style == 'dynamic') {
            $views = ['front.homes.home1', 'front.homes.home2', 'front.homes.home3'];
            $viewName = $views[array_rand($views)];
        } elseif ($style == 'timed') {
            $viewName = $this->getTimedViewName($changeInterval);
        } else {
            $viewName = 'front.homes.' . $staticHomepage;
        }

        $promo = Cache::remember('popup_promo', 1800, function () {
            return Promo::where('status', 'active')->where('popup', true)->inRandomOrder()->first();
        });

        // Render and optionally cache full HTML for guests
        $html = view($viewName, compact('heroSection', 'amenities', 'types', 'destinations', 'randomHotels', 'reviews', 'promo', 'tours', 'hotels', 'totalAverageRating', 'hotel', 'featuredDestinations', 'countries', 'popularTours', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'))
            ->render();

        if ($homeCacheKey) {
            Cache::put($homeCacheKey, $html, now()->addMinutes(5));
        }

        return response($html, 200)->header('Cache-Control', 'public, max-age=300');
    }

    private function getTimedViewName($interval)
    {
        $views = ['front.homes.home1', 'front.homes.home2', 'front.homes.home3'];
        $index = $this->calculateIndexBasedOnInterval($interval, $views);
        return $views[$index];
    }

    private function calculateIndexBasedOnInterval($interval, $views)
    {
        $time = now()->timestamp;
        switch ($interval) {
            case '1_hour':
                return $time / 3600 % count($views);
            case '24_hours':
                return $time / 86400 % count($views);
            case '1_week':
                return $time / 604800 % count($views);
            case '1_month':
                return $time / 2592000 % count($views);
            default:
                return 0;
        }
    }

    public function about() {

        $seoSettings = SEOSetting::where('page_name', 'about_us')->first();

        $title = $seoSettings->meta_title;
        $descriptionSeo = $seoSettings->meta_description;
        $keywords = $seoSettings->meta_keywords;
        $ogTitle = $title;
        $ogDescription = $descriptionSeo;
        $ogImage = asset('storage/' . ($seoSettings->seo_image));
        $canonicalUrl = url()->current();

        $tourGuides = TourGuide::inRandomOrder()
        ->take(3)
        ->get();

            // Use the same cached reviews from homepage
            $reviews = Cache::remember('recent_reviews', 1800, function () {
                // Get recent hotel reviews with proper relationships
                $hotelReviews = \App\Models\Review::with(['user', 'reviewable'])
                    ->where('reviewable_type', 'App\\Models\\Hotel')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();

                // Get recent tour reviews with proper relationships
                $tourReviews = \App\Models\Review::with(['user', 'reviewable'])
                    ->where('reviewable_type', 'App\\Models\\Tour')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();

                // Merge and sort
                return $hotelReviews->merge($tourReviews)->sortByDesc('created_at')->take(20);
            });

        return view('front.about.index', compact('tourGuides', 'reviews', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }

    public function contact() {

        $seoSettings = SEOSetting::where('page_name', 'contact_us')->first();

        $title = $seoSettings->meta_title;
        $descriptionSeo = $seoSettings->meta_description;
        $keywords = $seoSettings->meta_keywords;
        $ogTitle = $title;
        $ogDescription = $descriptionSeo;
        $ogImage = asset('storage/' . ($seoSettings->seo_image));
        $canonicalUrl = url()->current();
        return view('front.contact.index', compact('title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }

    public function Contactstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        sweetalert()->success('Your message has been sent successfully.');
        return redirect()->back();
    }

    public function destinations() {

        $seoSettings = SEOSetting::where('page_name', 'destinations')->first();

        $title = $seoSettings->meta_title;
        $descriptionSeo = $seoSettings->meta_description;
        $keywords = $seoSettings->meta_keywords;
        $ogTitle = $title;
        $ogDescription = $descriptionSeo;
        $ogImage = asset('storage/' . ($seoSettings->seo_image));
        $canonicalUrl = url()->current();
        // $destinations = Destination::inRandomOrder()->withCount(['tours', 'hotels'])->get();

        $destinations = Destination::inRandomOrder()
    ->withCount([
        'tours', // Count all tours (no status)
        'hotels' => function ($query) {
            $query->where('status', 'active'); // Only count active hotels
        }
    ])
    ->get();


        return view('front.destinations.index', compact('destinations', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }

    public function DestinatonnShow($slug)
    {
        // $seoSettings = SEOSetting::where('page_name', 'tours')->first();



        $destination = Destination::where('slug', $slug)->firstOrFail();

                   // Fetch SEO settings from the database (optional: if there are predefined SEO settings for tours)
    $seoSettings = SEOSetting::where('page_name', 'destination_show')->first();
    $settings = Setting::pluck('value', 'key')->toArray();
    // Generate SEO data using the tour details
    $title = $settings['site_name'] . " - " . $destination->name;

    $descriptionSeo = $seoSettings->meta_description ?? strip_tags(substr($destination->description, 0, 150));
    $keywords = $seoSettings->meta_keywords ?? implode(', ', ['destinations', 'travel', $destination->name, $destination->country ?? '']);
    $ogTitle = $title;
    $ogDescription = $descriptionSeo;

    // Decode the images JSON string
    $images = $destination->images;
    $ogImage = '';

    // Check if images array is valid and not empty
    if (is_array($images) && count($images) > 0) {
        $ogImage = Storage::url($images[0]); // Use the first image from the decoded array
    } else {
        $ogImage = asset('seo/default-image.png'); // Default image if none exists
    }


    $canonicalUrl = url()->current();


        if ($destination->faq) {
            $destination->faq = json_decode($destination->faq, true);
        }
        $desTour =  $destination->tours;

        $desHotel =  $destination->hotels()->where('status', 'active')->get();

        $hotels = $destination->hotels()->where('status', 'active')->get();
        $tours = $destination->tours()->get();
        $randomPromo = Promo::where('status', 'active')->inRandomOrder()->first();
        // Merge and shuffle hotels and tours randomly
        $randomAll = $hotels->merge($tours)->shuffle();
        $hotel = $hotels->first(); // Define the $hotel variable
        $tour = $tours->first(); // Define the $tour variable

        return view('front.destinations.show', compact('destination', 'desTour', 'randomAll', 'hotel', 'tour', 'desHotel', 'randomPromo', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }


    public function tours(Request $request)
    {

        $seoSettings = SEOSetting::where('page_name', 'tours')->first();

        $title = $seoSettings->meta_title;
        $descriptionSeo = $seoSettings->meta_description;
        $keywords = $seoSettings->meta_keywords;
        $ogTitle = $title;
        $ogDescription = $descriptionSeo;
        $ogImage = asset('storage/' . ($seoSettings->seo_image));
        $canonicalUrl = url()->current();

        // Fetch all destinations, types, and amenities for the search form
        $destinations = Destination::all();
        $types = Type::all();
        $amenities = Amenity::all();

        // Start with all tours, eager loading relationships for performance
        $tours = Tour::with(['pricing', 'amenities', 'reviews']);

        // Filter by Destination
        if ($request->filled('location')) {
            $tours->where('destination_id', $request->location);
        }

        // Filter by Type
        if ($request->filled('type')) {
            $tours->where('type_id', $request->type);
        }

        // Filter by Price Range (only resident price for the current month)
        $priceRange = $request->input('price_range');
        $currentMonthName = strtolower(Carbon::now()->format('M')); // Get the current month name in short format

        if ($priceRange) {
            [$minPrice, $maxPrice] = explode('-', $priceRange . '-');
            $maxPrice = $maxPrice === '+' ? null : $maxPrice;

            $tours->whereHas('pricing', function ($query) use ($minPrice, $maxPrice, $currentMonthName) {
                $query->where("{$currentMonthName}_resident_price", '>=', $minPrice);
                if ($maxPrice) {
                    $query->where("{$currentMonthName}_resident_price", '<=', $maxPrice);
                }
            });
        }

        // Filter by Amenities
        if ($request->filled('amenities')) {
            $selectedAmenities = $request->amenities;
            $tours->whereHas('amenities', function ($query) use ($selectedAmenities) {
                $query->whereIn('amenity_id', $selectedAmenities);
            });
        }
        $randomTours = Tour::inRandomOrder()->take(10)->with(['pricing', 'amenities'])->get();

                 // Apply Sorting Logic based on the selection
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 1: // Sort by Views
                $tours->withCount('views')->orderBy('views_count', 'desc');
                break;
            case 2: // Sort by Price (Resident price for current month)
                $tours->join('pricings', function ($join) use ($currentMonthName) {
                    $join->on('pricings.package_id', '=', 'tours.id')
                         ->where('pricings.package_type', Tour::class);
                })->orderBy("pricings.{$currentMonthName}_resident_price", 'asc');
                break;
            case 3: // Sort by Latest
                $tours->orderBy('created_at', 'desc');
                break;
            case 4: // Sort by Oldest
                $tours->orderBy('created_at', 'asc');
                break;
            case 5: // Sort Randomly
                $tours->inRandomOrder();
                break;
            default:
                $tours->orderBy('created_at', 'desc');
                break;
        }
    } else {
        $tours->orderBy('created_at', 'desc'); // Default sorting
    }

        // Paginate the results for display
        $tours = $tours->paginate(6);




        return view('front.tours.index', compact('tours', 'destinations', 'types', 'amenities', 'randomTours', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }


    public function TourShow($slug)

   {

         // Find the tour by slug, not ID
         $tour = Tour::with(['amenities', 'reviews'])->where('slug', $slug)->firstOrFail();


    // Fetch SEO settings from the database (optional: if there are predefined SEO settings for tours)
    $seoSettings = SEOSetting::where('page_name', 'tour_show')->first();
    $settings = Setting::pluck('value', 'key')->toArray();
    // Generate SEO data using the tour details
    $title = $settings['site_name'] . " - " . $tour->name;

    $descriptionSeo = $seoSettings->meta_description ?? strip_tags(substr($tour->overview, 0, 150));
    $keywords = $seoSettings->meta_keywords ?? implode(', ', ['tours', 'travel', $tour->name, $tour->destination->name ?? '']);
    $ogTitle = $title;
    $ogDescription = $descriptionSeo;

// Decode the images JSON string
$images = json_decode($tour->images, true);
$ogImage = '';

// Check if images array is valid and not empty
if (is_array($images) && count($images) > 0) {
    // Normalize the slashes to handle escaped paths
    $normalizedPath = str_replace('\\', '/', $images[0]);
    $ogImage = Storage::url($normalizedPath); // Use the first image from the decoded array
} else {
    $ogImage = asset('seo/default-image.png'); // Default image if none exists
}



    $canonicalUrl = url()->current();


        // Decode the JSON string of amenity IDs
        $amenityIds = json_decode($tour->amenities, true); // true converts it to an array

        // Fetch the amenities based on the decoded IDs
        $tour->amenities = Amenity::whereIn('id', $amenityIds)->get();

            // Retrieve similar tours based on the same destination (excluding the current tour)
    $similarTours = Tour::inRandomOrder()->with(['amenities', 'destination'])
    ->where('destination_id', $tour->destination_id)
    ->where('id', '!=', $tour->id) // Exclude the current tour
    ->take(2) // Limit to 2 similar tours
    ->get();


        $currentPricing = $tour->pricing->current_month_pricing;
        $randomTours = Tour::inRandomOrder()->take(10)->with(['destination', 'pricing'])->get();

        // Get the user's IP address
        $ipAddress = request()->ip();

        // Check if the view has already been counted for this IP
        if (!$tour->views()->where('ip_address', $ipAddress)->exists()) {
            // Create a new view record
            $tour->views()->create(['ip_address' => $ipAddress]);
        }

                       // Calculate total average rating
                       $totalAverageRating = $tour->reviews->count() > 0
                       ? $tour->reviews->sum('average_rating') / $tour->reviews->count()
                       : 0;
                       $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's

                       $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; //
        return view('front.tours.show', compact('tour','image', 'settings', 'currentPricing', 'similarTours', 'randomTours', 'totalAverageRating', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
    }





public function hotel(Request $request)
{

    $seoSettings = SEOSetting::where('page_name', 'hotels')->first();

    $title = $seoSettings->meta_title;
    $descriptionSeo = $seoSettings->meta_description;
    $keywords = $seoSettings->meta_keywords;
    $ogTitle = $title;
    $ogDescription = $descriptionSeo;
    $ogImage = asset('storage/' . ($seoSettings->seo_image));
    $canonicalUrl = url()->current();

    // Get all destinations and amenities for the filter options
    $destinations = Destination::all();
    $amenities = Amenity::all();

    // Start building the query for active hotels
    $query = Hotel::with(['destination', 'rooms', 'amenities', 'reviews'])
        ->where('status', 'active');

    // Apply filters based on request input

    // If a location is selected, filter by destination
    if ($request->filled('location') && $request->location !== 'select') {
        $query->where('destination_id', $request->location);
    }

    // Apply price range filter if provided
    if ($request->filled('price_range')) {
        $priceRange = explode('-', $request->price_range);
        $minPrice = (int) $priceRange[0];
        $maxPrice = isset($priceRange[1]) ? (int) $priceRange[1] : null;

        // Filter hotels based on room prices
        $query->whereHas('rooms', function ($subQuery) use ($minPrice, $maxPrice) {
            $subQuery->where('is_available', true); // Only consider available rooms
            $subQuery->where('price', '>=', $minPrice);
            if ($maxPrice) {
                $subQuery->where('price', '<=', $maxPrice);
            }
        });
    }

    // Apply guests filter if provided
    if ($request->filled('guests')) {
        $guests = (int) $request->guests;

        // Filter hotels that have at least one room that can accommodate the guests
        $query->whereHas('rooms', function ($subQuery) use ($guests) {
            $subQuery->where('capacity', '>=', $guests)
                      ->where('is_available', true);
        });
    }

    // Apply amenities filter if provided
    if ($request->filled('amenities')) {
        $amenityIds = $request->amenities;

        // Filter hotels that have all the selected amenities
        $query->whereHas('amenities', function ($subQuery) use ($amenityIds) {
            $subQuery->whereIn('amenities.id', $amenityIds);
        }, '=', count($amenityIds));
    }


    // Get filtered hotels
    $hotels = $query->distinct()->paginate(9);

    return view('front.hotels.index', compact('hotels', 'destinations', 'amenities', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
}



                public function hotelShow($slug)
        {

            $hotel = Hotel::where('slug', $slug)
                        ->where('status', 'active')
                        ->with(['destination', 'rooms', 'reviews']) // Only eager load destination and rooms
                        ->firstOrFail();


            // Fetch SEO settings from the database (optional: if there are predefined SEO settings for tours)
    $seoSettings = SEOSetting::where('page_name', 'hotel_show')->first();
    $settings = Setting::pluck('value', 'key')->toArray();
    // Generate SEO data using the tour details
    $title = $settings['site_name'] . " - " . $hotel->name;

    $descriptionSeo = $seoSettings->meta_description ?? strip_tags(substr($hotel->overview, 0, 150));
    $keywords = $seoSettings->meta_keywords ?? implode(', ', ['hotels', 'travel', $hotel->name, $hotel->destination->name ?? '']);
    $ogTitle = $title;
    $ogDescription = $descriptionSeo;

    // Decode the images JSON string
    $images = $hotel->images;
    $ogImage = '';

    // Check if images array is valid and not empty
    if (is_array($images) && count($images) > 0) {
        $ogImage = url($images[0]); // Use the first image from the decoded array
    } else {
        $ogImage = asset('seo/default-image.png'); // Default image if none exists
    }


    $canonicalUrl = url()->current();



            // Decode the JSON array of amenity IDs and fetch the actual amenities
            $amenityIds = json_decode($hotel->amenities, true); // Decodes the JSON array
            $hotel->amenities = Amenity::whereIn('id', $amenityIds)->get(); // Get Amenity models

                // Fetch similar hotels within the same destination
            $similarHotels = Hotel::where('destination_id', $hotel->destination_id) // Same destination
            ->where('id', '!=', $hotel->id) // Exclude the current hotel
            ->where('status', 'active') // Only active hotels
            ->inRandomOrder()
            ->with(['amenities', 'destination']) // Eager load relationships
            ->get();

             $randomHotels = Hotel::where('status', 'active')->inRandomOrder()->take(10)->with(['destination', 'amenities'])->get();

               // Calculate total average rating
               $totalAverageRating = $hotel->reviews->count() > 0
               ? $hotel->reviews->sum('average_rating') / $hotel->reviews->count()
               : 0;

            $rooms = $hotel->rooms;
            return view('front.hotels.show', compact('hotel', 'similarHotels', 'randomHotels', 'rooms', 'totalAverageRating', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
        }

        public function eventShow($slug)
        {



            $event = Event::with('amenities')->where('slug', $slug)->firstOrFail();
            // This will fetch the event with the given slug or fail with a 404 if not found
           // Fetch SEO settings from the database (optional: if there are predefined SEO settings for tours)
           $seoSettings = SEOSetting::where('page_name', 'event_show')->first();
           $settings = Setting::pluck('value', 'key')->toArray();
           // Generate SEO data using the tour details
           $title = $settings['site_name'] . " - " . $event->name;

           $descriptionSeo = $seoSettings->meta_description ?? strip_tags(substr($event->overview, 0, 150));
           $keywords = $seoSettings->meta_keywords ?? implode(', ', ['events', 'travel', $event->name, $tour->destination->name ?? '']);
           $ogTitle = $title;
           $ogDescription = $descriptionSeo;

           // Decode the images JSON string
           $images =  $event->images ;
           $ogImage = '';

           // Check if images array is valid and not empty
           if (is_array($images) && count($images) > 0) {
               $ogImage = asset('storage/' . $images[0]); // Use the first image from the decoded array
           } else {
               $ogImage = asset('seo/default-image.png'); // Default image if none exists
           }


           $canonicalUrl = url()->current();



            return view('front.events.show', compact('event', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl'));
        }


        public function faqIndex()
        {

            $seoSettings = SEOSetting::where('page_name', 'faqs')->first();

            $title = $seoSettings->meta_title;
            $descriptionSeo = $seoSettings->meta_description;
            $keywords = $seoSettings->meta_keywords;
            $ogTitle = $title;
            $ogDescription = $descriptionSeo;
            $ogImage = asset('storage/' . ($seoSettings->seo_image));
            $canonicalUrl = url()->current();

            $faqs = Faq::all(); // Retrieves all FAQs from the database
            return view('front.faqs.index', compact('faqs', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl')); // Returns the view with FAQs data
        }

        public function galleryIndex()
        {

            $seoSettings = SEOSetting::where('page_name', 'gallery')->first();

            $title = $seoSettings->meta_title;
            $descriptionSeo = $seoSettings->meta_description;
            $keywords = $seoSettings->meta_keywords;
            $ogTitle = $title;
            $ogDescription = $descriptionSeo;
            $ogImage = asset('storage/' . ($seoSettings->seo_image));
            $canonicalUrl = url()->current();

            $galleries = Gallery::paginate(9); // Fetch all gallery entries
            return view('front.gallery.index', compact('galleries', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl')); // Return the view with gallery data
        }

        public function guideIndex()
        {

            $seoSettings = SEOSetting::where('page_name', 'guides')->first();

            $title = $seoSettings->meta_title;
            $descriptionSeo = $seoSettings->meta_description;
            $keywords = $seoSettings->meta_keywords;
            $ogTitle = $title;
            $ogDescription = $descriptionSeo;
            $ogImage = asset('storage/' . ($seoSettings->seo_image));
            $canonicalUrl = url()->current();

            $tourGuides = TourGuide::all(); // Fetch all tour guides from the database
            return view('front.guides.index', compact('tourGuides', 'title', 'descriptionSeo', 'keywords', 'ogTitle', 'ogDescription', 'ogImage', 'canonicalUrl')); // Assuming the view for displaying tour guides is 'home.blade.php'
        }










}