@extends('front.layouts.main')

@section('content')

<div class="page-wrapper">
    @include('front.partials.topbar')
    @include('front.partials.app_header')
@yield('app')

@include('front.partials.footer')
</div>
@endsection
