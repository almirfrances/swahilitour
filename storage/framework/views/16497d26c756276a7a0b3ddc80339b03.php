<!-- resources/views/seo.blade.php -->

<?php
    // Default values to be used if no data is provided from the controller
    $defaultTitle = 'SwahiliTour - Your Ultimate Travel Experience';
    $defaultDescription = 'SwahiliTour offers the best travel experiences, from tours to hotels and beautiful destinations.';
    $defaultKeywords = 'travel, tours, hotels, destinations, SwahiliTour';
    $defaultImage = asset('seo/default-image.png');
    $defaultUrl = url()->current();
    $defaultFavicon = asset('storage/' . ($settings['favicon'] ));
?>

<!-- Primary Meta Tags -->
<title><?php echo e($title ?? $defaultTitle); ?></title>
<meta name="title" content="<?php echo e($title ?? $defaultTitle); ?>">
<meta name="description" content="<?php echo e($descriptionSeo ?? $defaultDescription); ?>">
<meta name="author" content="Almir Frances">
<meta name="author:url" content="https://almirfrances.com">
<meta name="keywords" content="<?php echo e($keywords ?? $defaultKeywords); ?>">
<meta name="robots" content="index, follow">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="<?php echo e($ogType ?? 'website'); ?>">
<meta property="og:url" content="<?php echo e($defaultUrl); ?>">
<meta property="og:title" content="<?php echo e($ogTitle ?? $defaultTitle); ?>">
<meta property="og:description" content="<?php echo e($descriptionSeo ?? $defaultDescription); ?>">
<meta property="og:image" content="<?php echo e($ogImage ?? $defaultImage); ?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo e($defaultUrl); ?>">
<meta property="twitter:title" content="<?php echo e($ogTitle ?? $defaultTitle); ?>">
<meta property="twitter:description" content="<?php echo e($descriptionSeo ?? $defaultDescription); ?>">
<meta property="twitter:image" content="<?php echo e($ogImage ?? $defaultImage); ?>">

<!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e($defaultFavicon); ?>">

<link rel="mask-icon" href="<?php echo e($defaultFavicon); ?>" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">

<meta name="theme-color" content="#ffffff">

<!-- Additional Favicons for various devices and browsers -->
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" type="image/png" sizes="512x512" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="167x167" href="<?php echo e($defaultFavicon); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" sizes="192x192" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" sizes="32x32" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" sizes="96x96" href="<?php echo e($defaultFavicon); ?>">
<link rel="icon" sizes="16x16" href="<?php echo e($defaultFavicon); ?>">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo e($defaultFavicon); ?>">
<meta name="theme-color" content="#ffffff">

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo e($canonicalUrl ?? $defaultUrl); ?>">

<?php echo $__env->yieldPushContent('meta'); ?>
<?php /**PATH /home/swahilitour/public_html/resources/views/front/seo.blade.php ENDPATH**/ ?>