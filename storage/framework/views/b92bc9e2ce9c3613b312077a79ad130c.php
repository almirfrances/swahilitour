<?php $__env->startSection('app'); ?>


<!-- Tour Listing Details One Start -->
<section class="tour-listing-details tour-listing-details-right">
    <div class="tour-listing-details__top-carousel">
        <div class="tour-listing-details__top-carousel-wrapper trevlo-owl__carousel owl-theme owl-carousel"
            data-owl-options='{
                "items": 4,
                "margin": 20,
                "smartSpeed": 700,
                "loop":false,
                "autoplay": 6000,
                "nav":false,
                "dots":false,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items": 1
                    },
                    "768":{
                        "items": 2
                    },
                    "992":{
                        "items": 3
                    },
                    "1300":{
                        "items": 4,
                        "dots": false
                    }
                }
                }'>
            <?php
            // Ensure images are decoded into an array
            $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's an array
            ?>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tour-listing-details__top-carousel-item item">

                <div class="tour-listing-details__top-carousel-image">


                    <img src="<?php echo e(Storage::url($img)); ?>" alt="listing-details-carousel"
                        style="width: 500px; height: 500px; object-fit: cover;">

                    <div class="tour-listing-details__top-carousel-overlay">
                        <a href="#"
                            class="tour-listing-details__top-carousel-btn trevlo-btn trevlo-btn--base-three trevlo-image-popup"
                            data-gallery-options='{
                                "items": [
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                {
                                                                    "src": "<?php echo e(Storage::url($img)); ?>"
                                                                }<?php if(!$loop->last): ?>,<?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                ],
                                "gallery": {
                                "enabled": true
                                },
                                "type": "image"
                            }'>
                            <span class="icon-plus"></span>
                        </a>
                    </div>
                </div>


            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><!-- /.tour-listing-details__top-carousel-wrapper -->
    </div><!-- /.tour-listing-details__top-carousel -->
    <div class="tour-listing-details__destination">
        <div class="container">
            <div class="tour-listing-details__destination-row row">
                <div class="col-xl-4 wow animated fadeInLeft" data-wow-delay="0.1s" data-wow-duration="1500ms">
                    <div class="tour-listing-details__destination-left">
                        <h3 class="tour-listing-details__dastination-title"><?php echo e($tour->name); ?></h3>
                        <h4 class="tour-listing-details__dastination-price">
                            <span>$<?php echo e(number_format($tour->pricing->current_month_pricing['resident_price'], 2)); ?></span><span
                                class="tour-listing-details__dastination-person">/ Per Person</span></h4>
                    </div><!-- /.tour-listing-details__daetination-left -->
                </div><!-- /.col-xl-4 -->
                <div class="col-xl-8">
                    <div class="tour-listing-details__destination-right">
                        <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1500ms">
                            <span class="icon-clock-1"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Duration</h4>
                                <h4 class="tour-listing-details__destination-info-bottom"><?php echo e($tour->duration); ?></h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                        <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <span class="icon-Duration"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Min Age</h4>
                                <h4 class="tour-listing-details__destination-info-bottom"><?php echo e($tour->min_age); ?>+ Yrs</h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                        <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.5s"
                            data-wow-duration="1500ms">
                            <span class="icon-plane"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Tour Type</h4>
                                <h4 class="tour-listing-details__destination-info-bottom"><?php echo e($tour->type->name); ?></h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                        <div class="tour-listing-details__destination-info wow animated fadeInUp" data-wow-delay="0.7s"
                            data-wow-duration="1500ms">
                            <span class="icon-location-1"></span>
                            <div class="tour-listing-details__destination-info-title">
                                <h4 class="tour-listing-details__destination-info-top">Country</h4>
                                <h4 class="tour-listing-details__destination-info-bottom"><?php echo e($tour->destination->country); ?>

                                </h4>
                            </div>
                        </div><!-- /.tour-listing-details__destination-info -->
                    </div><!-- /.tour-listing-details__destination-right -->
                </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.tour-listing-details__destination -->
    <div class="tour-listing-details__info-area">
        <div class="container">
            <div class="tour-listing-details__info">
                <div class="tour-listing-details__info-left">
                    <div class="tour-listing-details__posted">
                        <span class="icon-clock-1"></span>
                        <p class="tour-listing-details__posted-text">
                            Posted <?php echo e($tour->updated_at->diffForHumans()); ?>

                        </p>

                    </div><!-- /.tour-listing-details__posted -->
                    <div class="tour-listing-details__ratings-box">


                        <div class="trevlo-ratings">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= floor($totalAverageRating)): ?>
                                    <!-- Full Star -->
                                    <span style="color: rgb(187, 159, 2);">&#9733;</span>
                                <?php elseif($i == ceil($totalAverageRating) && $totalAverageRating - floor($totalAverageRating) >= 0.5): ?>
                                    <!-- Half Star -->
                                    <span style="color: gold;">&#9734;</span><span style="position: relative; left: -12px; color: gold; clip-path: inset(0 50% 0 0);">&#9733;</span>
                                <?php else: ?>
                                    <!-- Empty Star -->
                                    <span style="color: gray;">&#9734;</span>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>



                        <p class="tour-listing-details__ratings-text">
                            <?php echo e(number_format($totalAverageRating, 1)); ?>

                            <?php if($totalAverageRating >= 4.5): ?>
                                Superb
                            <?php elseif($totalAverageRating >= 3.5): ?>
                                Very Good
                            <?php elseif($totalAverageRating >= 2.5): ?>
                                Average
                            <?php elseif($totalAverageRating >= 1.5): ?>
                                Below Average
                            <?php else: ?>

                            <?php endif; ?>
                        </p>
                    </div>
                </div><!-- /.tour-listing-details__info-left -->
                <div class="tour-listing-details__info-right">
                    <a href="javascript:void(0);"
                       class="tour-listing-details__share-btn trevlo-btn trevlo-btn--white-two"
                       id="share-toggle-btn">
                        <span class="icon-share"></span>
                        <span>Share</span>
                    </a>
                    <div class="tour-listing-details__social__list" id="share-options" style="display: none;">
                        <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%place!&url=<?php echo e(urlencode(url()->current())); ?>"
                           target="_blank" class="tour-listing-details__social-link" title="Share on Twitter">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"
                           target="_blank" class="tour-listing-details__social-link" title="Share on Facebook">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo e(urlencode(url()->current())); ?>"
                           target="_blank" class="tour-listing-details__social-link" title="Share on Pinterest">
                            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                            <span class="sr-only">Pinterest</span>
                        </a>
                        <a href="https://wa.me/?text=Check%20out%20this%20place:%20<?php echo e(urlencode(url()->current())); ?>"
                           target="_blank" class="tour-listing-details__social-link" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <span class="sr-only">WhatsApp</span>
                        </a>
                        <a href="javascript:void(0);" id="copy-link-btn" class="tour-listing-details__social-link" title="Copy Link">
                            <i class="fas fa-link" aria-hidden="true"></i>
                            <span class="sr-only">Copy Link</span>
                        </a>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const shareToggleBtn = document.getElementById('share-toggle-btn');
                        const shareOptions = document.getElementById('share-options');
                        const copyLinkBtn = document.getElementById('copy-link-btn');

                        // Toggle the share options visibility
                        shareToggleBtn.addEventListener('click', function () {
                            if (shareOptions.style.display === 'none') {
                                shareOptions.style.display = 'flex';
                            } else {
                                shareOptions.style.display = 'none';
                            }
                        });

                        // Copy the current URL to clipboard
                        if (copyLinkBtn) {
                            copyLinkBtn.addEventListener('click', function () {
                                const tempInput = document.createElement('input');
                                tempInput.value = window.location.href; // Get the current page URL
                                document.body.appendChild(tempInput);
                                tempInput.select();
                                document.execCommand('copy');
                                document.body.removeChild(tempInput);

                                // Display feedback to the user
                                alert('Link copied to clipboard!');
                            });
                        }
                    });
                </script>

            </div><!-- /.tour-listing-details__info -->
        </div><!-- /.container -->
    </div><!-- /.tour-listing-details__info-area -->

    <div class="container">
        <div class="tour-listing-details__row row">
            <div class="col-xl-8">
                <div class="tour-listing-details__overview">
                    <div class="wow animated fadeIn" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-details__title tour-listing-details__overview-title">Overview
                        </h3>
                    </div>
                    <p class="tour-listing-details__overview-text wow animated fadeInUp" data-wow-delay="0.1s"
                        data-wow-duration="1500ms"><?php echo e($tour->overview); ?></p>
                </div>


                <div class="tour-listing-details__amenities">
                    <h3 class="tour-listing-details__title tour-listing-details__amenities-title">Tour Amenities</h3>
                    <div class="tour-listing-details__amenities-row row">
                        <?php $__currentLoopData = $tour->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-xl-4 col-lg-4 col-sm-6 wow animated fadeInUp" data-wow-delay="<?php echo e(0.1 * ($index % 3)); ?>s" data-wow-duration="1500ms">
                            <div
                                class="tour-listing-details__amenities-content tour-listing-details__amenities-content--<?php echo e($index + 1); ?>">
                                <span class="<?php echo e($amenity->icon); ?>"></span>
                                <h4 class="tour-listing-details__amenities-content-title"><?php echo e($amenity->name); ?></h4>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- /.tour-listing-details__amenities-row -->
                </div>


                <!-- /.tour-listing-details__explore -->
                <div class="tour-listing-details__included">
                    <h3 class="tour-listing-details__title tour-listing-details__included-title">
                        Included/Exclude</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-7 wow animated fadeInUp" data-wow-delay="0.1s"
                            data-wow-duration="1500ms">
                            <ul class="tour-listing-details__included-list-one">
                                <?php $__currentLoopData = $tour->includes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $include): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <p><?php echo e($include); ?></p>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul><!-- /.tour-listing-details__included-list-one -->
                        </div><!-- /.col-lg-6 col-md-7 -->
                        <div class="col-lg-6 col-md-5 wow animated fadeInUp" data-wow-delay="0.3s"
                            data-wow-duration="1500ms">
                            <ul class="tour-listing-details__included-list-two">

                                <?php $__currentLoopData = $tour->excludes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclude): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fas fa-times"></i>
                                    <p><?php echo e($exclude); ?></p>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul><!-- /.tour-listing-details__included-list-one -->
                        </div><!-- /.col-lg-6 col-md-5 -->
                    </div><!-- /.row -->
                </div><!-- /.tour-listing-details__included -->
                <div class="tour-listing-details__plan">
                    <h3 class="tour-listing-details__title tour-listing-details__plan-title">Tour Plan</h3>
                    <div class="trevlo-accrodion tour-listing-details__faq" data-grp-name="tour-listing-details__faq">

                        <?php if(is_array($tour->tour_plan)): ?>
                        <?php $__currentLoopData = $tour->tour_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accrodion <?php echo e($index == 0 ? 'active' : ''); ?> wow animated fadeInUp"
                            data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <div class="accrodion-title">
                                <h4><span>Day <?php echo e($index + 1); ?></span> <?php echo e($day['title']); ?></h4>
                            </div>
                            <div class="accrodion-content" style="<?php echo e($index == 0 ? '' : 'display: none;'); ?>">
                                <div class="inner">
                                    <p><?php echo e($day['description']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p>No tour plan available.</p>
                        <?php endif; ?>



                    </div>
                </div><!-- /.tour-listing-details__plan -->
                <div class="tour-listing-details__location">
                    <h3 class="tour-listing-details__title tour-listing-details__location-title">Destination</h3>
                    <div class="google-map google-map__@@extraClassName">
                        <?php if($tour->destination): ?>
                            <iframe title="template google map"
                                src="https://www.google.com/maps?q=<?php echo e(urlencode($tour->destination->name)); ?>&output=embed"
                                class="map__@@extraClassName" allowfullscreen></iframe>
                        <?php else: ?>
                            <p>Destination not available.</p>
                        <?php endif; ?>

                    </div>
                    <!-- /.google-map -->
                </div><!-- /.tour-listing-details__location -->
                <?php if($similarTours->isNotEmpty()): ?>
                <div class="tour-listing-details__similar container-fluid">
                    <h3 class="tour-listing-details__title tour-listing-details__similar-title">Similar Tour
                    </h3>
                    <div class="row">

                        <?php $__currentLoopData = $similarTours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similarTour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="tour-listing__card">
                                        <a href="<?php echo e(route('tours.show', $similarTour->slug)); ?>"
                                            class="tour-listing__card-image-box">

                                            <?php

                                            $images = json_decode($tour->images, true) ?? []; // Decode and ensure it's

                                            $image = !empty($images) ? Arr::random($images) : 'default-image.jpg'; //


                                            ?>
                                            <img src="<?php echo e(Storage::url($image)); ?>" alt="<?php echo e($similarTour->name); ?>"
                                                class="tour-listing__card-image" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                                            <div class="tour-listing__card-btn-group">
                                                <?php if($similarTour->discount): ?>
                                                <div class="tour-listing__card-discount"> <?php echo e($similarTour->discount); ?>%
                                                    Off</div>
                                                <?php endif; ?>
                                                <?php if($similarTour->featured): ?>
                                                <div class="tour-listing__card-featured">Featured</div>
                                                <?php endif; ?>
                                            </div><!-- /.tour-listing__card-btn-group -->
                                            <div class="tour-listing__card-image-overlay"></div>
                                            <!-- /.tour-listing__card-image-overlay -->
                                        </a><!-- /.tour-listing__card-image-box -->
                                        <a href="javascript:void(0);" class="tour-listing__card-wishlist"><span
                                                class="icon-heart"></span></a>
                                        <div class="tour-listing__card-content">
                                            <div class="tour-listing__card-camera-group">
                                                <a href="javascript:void(0);"
                                                    class="tour-listing__card-camera-btn trevlo-image-popup"
                                                    data-gallery-options='{
                                                           "items": [

                                                               <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   {
                                                       "src": "<?php echo e(Storage::url($img)); ?>"
                                                   }<?php if(!$loop->last): ?>,<?php endif; ?>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                           ],
                                                           "gallery": {
                                                               "enabled": true
                                                           },
                                                           "type": "image"
                                                       }'>
                                                    <span class="icon-photo-camera-1"></span>
                                                </a>
                                                <?php if($tour->video_link): ?>
                                                <a href="<?php echo e($tour->video_link); ?>"
                                                    class="tour-listing__card-camera-btn video-popup">
                                                    <span class="icon-video-camera-1-1"></span>
                                                </a>
                                                <?php endif; ?>
                                            </div>

                                            <h3 class="tour-listing__card-title">
                                                <a
                                                    href="<?php echo e(route('tours.show', $similarTour->slug)); ?>"><?php echo e($similarTour->name); ?></a>
                                            </h3>

                                            <div class="tour-listing__card-inner-content">
                                                <div class="tour-listing__card-review-box">
                                                    <?php
                                                        $totalReviews = $tour->reviews->count();
                                                        $averageRating = $totalReviews > 0
                                                            ? $tour->reviews->avg('average_rating')
                                                            : 0; // Calculate average rating if reviews are present
                                                    ?>

                                                    <span class="icon-star"></span>
                                                    <p class="tour-listing__card-review-text text-small">
                                                        <?php echo e(number_format($averageRating, 1)); ?>

                                                        (<?php echo e($totalReviews); ?> <?php echo e(Str::plural('Review', $totalReviews)); ?>)
                                                    </p>
                                                </div>
                                                <div class="tour-listing__card-location-box">
                                                    <span class="icon-location-1"></span>
                                                    <p class="tour-listing__card-location-text text-small">
                                                        <?php echo e($similarTour->destination->name); ?></p>
                                                </div><!-- /.tour-listing__card-location-box -->
                                                <div class="tour-listing__card-divider"></div>
                                                <!-- /.tour-listing__card-divider -->
                                                <div class="tour-listing__card-bottom">
                                                    <div class="tour-listing__card-bottom-left">
                                                        <div class="tour-listing__card-day">
                                                            <span class="icon-clock-1"></span>
                                                            <p class="tour-listing__card-day-text text-small">
                                                                <?php echo e($similarTour->duration); ?></p>
                                                        </div><!-- /.tour-listing__card-day -->
                                                        <div class="tour-listing__card-people">
                                                            <span class="icon-Duration"></span>
                                                            <p class="tour-listing__card-people-text text-small">
                                                                <?php echo e($similarTour->min_age); ?>+</p>
                                                        </div><!-- /.tour-listing__card-people -->
                                                    </div><!-- /.tour-listing__card-bottom-left -->
                                                    <div class="tour-listing__card-bottom-right">
                                                        <h4 class="tour-listing__card-price">
                                                            $<?php echo e(number_format($similarTour->pricing->current_month_pricing['resident_price'], 2)); ?>

                                                        </h4>
                                                    </div><!-- /.tour-listing__card-bottom-right -->
                                                </div><!-- /.tour-listing__card-bottom -->
                                            </div><!-- /.tour-listing__card-inner-content -->
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div><!-- /.row -->
                </div>
                <?php endif; ?><!-- /.tour-listing-details__similar container-fluid -->


                <div class="tour-listing-details__reviews">
                    <h3 class="tour-listing-details__reviews-title tour-listing-details__title">
                        <span><?php echo e($tour->reviews->count()); ?></span> Reviews
                    </h3>
                    <div class="tour-listing-details__reviews-comment">
                        <?php $__currentLoopData = $tour->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tour-listing-details__reviews-comment-box">
                            <div class="tour-listing-details__reviews-image wow animated fadeInUp" data-wow-delay="0.1s"
                                data-wow-duration="1500ms">
                                <img src="<?php echo e($review->user->profile_image ?? asset('storage/' . $settings['favicon'])); ?>"
                                    alt="<?php echo e($review->user->full_name); ?>" style="width: 100px; height: 100px;">
                            </div>
                            <div class="tour-listing-details__reviews-content wow animated fadeInUp"
                                data-wow-delay="0.3s" data-wow-duration="1500ms">
                                <div class="tour-listing-details__reviews-inner-content">
                                    <div class="tour-listing-details__reviews-info">
                                        <h3 class="tour-listing-details__reviews-name"><?php echo e($review->user->full_name); ?>

                                        </h3>
                                        <div class="tour-listing-details__reviews-date">
                                            <p class="tour-listing-details__reviews-date-text">
                                                <?php echo e($review->created_at->format('d M, Y . H:i A')); ?></p>
                                        </div>
                                    </div>
                                    <div class="tour-listing-details__reviews-ratings-box">
                                        <h5 class="tour-listing-details__reviews-ratings-text">
                                            <?php echo e(number_format($review->average_rating, 1)); ?></h5>
                                        <div class="trevlo-ratings">
                                            <?php for($i = 1; $i <= 5; $i++): ?> <i
                                                class="fa <?php echo e($i <= $review->average_rating ? 'fa-star' : 'fa-star-o'); ?>">
                                                </i>
                                                <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="tour-listing-details__reviews-text"><?php echo e($review->comment); ?></p>
                                <?php if($review->admin_reply): ?>
                                <div class="tour-listing-details__reviews-admin-reply">
                                    <h6 class="tour-listing-details__reviews-reply-title">Admin Reply:</h6>
                                    <p class="tour-listing-details__reviews-reply-text"><?php echo e($review->admin_reply); ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($tour->reviews->count() > 3): ?>
                    <div class="col-12 wow animated fadeInUp mt-4" data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <div class="tour-listing-details__form-btn-boxtext-center">
                            <button id="load-more-reviews" class="form-one__btn trevlo-btn trevlo-btn--base"
                                data-offset="3" data-tour-id="<?php echo e($tour->id); ?>"><span>Load More</span></button>
                        </div>
                    </div>
                    <?php endif; ?>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const loadMoreBtn = document.getElementById('load-more-reviews');
                            const reviewsContainer = document.querySelector(
                                '.tour-listing-details__reviews-comment'
                                ); // Updated selector to match your HTML
                            const allReviews = Array.from(reviewsContainer.children); // All preloaded reviews
                            let visibleCount = 3; // Number of reviews initially visible

                            // Initially hide all reviews except the first 3
                            allReviews.forEach((review, index) => {
                                review.style.display = index < visibleCount ? '' :
                                'none'; // Show the first 3, hide the rest
                            });

                            if (loadMoreBtn) {
                                loadMoreBtn.addEventListener('click', function () {
                                    // Show the next batch of reviews
                                    const nextBatch = allReviews.slice(visibleCount, visibleCount + 3);
                                    nextBatch.forEach(review => {
                                        review.style.display = ''; // Make visible
                                    });

                                    // Update the count of visible reviews
                                    visibleCount += nextBatch.length;

                                    // Hide the button if all reviews are visible
                                    if (visibleCount >= allReviews.length) {
                                        loadMoreBtn.style.display = 'none';
                                    }
                                });
                            }
                        });

                    </script>


                </div>

                <div class="tour-listing-details__add-review">
                    <h3 class="tour-listing-details__add-review-title tour-listing-details__title">Add a Review</h3>

                    <form class=""
                        action="<?php echo e(route('user.reviews.store', ['bookableType' => 'tour', 'bookableId' => $tour->id])); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="reviewable_type" value="App\Models\Tour">
                        <input type="hidden" name="reviewable_id" value="<?php echo e($tour->id); ?>">

                        <div class="tour-listing-details__add-review-box mb-4">
                            <div class="tour-listing-details__add-review-box-single">
                                <p class="tour-listing-details__add-review-text">Service</p>
                                <div class="trevlo-ratings-two" data-rating-input="service_rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?> <i class="fa fa-star" data-value="<?php echo e($i); ?>"></i>
                                        <?php endfor; ?>
                                        <input type="hidden" name="service_rating" value="">
                                </div>
                            </div>
                            <div class="tour-listing-details__add-review-box-single">
                                <p class="tour-listing-details__add-review-text">Locations</p>
                                <div class="trevlo-ratings-two" data-rating-input="location_rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?> <i class="fa fa-star" data-value="<?php echo e($i); ?>"></i>
                                        <?php endfor; ?>
                                        <input type="hidden" name="location_rating" value="">
                                </div>
                            </div>
                            <div class="tour-listing-details__add-review-box-single">
                                <p class="tour-listing-details__add-review-text">Amenities</p>
                                <div class="trevlo-ratings-two" data-rating-input="amenities_rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?> <i class="fa fa-star" data-value="<?php echo e($i); ?>"></i>
                                        <?php endfor; ?>
                                        <input type="hidden" name="amenities_rating" value="">
                                </div>
                            </div>
                            <div class="tour-listing-details__add-review-box-single">
                                <p class="tour-listing-details__add-review-text">Prices</p>
                                <div class="trevlo-ratings-two" data-rating-input="price_rating">
                                    <?php for($i = 1; $i <= 5; $i++): ?> <i class="fa fa-star" data-value="<?php echo e($i); ?>"></i>
                                        <?php endfor; ?>
                                        <input type="hidden" name="price_rating" value="">
                                </div>
                            </div>

                        </div>
                        <div class="tour-listing-details__form">
                            <div class="form-one row gutter-20">
                                <?php if(Auth::check()): ?>
                                
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" class="form-one__input" value="<?php echo e(Auth::user()->full_name); ?>"
                                            disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="email" class="form-one__input" value="<?php echo e(Auth::user()->email); ?>"
                                            disabled>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="text" name="full_name" placeholder="Your Name"
                                            class="form-one__input" required>
                                    </div>
                                </div>
                                <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <input type="email" name="email" placeholder="Email Address"
                                            class="form-one__input" required>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="form-one__group">
                                        <textarea name="comment" cols="30" rows="10" placeholder="Write a Review"
                                            class="form-one__message form-one__input" required></textarea>
                                    </div>
                                </div>


                                <div class="col-12 wow animated fadeInUp" data-wow-delay="0.1s"
                                    data-wow-duration="1500ms">
                                    <div class="tour-listing-details__form-btn-box form-one__btn-box">
                                        <button type="submit"
                                            class="form-one__btn trevlo-btn trevlo-btn--base"><span>Submit
                                                Review</span></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const starGroups = document.querySelectorAll('.trevlo-ratings-two');

                            starGroups.forEach(group => {
                                const stars = group.querySelectorAll('.fa-star');
                                const input = group.querySelector('input[type="hidden"]');

                                stars.forEach(star => {
                                    star.addEventListener('click', function () {
                                        const value = this.getAttribute('data-value');
                                        input.value = value; // Set hidden input value

                                        // Reset all stars and highlight up to the selected one
                                        stars.forEach(s => s.classList.remove(
                                            'selected'));
                                        for (let i = 0; i < value; i++) {
                                            stars[i].classList.add('selected');
                                        }
                                    });
                                });
                            });
                        });

                    </script>


                </div>

            </div><!-- /.col-xl-8 -->
            <div class="col-xl-4">
                <aside class="tour-listing-details__sidebar">

                    <div class="tour-listing-details__sidebar-book-tours tour-listing-details__sidebar-single wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-details__sidebar-title">Book Tours</h3>




                        <form action="<?php echo e(route('user.tours.book', $tour->id)); ?>" method="POST" class="tour-listing-details__sidebar-form contact-form-validated">
                            <?php echo csrf_field(); ?>
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" name="start_date" placeholder="Select date" id="datepicker" class="tour-listing-details__sidebar-form-date trevlo-datepicker" required>
                                <i class="tour-listing-details__sidebar-form-date-arrow fas fa-angle-down"></i>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" name="guests" id="guests" placeholder="Number of guests" min="1" required>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <select class="selectpicker" name="guest_type" id="guest_type" aria-label="Guest Type" required>
                                    <option value="resident">Resident</option>
                                    <option value="foreigner">Foreigner</option>
                                </select>
                            </div>
                            <div class="tour-listing-details__sidebar-form-input">
                                <input type="text" name="children_count" id="children_count" placeholder="Number of children" min="0" required>
                            </div>
                            <input type="hidden" name="bookable_type" value="tour">
                            <input type="hidden" name="bookable_id" value="<?php echo e($tour->id); ?>">
                            <button type="submit" class="tour-listing-details__sidebar-btn trevlo-btn trevlo-btn--base">
                                <span>Book Now</span>
                            </button>
                        </form>












                    </div>



                    <div class="tour-listing-details__sidebar-post-box tour-listing-details__sidebar-single wow animated fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="1500ms">
                        <h3 class="tour-listing-details__sidebar-title tour-listing-details__sidebar-post-title">
                            Last Minute</h3>
                        <ul class="tour-listing-sidebar-post">




                            <?php $__currentLoopData = $randomTours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="tour-listing-sidebar-post__item">
                                <div class="tour-listing-sidebar-post__image">

                                    <?php

                                    $images = json_decode($tour->images, true) ?? [];
                                    $image = !empty($images) ? Arr::random($images) : 'default-image.jpg';


                                    ?>

                                    <img src="<?php echo e(Storage::url($image)); ?>" alt="<?php echo e($tour->name); ?>"
                                        style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <div class="tour-listing-sidebar-post__content">
                                    <p class="tour-listing-sidebar-post__price">
                                        $<?php echo e(number_format($tour->pricing->current_month_pricing['resident_price'], 2)); ?>

                                    </p>
                                    <h5 class="tour-listing-sidebar-post__link">
                                        <a href="<?php echo e(route('tours.show', $tour->slug)); ?>"><?php echo e($tour->name); ?></a>
                                    </h5>
                                    <div class="tour-listing-sidebar-post__location">
                                        <span class="icon-location-1"></span>
                                        <p class="tour-listing-sidebar-post__location-text text-small">
                                            <?php echo e($tour->destination->name); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </aside><!-- /.tour-listing-details__sidebar -->
            </div><!-- /.col-xl-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<!-- Tour Listing Details One End -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/swahilitour/public_html/resources/views/front/tours/show.blade.php ENDPATH**/ ?>