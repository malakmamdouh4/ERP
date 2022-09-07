<li class="nav-item dropdown dropdown-language">
    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-<?php echo e(panelLangMenu()['selected']['flag']); ?>"></i>
        <span class="selected-language"> 

        <?php echo e(panelLangMenu()['selected']['text']); ?>


    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
        <?php $__currentLoopData = panelLangMenu()['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleLang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="dropdown-item" href="<?php echo e(url('/SwitchLang/'.$singleLang['lang'])); ?>" data-language="<?php echo e($singleLang['lang']); ?>">
                <i class="flag-icon flag-icon-<?php echo e($singleLang['flag']); ?>"></i> <?php echo e($singleLang['text']); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</li>
<?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/layouts/topbar/lang.blade.php ENDPATH**/ ?>