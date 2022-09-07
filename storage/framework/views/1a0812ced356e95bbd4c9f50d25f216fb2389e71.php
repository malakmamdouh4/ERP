<?php if($paginator->hasPages()): ?>
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination mb-2">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item prev-item" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                        <a class="page-link"></a>
                    </li>
                <?php else: ?>
                    <li class="page-item prev-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a>
                    </li>
                <?php endif; ?>

                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <li class="page-item active" aria-disabled="true"><span><?php echo e($element); ?></span></li>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link"><?php echo e($page); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item next-item">
                        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-link" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"></a>
                    </li>
                <?php else: ?>
                    <li class="page-item next-item" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                        <a class="page-link"></a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH F:\laravel-projects\ERP\resources\views/vendor/pagination/default.blade.php ENDPATH**/ ?>