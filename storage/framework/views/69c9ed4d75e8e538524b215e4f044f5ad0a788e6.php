    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0"><?php echo e($title); ?></h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('admin.index')); ?>"><?php echo e(trans('common.PanelHome')); ?></a>
                    </li>
                    <?php if(isset($breadcrumbs)): ?>
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item['url'] != ''): ?>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo e($item['url']); ?>"><?php echo e($item['text']); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item active">
                                    <?php echo e($item['text']); ?>

                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
    </div><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/layouts/common/breadcrumbs.blade.php ENDPATH**/ ?>