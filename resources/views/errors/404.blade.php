@extends('front.layouts.app')

@section('app')

<!-- Error Page Start -->
<section class="error-page">
    <div class="container">
        <div class="error-page__wrapper">
            <div class="error-page__top">
                <h2 class="error-page__top-title">4<span>0</span>4</h2>
                <img src="{{ asset('front/assets/images/shapes/error-shape-1-1.png') }}" alt="error-shape"
                    class="error-page__top-shape">
            </div><!-- /.error-page__top -->
            <div class="error-page__image-box">
                <img src="{{ asset('front/assets/images/resources/error-1-1.png') }}" alt="error image" class="error-page__image">
            </div><!-- /.error-page__image-box -->
            <div class="error-page__content sec-title wow animated fadeInUp" data-wow-delay="0.1s"
                data-wow-duration="1500ms">
                <h3 class="error-page__heading sec-title__heading">Oops! Page Not Found</h3>
                <p class="error-page__text">The page you are looking for is not exist.</p>
                {{-- <form action="404.html#" class="error-page__search-form">
                    <button type="submit" aria-label="search submit">
                        <span class="icon-search"></span>
                    </button>
                    <input type="text" name="error-page-search" id="error-page-search"
                        placeholder="Type Here" />
                </form> --}}
                <a href="{{ url('/') }}" class="error-page__btn trevlo-btn trevlo-btn--base"><span>Back to
                        Home</span></a>
            </div><!-- /.error-page__content -->
        </div><!-- /.error-page__wrapper -->
    </div><!-- /.container -->
</section>


@endsection
