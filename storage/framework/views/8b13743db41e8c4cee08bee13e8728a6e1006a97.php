
<li class="nav-item dropdown dropdown-user">
    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="user-nav d-sm-flex d-none">
            <span class="user-name fw-bolder">
                <?php echo e(auth()->user()->name); ?>

            </span>
            
        </div>
        <span class="avatar">
            <img class="round" src="<?php echo e(auth()->user()->photoLink()); ?>" alt="avatar" height="40" width="40">
            <span class="avatar-status-online"></span>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
        <a class="dropdown-item" href="<?php echo e(route('admin.myProfile')); ?>">
            <i class="me-50" data-feather="user"></i> <?php echo e(trans('common.Profile')); ?>

        </a>
        <a class="dropdown-item"
            href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="me-50" data-feather="power"></i> <?php echo e(trans('common.Logout')); ?>

        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>


    </div>
</li><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/layouts/topbar/profile.blade.php ENDPATH**/ ?>