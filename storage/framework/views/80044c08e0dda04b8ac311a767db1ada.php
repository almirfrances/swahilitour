<nav class="main-header__nav main-menu">
    <ul class="main-menu__list">
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($menu->position === 'navbar'): ?>  
            <?php
            // Check if the current route matches the menu link
            $isActive = request()->url() === url($menu->link) || request()->is(trim($menu->link, '/'));
            $isDropdownActive = $menu->children->contains(function($child) {
                return request()->url() === url($child->link) || request()->is(trim($child->link, '/'));
            });
        ?>

                <li class="<?php echo e($isActive ? 'current' : ''); ?> <?php echo e($menu->children->isNotEmpty() ? 'dropdown' : ''); ?> ">
                    <a class="<?php echo e(request()->is($menu->link) ? : ''); ?>" href="<?php echo e($menu->link); ?>"><?php echo e($menu->title); ?></a>
                    <?php if($menu->children->isNotEmpty()): ?>
                        <ul class="sub-menu <?php echo e(request()->is($menu->link) ? : ''); ?>">
                            <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php echo e(request()->is($menu->link) ?  : ''); ?>">
                                    <a href="<?php echo e($child->link); ?>"><?php echo e($child->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </li>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
            $activeEvents = \App\Models\Event::where('status', 'active')->get(); // Fetch only active events
        ?>

        <?php if($activeEvents->isNotEmpty()): ?>
            <li class="dropdown">
                <a href="#">Events</a>
                <ul class="sub-menu">
                    <?php $__currentLoopData = $activeEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('events.show', $event->slug)); ?>"><?php echo e($event->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
     </ul>
</nav>

<?php /**PATH /home/swahilitour/public_html/resources/views/front/partials/navbar.blade.php ENDPATH**/ ?>