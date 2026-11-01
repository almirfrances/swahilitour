<?php $__env->startSection('app'); ?>

<!-- Error Page Start -->
<section class="error-page">
    <div class="container">
        <div class="error-page__wrapper">
            <div class="error-page__top">
                <h2 class="error-page__top-title">4<span>0</span>4</h2>
                <img src="<?php echo e(asset('front/assets/images/shapes/error-shape-1-1.png')); ?>" alt="error-shape"
                    class="error-page__top-shape">
            </div><!-- /.error-page__top -->
            <div class="error-page__image-box">
                <img src="<?php echo e(asset('front/assets/images/resources/error-1-1.png')); ?>" alt="error image" class="error-page__image">
            </div><!-- /.error-page__image-box -->
            <div class="error-page__content sec-title wow animated fadeInUp" data-wow-delay="0.1s"
                data-wow-duration="1500ms">
                <h3 class="error-page__heading sec-title__heading">Oops! Page Not Found</h3>
                <p class="error-page__text">The page you are looking for is not exist.</p>
                
                <a href="<?php echo e(url('/')); ?>" class="error-page__btn trevlo-btn trevlo-btn--base"><span>Back to
                        Home</span></a>
            </div><!-- /.error-page__content -->
        </div><!-- /.error-page__wrapper -->
    </div><!-- /.container -->
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/swahilitour/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>