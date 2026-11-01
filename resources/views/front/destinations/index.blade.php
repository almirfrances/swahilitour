@extends('front.layouts.app')

@section('app')


<section class="page-header">
    <div class="page-header__bg"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title">
            Destinations</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Destinations</li>
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>


<section class="destination-page destination-one section-space">
    <div class="container">
        <div class="destination-page__row row">
            @php
                $destinationsCount = count($destinations);
                $columnPatterns = [
                    ['col-xl-6 col-lg-8', 'col-xl-3 col-md-6', 'col-xl-3 col-md-6'], // Large first
                    ['col-xl-3 col-md-6', 'col-xl-6 col-lg-8', 'col-xl-3 col-md-6'], // Large middle
                    ['col-xl-3 col-md-6', 'col-xl-3 col-md-6', 'col-xl-6 col-lg-8']  // Large last
                ];
            @endphp
            @foreach ($destinations as $index => $destination)
                @php
                    // Determine the start of a new set of three
                    if ($index % 3 == 0) {
                        $currentPattern = $columnPatterns[array_rand($columnPatterns)];
                    }
                    $columnSize = $currentPattern[$index % 3];
                    $imageSize = $columnSize == 'col-xl-6 col-lg-8' ? '570x270' : '270x270';
                    $image = Arr::random($destination->images); // Randomly choose an image from the destination's images array
                @endphp
                <div class="{{ $columnSize }} wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="destination-one__card">
                        <div class="destination-one__card-img-box destination-one__card-img-box--round">
                            <img src="{{ Storage::url($image) }}" alt="destination"
                                class="destination-one__card-img destination-one__card-img--round"
                                style="width: {{ explode('x', $imageSize)[0] }}px; height: {{ explode('x', $imageSize)[1] }}px;">
                            <div class="destination-one__card-overlay destination-one__card-overlay--round">
                                <div class="destination-one__card-content destination-one__card-content--round">
                                    <a href="{{ route('tours.index', ['location' => $destination->id]) }}"
                                        class="destination-one__card-btn destination-one__card-btn--round trevlo-btn trevlo-btn--base trevlo-btn--base-three">
                                        <span>{{ $destination->tours_count }} TOURS</span>
                                    </a>
                                    <!-- Add Hotels Count with Link -->
                                    <a href="{{ route('hotels.index', ['location' => $destination->id]) }}"
                                        class="destination-one__card-btn destination-one__card-btn--round trevlo-btn trevlo-btn--base trevlo-btn--base-three">
                                        <span>{{ $destination->hotels_count }} HOTELS</span>
                                    </a>
                                    <h4 class="destination-one__card-title"><a
                                            href="{{ route('destination.show', $destination->slug) }}">{{ $destination->name }}</a></h4>
                                </div><!-- /.destination-one__card-content destination-one__card-content--round -->
                            </div><!-- /.destination-one__card-overlay destination-one__card-overlay--round -->
                        </div><!-- /.destination-one__card-img-box -->
                    </div><!-- /.destination-one__card -->
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
