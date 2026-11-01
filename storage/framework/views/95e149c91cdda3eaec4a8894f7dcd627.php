<footer class="footer-three section-space-top">
    <div class="footer-three__bg" style="background-image: url(<?php echo e(asset('front/assets/images/shapes/footer-bg-3-1.png')); ?>);"></div>
    <div class="footer-three__inner">
        <!-- /.footer-three__bg -->
        <div class="container">
            <div class="footer-three__top">
                <div class="footer-three__logo">
                    <a href="<?php echo e(route('front.home')); ?>">
                        <img src="<?php echo e(asset('storage/' . ($settings['logo_light'] ))); ?>" alt="<?php echo e($settings['site_name']); ?>" width="187">
                    </a>
                </div><!-- /.footer-three__logo -->
                <div class="footer-three__contact">
                    <ul class="footer-three__contact__list">
                        <li>
                            <span class="footer-three__contact__list__icon">
                                <i class="trevlo-one-icon-maps-and-flags"></i>
                            </span><!-- /.footer-three__contact__list__icon -->
                            <?php echo e($settings['address']); ?>

                        </li>
                        <li>
                            <span class="footer-three__contact__list__icon">
                                <i class="trevlo-one-icon-telephone"></i>
                            </span><!-- /.footer-three__contact__list__icon -->
                            <a href="tel:<?php echo e($settings['site_phone']); ?>"><?php echo e($settings['site_phone']); ?></a>
                        </li>
                    </ul>


                    <div class="footer-three__newsletter">
                        <form  action="<?php echo e(route('subscribe')); ?>" method="POST" class="footer-three__newsletter__form mc-form">
                            <?php echo csrf_field(); ?>
                            <input type="email" name="email" id="footer-three__newsletter__input" placeholder="Enter Email" class="footer-three__newsletter__input">
                            <button type="submit" class="footer-three__newsletter__btn trevlo-btn trevlo-btn--two trevlo-btn--base"><span>Subscribe</span></button>
                        </form>
                        
                    </div>


                </div>
            </div>
            <div class="row gutter-y-40">
                <div class="col-xl-3 col-md-6 wow animated fadeInUp" data-wow-delay="0s" data-wow-duration="1500ms">
                    <div class="footer-widget footer-widget--about">
                        <h2 class="footer-widget__title">About us</h2><!-- /.footer-widget__title -->
                        <p class="footer-widget__about-text"><?php echo e($settings['site_description']); ?></p><!-- /.footer-widget__about-text -->
                        <div class="social-links">
                            <a href="<?php echo e($settings['facebook_url']); ?>">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="<?php echo e($settings['twitter_url']); ?>">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="<?php echo e($settings['instagram_url']); ?>">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                            <a href="<?php echo e($settings['youtube_url']); ?>">
                                <i class="fab fa-youtube" aria-hidden="true"></i>
                                <span class="sr-only">Youtube</span>
                            </a>
                            <a href="<?php echo e($settings['telegram_url']); ?>">
                                <i class="fab fa-telegram" aria-hidden="true"></i>
                                <span class="sr-only">Telegram</span>
                            </a>


                        </div><!-- /.social-links -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-xl-3 col-md-6 -->

                <div class="col-xl-3 col-md-3 wow animated fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="footer-widget footer-widget--links footer-widget--links-1">
                        <h2 class="footer-widget__title">Useful Links</h2>
                        <ul class="footer-widget__links">
                            <?php $__currentLoopData = $menus->where('position', 'footer')->where('category', 'useful_links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($menu->link); ?>"><?php echo e($menu->title); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div><!-- /.col-xl-3 col-md-3 -->
                <div class="col-xl-2 col-md-3 wow animated fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                    <div class="footer-widget footer-widget--links footer-widget--links-2">
                        <h2 class="footer-widget__title">Company</h2>
                        <ul class="footer-widget__links">
                            <?php $__currentLoopData = $menus->where('position', 'footer')->where('category', 'company'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e($menu->link); ?>"><?php echo e($menu->title); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div><!-- /.col-xl-2 col-md-3 -->

                <div class="col-xl-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                    <div class="footer-widget footer-widget--gallery">
                        <h2 class="footer-widget__title">Our Gallery</h2><!-- /.footer-widget__title -->
                        <div class="footer-widget__gallery">
                            <?php $__currentLoopData = $galleries->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('gallery.index')); ?>" class="footer-widget__gallery__link">
                                <img src="<?php echo e(asset('storage/' . $gallery->image)); ?>" alt="footer-widget-gallery" style="height: 90px; width: auto;">
                                <span class="footer-widget__gallery__icon">
                                    <i class="icon-plus"></i>
                                </span>
                            </a><!-- /.footer-widget__gallery__link -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-xl-4 col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <img src="<?php echo e(asset('front/assets/images/shapes/footer-shape-3-1.png')); ?>" alt="shape" class="footer-three__shape-one">
        <img src="<?php echo e(asset('front/assets/images/shapes/footer-shape-3-2.png')); ?>" alt="shape" class="footer-three__shape-two">
    </div><!-- /.footer-three__inner -->
    <div class="footer-three__bottom">
        <div class="container">
            <div class="footer-three__bottom__inner">
                <p class="footer-three__copyright">
                    &copy; <span class="dynamic-year"></span> <?php echo e($settings['footer_copyright']); ?>

                </p>
            </div><!-- /.footer-three__inner -->
        </div><!-- /.container -->
    </div><!-- /.footer-three__bottom -->
</footer><!-- /.footer-three -->
<?php /**PATH /home/swahilitour/public_html/resources/views/front/partials/footer.blade.php ENDPATH**/ ?>