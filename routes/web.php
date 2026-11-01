<?php

use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\EmailMarketingController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SEOSettingController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TicketAdminController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Auth\LoginController as AuthLogin;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\User\ProfileSettingsController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Middleware\AdminAuthenticated;
use App\Http\Middleware\Check2FA;
use App\Http\Middleware\CheckMaintenanceMode;
use App\Http\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\ForceHttps;
use App\Http\Middleware\UserAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

























        Route::get('storage/{filename}', function ($filename) {
            $path = storage_path('app/public/' . $filename);

            if (!Storage::disk('public')->exists($filename)) {
                abort(404);
            }

            return response()->file($path);
        })->where('filename', '.*');

Route::middleware(ForceHttps::class)->group(function () {



        Route::prefix('admin')->name('admin.')->group(function () {

            Route::get('/', function () {
                if (Auth::guard('admin')->check()) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('admin.login');
                }
            });
            Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('/login', [LoginController::class, 'login']);
            Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

            Route::middleware(AdminAuthenticated::class.':admin')->group(function () {

                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
                Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
                Route::post('/profile/picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.updatePicture');
                Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
                Route::post('/profile/deactivate', [ProfileController::class, 'deactivate'])->name('profile.deactivate');

                Route::resource('messages', MessagesController::class)->only(['index', 'show', 'destroy']);
                Route::post('/messages/mark-all-as-read', [MessagesController::class, 'markAllAsRead'])->name('messages.markAllAsRead');

                Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
                Route::get('settings/general', [SettingsController::class, 'general'])->name('settings.general');
                Route::post('settings/general', [SettingsController::class, 'updateGeneral'])->name('settings.general.update');
                Route::get('settings/logo', [SettingsController::class, 'logo'])->name('settings.logo');
                Route::post('settings/logo', [SettingsController::class, 'updateLogo'])->name('settings.logo.update');
                Route::get('settings/sections', [SettingsController::class, 'showSections'])->name('settings.sections');
                Route::post('settings/sections', [SettingsController::class, 'updateSections'])->name('settings.sections.update');
                Route::get('settings/custom-code', [SettingsController::class, 'showCustomCode'])->name('settings.custom_code');
                Route::post('settings/custom-code', [SettingsController::class, 'updateCustomCode'])->name('settings.custom_code.update');
                Route::get('settings/email', [SettingsController::class, 'email'])->name('settings.email');
                Route::post('settings/email', [SettingsController::class, 'updateEmail'])->name('settings.email.update');
                Route::post('/settings/email/test', [SettingsController::class, 'testEmail'])->name('settings.email.test');

                Route::get('/settings/configurations', [SettingsController::class, 'configurations'])->name('settings.configurations');
                Route::post('/settings/configurations/style', [SettingsController::class, 'updateStyle'])->name('settings.style.update');
                Route::post('settings/email-confirmation', [SettingsController::class, 'emailConfirm'])->name('settings.emailConfirm');
                Route::post('settings/force-https', [SettingsController::class, 'forceHttps'])->name('settings.forceHttps');
                Route::post('/settings/maintenance', [SettingsController::class, 'updateMaintenanceMode'])->name('settings.maintenance.update');
                                    // web.php
                Route::get('/settings/about-us', [SettingsController::class, 'AboutIndex'])->name('settings.about-us.index');
                Route::post('/settings/about-us', [SettingsController::class, 'AboutUpdate'])->name('settings.about-us.update');

                Route::get('seo', [SEOSettingController::class, 'index'])->name('seo.index');
                Route::put('seo', [SEOSettingController::class, 'update'])->name('seo.update');


                Route::resource('pages', PageController::class)->except(['show']);
                // Route::delete('pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');

                Route::get('menus/{id?}', [MenuController::class, 'index'])->name('menus.index');
                Route::post('menus/save', [MenuController::class, 'save'])->name('menus.save.create');
                Route::patch('menus/{id?}/save', [MenuController::class, 'save'])->name('menus.save');
                Route::delete('menus/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
                Route::get('menus/data/{id}', [MenuController::class, 'getMenuData'])->name('menus.data');

                Route::resource('users', UsersController::class);
                Route::resource('destinations', DestinationController::class);
                Route::post('destinations/upload-image', [DestinationController::class, 'uploadImage'])->name('destinations.uploadImage');
                Route::post('destinations/remove-image/{index}', [DestinationController::class, 'removeImage'])->name('destinations.removeImage');
                Route::resource('types', TypeController::class)->except(['show', 'edit', 'create']);
                Route::resource('amenities', AmenityController::class)->except(['show', 'edit', 'create']);
                Route::resource('tours', TourController::class);
                Route::post('tours/upload-image', [TourController::class, 'uploadImage'])->name('tours.uploadImage');
                Route::post('tours/remove-image/{index}', [TourController::class, 'removeImage'])->name('tours.removeImage');
                Route::resource('hotels', HotelController::class);
                Route::post('hotels/{hotel}/add-room', [HotelController::class, 'addRoom'])->name('hotels.addRoom');

                Route::delete('hotels/{hotel}/rooms/{room}', [HotelController::class, 'destroyRoom'])->name('hotels.rooms.destroy');
                Route::put('hotels/{hotel}/rooms/{room}', [HotelController::class, 'updateRoom'])->name('hotels.rooms.update');

                Route::get('/bookings', [BookingController::class, 'Adminindex'])->name('bookings.index');
                // Route::get('/bookings/edit/{id}', [BookingController::class, 'Adminedit'])->name('bookings.edit');
                Route::patch('/bookings/update/{id}', [BookingController::class, 'updateBookingStatus'])->name('bookings.update');
                Route::get('/bookings/invoice/{id}', [BookingController::class, 'downloadInvoice'])->name('bookings.invoice');

                    // Review Management Routes
                Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
                Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
                Route::post('/reviews/{review}/reply', [ReviewController::class, 'reply'])->name('reviews.reply');

                    // Event Management
                Route::get('events', [EventController::class, 'index'])->name('events.index');
                Route::get('events/create', [EventController::class, 'create'])->name('events.create');
                Route::post('events', [EventController::class, 'store'])->name('events.store');
                Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
                Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
                Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

                    // Promo Event Routes
                Route::get('/promos', [EventController::class, 'promoIndex'])->name('promos.index');
                Route::post('/promos', [EventController::class, 'promoStore'])->name('promos.store');
                Route::put('/promos/{promo}', [EventController::class, 'promoUpdate'])->name('promos.update');
                Route::delete('/promos/{promo}', [EventController::class, 'promoDestroy'])->name('promos.destroy');
                Route::post('/promos/{promo}/remove-image', [EventController::class, 'removeImage'])->name('promos.remove-image');

                Route::get('/events/bookings', [EventBookingController::class, 'adminIndex'])->name('event.bookings.index');
                Route::patch('/events/bookings/{bookingId}', [EventBookingController::class, 'updateBookingStatus'])->name('event.bookings.update');

                Route::resource('faqs', FaqController::class);
                Route::resource('galleries', GalleryController::class)->except(['show', 'edit', 'update']);

                Route::resource('subscribers', SubscriberController::class);
                Route::post('subscribers/import', [SubscriberController::class, 'import'])->name('subscribers.import');
                Route::get('emails/create', [EmailMarketingController::class, 'create'])->name('emails.create');
                Route::post('emails/store', [EmailMarketingController::class, 'store'])->name('emails.store');
                Route::post('/emails/resend/{campaign}', [EmailMarketingController::class, 'resend'])->name('emails.resend');
                Route::get('emails', [EmailMarketingController::class, 'index'])->name('emails.index');
                    // Tour Guide Routes
                Route::get('/members', [TourGuideController::class, 'index'])->name('tourGuides.index');
                Route::post('/members', [TourGuideController::class, 'store'])->name('tourGuides.store');
                Route::put('/members/{tourGuide}', [TourGuideController::class, 'update'])->name('tourGuides.update');
                Route::delete('/members/{tourGuide}', [TourGuideController::class, 'destroy'])->name('tourGuides.destroy');









                    Route::get('tickets', [TicketAdminController::class, 'index'])->name('tickets.index');
                    Route::post('tickets/{ticket}/reply', [TicketAdminController::class, 'reply'])->name('tickets.reply');
                    Route::patch('tickets/{ticket}/status', [TicketAdminController::class, 'changeStatus'])->name('tickets.status');
                    Route::get('/tickets/{ticketId}', [TicketAdminController::class, 'show'])->name('tickets.show');


                Route::prefix('homepages')->name('homepages.')->group(function () {
                    Route::get('/', [HomePageController::class, 'index'])->name('index');
                    Route::get('homepage-1', [HomePageController::class, 'Homepage1'])->name('homepage1');
                    Route::get('homepage-1/hero', [HomePageController::class, 'Home1Heroedit'])->name('homepage1.hero.edit');
                    Route::post('homepage-1/hero', [HomePageController::class, 'Home1Heroupdate'])->name('homepage1.hero.update');
                    Route::get('/homepage-1/features', [HomePageController::class, 'FeaturesIndex'])->name('home1.features');
                    Route::post('/homepage-1/features/update', [HomePageController::class, 'FeaturesUpdate'])->name('home1.features.update');
                    Route::get('/homepage-1/about', [HomePageController::class, 'AboutIndex'])->name('home1.about');
                    Route::put('/homepage-1/about/update', [HomePageController::class, 'AboutUpdate'])->name('home1.about.update');
                    Route::get('/homepages/home1/why_us', [HomePageController::class, 'whyUsIndex'])->name('home1.why_us');
                    Route::put('/homepages/home1/why_us/update', [HomePageController::class, 'whyUsUpdate'])->name('home1.why_us.update');




                });

            });
        });





    Route::middleware(CheckMaintenanceMode::class.':web')->group(function () {

        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
        Route::post('register', [RegisterController::class, 'register']);
        Route::get('login', [AuthLogin::class, 'showLoginForm'])->name('user.login');
        Route::post('login', [AuthLogin::class, 'login']);
        Route::post('logout', [AuthLogin::class, 'logout'])->name('user.logout');
        Route::get('password/forgot', [AuthLogin::class, 'showForgotPasswordForm'])->name('user.password.request');
        Route::post('password/email', [AuthLogin::class, 'sendResetLinkEmail'])->name('user.password.email');
        Route::get('password/reset/{token}', [AuthLogin::class, 'showResetPasswordForm'])->name('user.password.reset');
        Route::post('password/reset', [AuthLogin::class, 'resetPassword'])->name('user.password.update');
        Route::get('resend-password-link', [AuthLogin::class, 'showResendPasswordLinkPage'])->name('user.resend.page');
        Route::post('resend-password-link', [AuthLogin::class, 'resendPasswordLink'])->name('user.resend.password.link');
        // Verification routes (accessible only to authenticated vendors)
        Route::get('verify-email', [VerifyEmailController::class, 'showVerifyForm'])->name('verify.email');
        Route::post('verify-email', [VerifyEmailController::class, 'verify'])->name('verify.email.submit');
        Route::post('resend-code', [VerifyEmailController::class, 'resendCode'])->name('resend.code');

        Route::prefix('user')->name('user.')->group(function () {
                // User authentication middleware
                Route::middleware(UserAuthenticated::class.':web')->group(function () {
                    // Email verified middleware applied after authentication
                    Route::middleware(EnsureEmailIsVerified::class.':web')->group(function () {
                            Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
                            Route::get('settings/account', [ProfileSettingsController::class, 'account'])->name('settings.account');
                            Route::post('settings/account', [ProfileSettingsController::class, 'updateAccount'])->name('settings.updateAccount');
                            Route::post('settings/deactivate', [ProfileSettingsController::class, 'deactivateAccount'])->name('settings.deactivateAccount');
                            Route::get('settings/security', [ProfileSettingsController::class, 'security'])->name('settings.security');
                            Route::post('settings/security/password', [ProfileSettingsController::class, 'updatePassword'])->name('settings.updatePassword');
                            Route::resource('tickets', TicketController::class);
                            Route::get('tickets/{ticket}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
                            Route::post('tickets/{ticket}/reply', [TicketController::class, 'storeReply'])->name('tickets.storeReply');
                    });
                    Route::post('/bookings/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');
                    Route::get('/bookings/payment/{id}', [BookingController::class, 'payment'])->name('booking.payment');
                    Route::get('/bookings/invoice/download/{id}', [BookingController::class, 'downloadInvoice'])->name('booking.invoice.download');
                    Route::post('/bookings/payment/confirm/{id}', [BookingController::class, 'confirmPayment'])->name('booking.confirmPayment');
                    Route::get('booking/review', [BookingController::class, 'reviewBooking'])->name('booking.review');
                    Route::get('/bookings', [BookingController::class, 'listBookings'])->name('bookings.list');
                    Route::get('/events/bookings/{bookingId}/payment', [EventBookingController::class, 'payment'])->name('event.bookings.payment');
                    Route::post('/events/bookings/{bookingId}/payment-proof', [EventBookingController::class, 'storePaymentProof'])->name('event.bookings.storePaymentProof');
                    Route::get('/events/bookings', [EventBookingController::class, 'listBookings'])->name('event.bookings.list');
                });
                // Hotel Booking
                Route::post('/hotels/{hotel}/book', [BookingController::class, 'bookHotel'])->name('hotels.book');
                Route::get('/bookings/summary', [BookingController::class, 'summary'])->name('booking.summary');
                Route::post('/booking/register-guest', [BookingController::class, 'registerGuest'])->name('booking.registerGuest');
                // Tour Booking
                Route::post('/tours/{tour}/book', [BookingController::class, 'bookTour'])->name('tours.book');
                Route::post('/{bookableType}/{bookableId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
                // Routes for Event Booking
                Route::post('/events/{slug}/book', [EventBookingController::class, 'store'])->name('events.book');

        });

        Route::get('/', [HomeController::class, 'index'])->name('front.home');
        Route::get('/about-us', [HomeController::class, 'about'])->name('front.about');
        Route::get('/contact-us', [HomeController::class, 'contact'])->name('front.contact');
        Route::post('/contact-us', [HomeController::class, 'Contactstore'])->name('contact.submit');

        Route::get('/destinations', [HomeController::class, 'destinations'])->name('front.destinations');
        Route::get('/destinations/{slug}', [HomeController::class, 'DestinatonnShow'])->name('destination.show');
        Route::get('/tours', [HomeController::class, 'tours'])->name('tours.index');
        Route::get('/tours/{slug}', [HomeController::class, 'TourShow'])->name('tours.show');
        Route::get('/hotels', [HomeController::class, 'hotel'])->name('hotels.index');
        Route::get('/hotels/{slug}', [HomeController::class, 'hotelShow'])->name('hotels.show');
        Route::get('/events/{slug}', [HomeController::class, 'eventShow'])->name('events.show');
        Route::get('/faqs', [HomeController::class, 'faqIndex'])->name('faqs.index');
        Route::get('/gallery', [HomeController::class, 'galleryIndex'])->name('gallery.index');
        Route::get('/our-team', [HomeController::class, 'guideIndex'])->name('team.index');
        Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');

    });
    Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');



});