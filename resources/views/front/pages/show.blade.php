@extends('front.layouts.app')

@section('app')

<section class="page-header">
    {{-- <div class="page-header__bg"></div> --}}
    <!-- /.page-header__bg -->
    <div class="container">
        <h2 class="page-header__title wow animated fadeInLeft" data-wow-delay="0s" data-wow-duration="1500ms">
            {{ $page->name }}</h2>
        <div class="page-header__breadcrumb-box">
            <ul class="trevlo-breadcrumb">
                {{-- <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>Tours</li> --}}
            </ul><!-- /.trevlo-breadcrumb -->
        </div><!-- /.page-header__breadcrumb-box -->
    </div><!-- /.container -->
</section>


<div class="tour-listing-one tour-listing-one--home-two section-space-top">
    <div class="container">
        <div class="blog-details-page__row row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-details">
                    <div class="blog-card-three">
                        <div class="blog__card">

                            <div class="blog__card-content wow animated fadeInUp animated" data-wow-delay="0.1s" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0.1s; animation-name: fadeInUp;">

                                <h3 class="blog__card-title">{{ $page->title }}</h3>
                                <p class="blog__card-text">{!! $page->content !!}</p>

                            </div><!-- /.blog-details__card-content -->
                        </div><!-- /.blog-details__card -->
                    </div><!-- /.blog-card-three -->
                </div><!-- /.blog-details -->

            </div><!-- /.col-xl-8 col-lg-7 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>

@endsection

