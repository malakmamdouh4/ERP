
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
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($activity->id); ?>">
                                <td>
                                    <?php echo e($activity->id); ?>

                                </td>
                                <td>
                                    <?php echo e($activity->name); ?>

                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editActivity<?php echo e($activity->id); ?>" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.activities.delete',['id'=>$activity->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($activity->id); ?>')">
                                        <i data-feather='trash-2'></i>
                                    </button>
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

                

            </div>
        </div>
    </div>
    <!-- Bordered table end -->


<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade text-md-start" id="editActivity<?php echo e($activity->id); ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.Edit')); ?>: <?php echo e($activity['name_'.session()->get('Lang')]); ?></h1>
                    </div>
                    <?php echo e(Form::open(['url'=>route('admin.activities.update',$activity->id), 'id'=>'editActivityForm'.$activity->id, 'class'=>'row gy-1 pt-75'])); ?>

                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name"><?php echo e(trans('common.name')); ?></label>
                            <?php echo e(Form::text('name',$activity->name,['id'=>'name', 'class'=>'form-control'])); ?>

                        </div>
                                 
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1"><?php echo e(trans('common.Save changes')); ?></button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                <?php echo e(trans('common.Cancel')); ?>

                            </button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_buttons'); ?>
    <a href="javascript:;" data-bs-target="#createActivity" data-bs-toggle="modal" class="btn btn-primary">
        <?php echo e(trans('common.CreateNew')); ?>

    </a>

    <div class="modal fade text-md-start" id="createActivity" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.CreateNew')); ?></h1>
                    </div>
                    <?php echo e(Form::open(['url'=>route('admin.activities.store'), 'id'=>'createActivityForm', 'class'=>'row gy-1 pt-75'])); ?>

                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name"><?php echo e(trans('common.name')); ?></label>
                            <?php echo e(Form::text('name','',['id'=>'name', 'class'=>'form-control'])); ?>

                        </div>

                     
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1"><?php echo e(trans('common.Save changes')); ?></button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                <?php echo e(trans('common.Cancel')); ?>

                            </button>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/activities/index.blade.php ENDPATH**/ ?>