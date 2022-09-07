
<?php $__env->startSection('content'); ?>


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e($title); ?></h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr>
                                <th><?php echo e(trans('common.id')); ?></th>
                                <th><?php echo e(trans('common.name')); ?></th>
                                <th><?php echo e(trans('common.email')); ?></th>
                                <th><?php echo e(trans('common.role')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($user->id); ?>">
                                <td>
                                    <?php echo e($user->id); ?>

                                </td>
                                <td>
                                    <?php echo e($user->name); ?>

                                </td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php echo e($user->hisRole['name_'.Session::get('Lang')]); ?>

                                </td>
                              
                                <td class="text-center">
                                <?php if($user->id != 1): ?>
                                        <?php if($user->block == '0'): ?>
                                            <a href="<?php echo e(route('admin.adminUsers.block',['id'=>$user->id,'action'=>'1'])); ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.block')); ?>">
                                                <i data-feather='shield-off'></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('admin.adminUsers.block',['id'=>$user->id,'action'=>'0'])); ?>" class="btn btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.unblock')); ?>">
                                                <i data-feather='shield'></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.adminUsers.edit',['id'=>$user->id])); ?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                            <i data-feather='edit'></i>
                                        </a>
                                        <?php $delete = route('admin.adminUsers.delete',['id'=>$user->id]); ?>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($user->id); ?>')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.delete')); ?>">
                                            <i data-feather='trash-2'></i>
                                        </button>
                                        <?php /*
                                        <a href="" class="btn btn-icon btn-danger">
                                            
                                        </a>
                                        */ ?>
                                    <?php else: ?>
                                        <?php if(auth()->user()->id == 1): ?>
                                            <a href="<?php echo e(route('admin.adminUsers.edit',['id'=>$user->id])); ?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                                <i data-feather='edit'></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="p-3 text-center ">
                                        <h2><?php echo e(trans('common.nothingToView')); ?></h2>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php echo e($users->links('vendor.pagination.default')); ?>



            </div>
        </div>
    </div>
    <!-- Bordered table end -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_buttons'); ?>
    <a href="<?php echo e(route('admin.adminUsers.create')); ?>" class="btn btn-primary">
        <?php echo e(trans('common.CreateNew')); ?>

    </a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/admins/index.blade.php ENDPATH**/ ?>