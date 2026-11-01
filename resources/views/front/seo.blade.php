<!-- resources/views/seo.blade.php -->

@php
    // Default values to be used if no data is provided from the controller
    $defaultTitle = 'SwahiliTour - Your Ultimate Travel Experience';
    $defaultDescription = 'SwahiliTour offers the best travel experiences, from tours to hotels and beautiful destinations.';
    $defaultKeywords = 'travel, tours, hotels, destinations, SwahiliTour';
    $defaultImage = asset('seo/default-image.png');
    $defaultUrl = url()->current();
    $defaultFavicon = asset('storage/' . ($settings['favicon'] ));
@endphp

<!-- Primary Meta Tags -->
<title>{{ $title ?? $defaultTitle }}</title>
<meta name="title" content="{{ $title ?? $defaultTitle }}">
<meta name="description" content="{{ $descriptionSeo ?? $defaultDescription }}">
<meta name="author" content="Almir Frances">
<meta name="author:url" content="https://almirfrances.com">
<meta name="keywords" content="{{ $keywords ?? $defaultKeywords }}">
<meta name="robots" content="index, follow">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:url" content="{{ $defaultUrl }}">
<meta property="og:title" content="{{ $ogTitle ?? $defaultTitle }}">
<meta property="og:description" content="{{ $descriptionSeo ?? $defaultDescription }}">
<meta property="og:image" content="{{ $ogImage ?? $defaultImage }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $defaultUrl }}">
<meta property="twitter:title" content="{{ $ogTitle ?? $defaultTitle }}">
<meta property="twitter:description" content="{{ $descriptionSeo ?? $defaultDescription }}">
<meta property="twitter:image" content="{{ $ogImage ?? $defaultImage }}">

<!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ $defaultFavicon }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ $defaultFavicon }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ $defaultFavicon }}">
{{-- <link rel="manifest" href="{{ asset('seo/site.webmanifest') }}"> --}}
<link rel="mask-icon" href="{{ $defaultFavicon }}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
{{-- <meta name="msapplication-config" content="{{ asset('seo/browserconfig.xml') }}"> --}}
<meta name="theme-color" content="#ffffff">

<!-- Additional Favicons for various devices and browsers -->
<link rel="icon" type="image/png" sizes="192x192" href="{{ $defaultFavicon }}">
<link rel="icon" type="image/png" sizes="512x512" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="167x167" href="{{ $defaultFavicon }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ $defaultFavicon }}">
<link rel="icon" sizes="192x192" href="{{ $defaultFavicon }}">
<link rel="icon" sizes="32x32" href="{{ $defaultFavicon }}">
<link rel="icon" sizes="96x96" href="{{ $defaultFavicon }}">
<link rel="icon" sizes="16x16" href="{{ $defaultFavicon }}">
{{-- <link rel="manifest" href="{{ asset('seo/manifest.json') }}"> --}}
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ $defaultFavicon }}">
<meta name="theme-color" content="#ffffff">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonicalUrl ?? $defaultUrl }}">

@stack('meta')
