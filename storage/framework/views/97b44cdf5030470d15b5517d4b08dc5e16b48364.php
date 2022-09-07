
<li class="nav-item dropdown dropdown-notification me-25">
    <a class="nav-link" href="#" data-bs-toggle="dropdown">
        <i class="ficon" data-feather="bell"></i>
        <span class="badge rounded-pill bg-danger badge-up">
            <?php echo e(Auth::user()->unreadnotifications->count() > 99 ? '+99' : Auth::user()->unreadnotifications->count()); ?>

        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
        <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto"><?php echo e(trans('common.Notifications')); ?></h4>
                <?php if(Auth::user()->unreadnotifications->count() > 0): ?>
                    <div class="badge rounded-pill badge-light-primary"><?php echo e(Auth::user()->unreadnotifications->count()); ?> <?php echo e(trans('common.New')); ?></div>
                <?php endif; ?>
            </div>
        </li>
        <li class="scrollable-container media-list">
            <?php
                $MyNotifications = auth()->user()->unreadnotifications->take(20);
            ?>
            <?php if(count($MyNotifications) > 0): ?>
                <?php $__currentLoopData = $MyNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="d-flex" href="<?php echo e(route('admin.notification.details',['id'=>$notification->id])); ?>">
                        <div class="list-item d-flex align-items-start">
                            
                            <div class="list-item-body flex-grow-1">
                                <p class="media-heading">
                                    <?php echo $notification['data']['text']; ?>

                                </p>
                                <small class="notification-text"><?php echo $notification['data']['date']; ?></small>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="p-1 text-center">
                    <b><?php echo e(trans('common.nothingToView')); ?></b>
                </div>
            <?php endif; ?>
        </li>
        <li class="dropdown-menu-footer">
            <a class="btn btn-primary w-100" href="<?php echo e(route('admin.notifications.readAll')); ?>"><?php echo e(trans('common.Read all notifications')); ?></a>
        </li>
    </ul>
</li>
<?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/layouts/topbar/notifications.blade.php ENDPATH**/ ?>