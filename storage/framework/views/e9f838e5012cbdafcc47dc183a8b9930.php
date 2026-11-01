<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta property="og:site_name" content="Swahili Tour">
            <meta property="og:locale" content="pt-br">
    <meta property="og:locale:alternate" content="pt-pt">
    <meta property="og:locale:alternate" content="en-us">
     <?php echo $__env->make('front.seo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- fonts - optimized single request -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Dancing+Script:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;700&family=DM+Sans:wght@400;500;700&family=Covered+By+Your+Grace&family=Urbanist:wght@400;700;800&family=Manrope:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/bootstrap/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/bootstrap-select/bootstrap-select.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/animate/animate.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/fontawesome/css/all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/jquery-ui/jquery-ui.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/jarallax/jarallax.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/nouislider/nouislider.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/nouislider/nouislider.pips.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/tiny-slider/tiny-slider.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/trevlo-icons/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/trevlo-one-icons/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/daterangepicker-master/daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/owl-carousel/css/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/vendors/owl-carousel/css/owl.theme.default.min.css')); ?>" />

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/trevlo.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/color-1.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('front/assets/css/color-2.css')); ?>" />


    <?php echo $settings['header_code']; ?>

    <!-- template styles -->
    <style>
        :root {
            --almir-base: <?php echo e(App\Models\Setting::where('key', 'almir_base')->value('value') ?? '#5cff56'); ?>;
            --almir-primary: <?php echo e(App\Models\Setting::where('key', 'almir_primary')->value('value') ?? '#2D2330'); ?>;
            --almir-secondary: <?php echo e(App\Models\Setting::where('key', 'almir_secondary')->value('value') ?? '#736D75'); ?>;
            /*   //copyright footer bg */
            --almir-black4: <?php echo e(App\Models\Setting::where('key', 'almir_copyright_footer')->value('value') ?? '#241C26'); ?>;
            /* footer bg */
            --almir-footer: <?php echo e(App\Models\Setting::where('key', 'almir_footer')->value('value') ?? '#2D2330'); ?>;
        }

        /* .main-footer {
            position: relative;
            padding-top: 70px;
            background-color: <?php echo e(App\Models\Setting::where('key', 'almir_footer')->value('value') ?? '#382b3c'); ?>;

            z-index: 1;
        } */
    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(<?php echo e(asset('storage/' . $settings['favicon'])); ?>);"></div>
    </div>
    <!-- /.preloader -->
    <script>
        // Hide preloader after critical CSS is ready to avoid FOUC
        document.addEventListener('DOMContentLoaded', function () {
            var pre = document.querySelector('.preloader');
            if (!pre) return;

            var critical = [
                'front/assets/vendors/bootstrap/css/bootstrap.min.css',
                'front/assets/css/trevlo.css'
            ];
            var loaded = 0;
            function maybeHide() {
                if (loaded >= critical.length) {
                    pre.style.display = 'none';
                    return true;
                }
                return false;
            }
            critical.forEach(function (hrefPart) {
                var link = Array.from(document.querySelectorAll('link[rel="stylesheet"]'))
                    .find(function (l) { return l.href && l.href.indexOf(hrefPart) !== -1; });
                if (link) {
                    if (link.sheet) { loaded++; maybeHide(); }
                    link.addEventListener('load', function () { loaded++; maybeHide(); });
                    link.addEventListener('error', function () { loaded++; maybeHide(); });
                } else {
                    // If not found, don't block
                    loaded++; maybeHide();
                }
            });
            // Final safety fallback
            setTimeout(function(){ pre.style.display = 'none'; }, 2500);
        });
    </script>

    <?php echo $__env->yieldContent('content'); ?>
    <?php if($randomPromo && $randomPromo->popup): ?>
    <div id="promoPopup" class="promo-popup">
        <div class="promo-content">
            <button class="close-btn" onclick="closePromoPopup()">&times;</button>
            <h2 class="promo-title"><?php echo e($randomPromo->title); ?></h2>
            <h4 class="promo-subtitle"><?php echo e($randomPromo->sub_title); ?></h4>
            <?php if($randomPromo->event && $randomPromo->event->discount_percentage): ?>
                <p class="promo-discount"><?php echo e($randomPromo->event->discount_percentage); ?>% Off</p>
            <?php endif; ?>
            <p class="promo-desc"><?php echo e($randomPromo->description); ?></p>
            <a href="<?php echo e(route('events.show', $randomPromo->event->slug)); ?>" class="promo-button">Explore Now</a>
        </div>
    </div>
    <?php endif; ?>




    <style>
        :root {
            --background-color: #ffffff;
            --primary-color: #e52227; /* Indigo shade */
            --secondary-color: #ff6903; /* Teal shade */
            --text-color: #333; /* Dark gray for better readability */
            --discount-color: #fff; /* Bright red for discount */
            --button-hover: #31141c; /* Dark indigo */
        }

        .promo-popup {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.75);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.5s ease-in-out;
        }

        .promo-popup.active {
            visibility: visible;
            opacity: 1;
        }

        .promo-content {
            background: linear-gradient(to bottom right, var(--primary-color), var(--secondary-color));
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            color: var(--text-color);
            width: 90%;
            max-width: 500px;
            position: relative; /* Required for absolute positioning of close button */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: var(--background-color);
            background: none;
            border: none;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #E53E3E;
        }

        .promo-title, .promo-subtitle {
            color: var(--background-color); /* Ensure titles are visible against dark background */
        }

        .promo-discount {
            font-size: 24px;
            color: var(--discount-color);
            margin: 15px 0;
            font-weight: bold;
        }

        .promo-desc {
            margin-bottom: 20px;
            color: var(--background-color); /* Ensure description is readable */
        }

        .promo-button {
            background-color: var(--background-color);
            color: var(--text-color);
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .promo-button:hover {
            background-color: var(--button-hover);
            color: var(--background-color);
        }

        @media (max-width: 768px) {
            .promo-content {
                padding: 20px;
            }
        }
    </style>



<script>
    window.onload = function() {
        const promoPopup = document.getElementById('promoPopup');
        if (promoPopup && shouldShowPopup()) {
            setTimeout(() => {
                promoPopup.classList.add('active');
                localStorage.setItem('lastPopupShowTime', new Date().getTime());
            }, 1000); // Delay showing the popup for 1 second after page load
        }
    };

    function closePromoPopup() {
        const promoPopup = document.getElementById('promoPopup');
        if (promoPopup) {
            promoPopup.classList.remove('active');
        }
    }

    function shouldShowPopup() {
        const lastPopupShowTime = localStorage.getItem('lastPopupShowTime');
        const currentTime = new Date().getTime();
        const oneHour = 36; // Time in milliseconds
        return !lastPopupShowTime || currentTime - lastPopupShowTime > oneHour;
    }
</script>




<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="<?php echo e(route('front.home')); ?>" aria-label="logo image"><img src="<?php echo e(asset('storage/' . $settings['logo_light'])); ?>" width="155"
                    alt="<?php echo e($settings['site_name']); ?>" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:<?php echo e($settings['site_email']); ?>"><?php echo e($settings['site_email']); ?></a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:<?php echo e($settings['site_phone']); ?>"><?php echo e($settings['site_phone']); ?></a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__social">
            <a href="<?php echo e($settings['twitter_url']); ?>">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <span class="sr-only">Twitter</span>
            </a>
            <a href="<?php echo e($settings['facebook_url']); ?>">
                <i class="fab fa-facebook" aria-hidden="true"></i>
                <span class="sr-only">Facebook</span>
            </a>
            <a href="<?php echo e($settings['telegram_url']); ?>">
                <i class="fab fa-telegram" aria-hidden="true"></i>
                <span class="sr-only">Telegram</span>
            </a>
            <a href="<?php echo e($settings['instagram_url']); ?>">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <span class="sr-only">Instagram</span>
            </a>
            <a href="<?php echo e($settings['youtube_url']); ?>">
                <i class="fab fa-youtube" aria-hidden="true"></i>
                <span class="sr-only">Youtube</span>
            </a>
        </div><!-- /.mobile-nav__social -->
    </div>
    <!-- /.mobile-nav__content -->
</div>


<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
    <span class="scroll-to-top__text">back top</span>
    <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
</a>


<?php echo $settings['footer_code']; ?>

<script src="<?php echo e(asset('front/assets/vendors/jquery/jquery-3.7.0.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/bootstrap-select/bootstrap-select.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jarallax/jarallax.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-ui/jquery-ui.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-appear/jquery.appear.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-validate/jquery.validate.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/nouislider/nouislider.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/tiny-slider/tiny-slider.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/wnumb/wNumb.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/owl-carousel/js/owl.carousel.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/owl-carousel/js/owlcarousel2-filter.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/wow/wow.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/tilt/tilt.jquery.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/simpleParallax/simpleParallax.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/imagesloaded/imagesloaded.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/isotope/isotope.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/countdown/countdown.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/daterangepicker-master/moment.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/daterangepicker-master/daterangepicker.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-circleType/jquery.circleType.js')); ?>" defer></script>
<script src="<?php echo e(asset('front/assets/vendors/jquery-lettering/jquery.lettering.min.js')); ?>" defer></script>
<!-- template js -->
<script src="<?php echo e(asset('front/assets/js/trevlo.js')); ?>" defer></script>

</body>

</html>
<?php /**PATH /home/swahilitour/public_html/resources/views/front/layouts/main.blade.php ENDPATH**/ ?>