@extends('front.layouts.app')

@section('app')


<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            Gallery</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>




<div class="gallery-page section-space">
    <div class="container">
        <div class="row">

            @foreach($galleries as $gallery)
            <div class="col-xl-4 col-lg-4 col-sm-6 wow animated fadeInUp" data-wow-delay="0.1s"
                data-wow-duration="1500ms">
                <div class="gallery-single">
                    <div class="gallery-single__img-box">
                        <div class="gallery-image-container">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                 alt="{{ $settings['site_name'] ?? 'Site Name' }} - {{ $gallery->title }}"
                                 class="gallery-single__img">
                        </div>

                        <style>
                            .gallery-image-container {
                                width: 100%; /* Responsive width */
                                height: 250px; /* Fixed height for all images */
                                overflow: hidden;
                                position: relative;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            }

                            .gallery-single__img {
                                width: auto; /* Scale width automatically */
                                height: 100%; /* Fixed height */
                                min-width: 100%; /* Ensure it covers the width */
                                object-fit: cover; /* Cover the container without stretching */
                            }
                        </style>

                        <div class="gallery-single__overlay">
                            <a href="{{ asset('storage/' . $gallery->image) }}"
                                class="gallery-single__btn trevlo-btn trevlo-btn--base-three img-popup"><span
                                    class="icon-plus"></span></a>
                        </div><!-- /.gallery-single__overlay -->
                    </div><!-- /.gallery-single__img-box -->
                </div><!-- /.gallery-single -->
            </div><!-- /.col-xl-4 col-lg-4 col-sm-6 -->
            @endforeach


            <ul class="post-pagination tour-listing-filter__pagination">
                {{-- Previous Page Link --}}
                @if ($galleries->onFirstPage())
                <li class="disabled active" aria-disabled="true">
                    <span><i class="fas fa-chevron-left"></i></span>
                </li>
                @else
                <li>
                    <a href="{{ $galleries->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($galleries->getUrlRange(1, $galleries->lastPage()) as $page => $url)
                @if ($page == $galleries->currentPage())
                <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($galleries->hasMorePages())
                <li>
                    <a href="{{ $galleries->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                </li>
                @else
                <li class="disabled active" aria-disabled="true">
                    <span><i class="fas fa-chevron-right"></i></span>
                </li>
                @endif
            </ul>



        </div><!-- /.row -->
    </div><!-- /.container -->
</div>



@endsection
