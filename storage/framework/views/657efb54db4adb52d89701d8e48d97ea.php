<div class="topbar-one">
    <div class="topbar-one__container container-fluid">
        <div class="topbar-one__inner">
            <div class="topbar-one__left">
                <ul class="topbar-one__info">
                    <li class="topbar-one__info-item">
                        <span class="topbar-one__info-icon icon-location-1"></span>
                        <span class="topbar-one__info-text"><?php echo e($settings['address']); ?></span>
                    </li>
                    <li class="topbar-one__info-item">
                        <span class="topbar-one__info-icon icon-envelope"></span>
                        <a href="mailto:<?php echo e($settings['site_email']); ?>"
                            class="topbar-one__info-text"><?php echo e($settings['site_email']); ?></a>
                    </li>
                </ul><!-- /.topbar-one__info -->
                <ul class="topbar-one__info topbar-one__info--right">
                    <li class="topbar-one__info-item">
                        <span class="topbar-one__info-icon icon-phone-1"></span>
                        <span class="topbar-one__info-text"><?php echo e($settings['site_phone']); ?></span>
                    </li>
                </ul><!-- /.topbar-one__info -->
            </div><!-- /.topbar-one__left -->
            <div class="topbar-one__right">
                <ul class="topbar-one__social">
                    <li class="topbar-one__social-item">
                        <a href="<?php echo e($settings['facebook_url']); ?>" class="topbar-one__social-link"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="topbar-one__social-item">
                        <a href="<?php echo e($settings['twitter_url']); ?>" class="topbar-one__social-link"><i
                                class="fab fa-twitter"></i></a>
                    </li>
                    <li class="topbar-one__social-item">
                        <a href="<?php echo e($settings['telegram_url']); ?>" class="topbar-one__social-link"><i
                                class="fab fa-telegram"></i></a>
                    </li>
                    <li class="topbar-one__social-item">
                        <a href="<?php echo e($settings['instagram_url']); ?>" class="topbar-one__social-link"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                    <li class="topbar-one__social-item">
                        <a href="<?php echo e($settings['youtube_url']); ?>" class="topbar-one__social-link"><i
                                class="fab fa-youtube"></i></a>
                    </li>
                </ul><!-- /.topbar-one__social -->
            </div><!-- /.topbar-one__right -->
        </div><!-- /.topbar-one__inner -->
    </div><!-- /.ctopbar-one__container -->
</div><!-- /.topbar-one -->
<?php /**PATH /home/swahilitour/public_html/resources/views/front/partials/topbar.blade.php ENDPATH**/ ?>