<header class="main-header sticky-header sticky-header--normal">
    <div class="container">
        <div class="main-header__inner">
            <div class="main-header__left">
                <div class="main-header__logo">
                    <a href="<?php echo e(route('front.home')); ?>">
                        <img src="<?php echo e(asset('storage/' . $settings['logo_dark'])); ?>" alt="<?php echo e($settings['site_name']); ?>" width="146">
                    </a>
                </div><!-- /.main-header__logo -->
                <?php echo $__env->make('front.partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div><!-- /.main-header__left -->

            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="<?php echo e(route('tours.index')); ?>"
                    class="main-header__booking-btn trevlo-btn trevlo-btn--white-two"><span>Start
                        Booking</span></a><!-- /.main-header__btn -->
                <div class="main-header__right-right">
                    <div class="main-header__phone">
                        <div class="main-header__phone-icon">
                            <span class="icon-phone-1"></span>
                        </div>
                        <div class="main-header__phone-text">
                            <p class="main-header__phone-title">Call Anytime</p>
                            <h4 class="main-header__phone-number"><a href="tel:<?php echo e($settings['site_phone']); ?>"><?php echo e($settings['site_phone']); ?></a>
                            </h4>
                        </div>
                    </div><!-- /.main-header__phone -->
                    <div class="main-header__divider"></div>
                    <ul class="main-header__search-user">
                       
                        <li class="main-header__search-user-item">
                            <a href="<?php echo e(route('user.login')); ?>" class="main-header__user">
                                <span class="icon-user-1"></span>
                            </a>
                        </li>
                    </ul><!-- /.main-header__search-user -->
                </div><!-- /.main-header__right-right -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
<?php /**PATH /home/swahilitour/public_html/resources/views/front/partials/app_header.blade.php ENDPATH**/ ?>