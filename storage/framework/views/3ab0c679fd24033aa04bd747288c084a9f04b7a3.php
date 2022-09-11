
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
                                <th><?php echo e(trans('common.image')); ?></th>
                                <th><?php echo e(trans('common.title')); ?></th>
                                <th><?php echo e(trans('common.description')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($application->id); ?>">
                                <td>
                                    <?php echo e($application->id); ?>

                                </td>
                                <td>
                                    <img src="<?php echo e(asset($application->imageApplicationLink())); ?>" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    <?php echo e($application->title); ?>

                                </td>
                                <td>
                                    <?php echo e($application->description); ?>

                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editApplication<?php echo e($application->id); ?>" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.applications.delete',['id'=>$application->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($application->id); ?>')">
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



<?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade text-md-start" id="editApplication<?php echo e($application->id); ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.Edit')); ?>: <?php echo e($application['title'.session()->get('Lang')]); ?></h1>
                    </div>
                    <?php echo e(Form::open(['files'=>'true','url'=>route('admin.applications.update',$application->id), 'id'=>'editApplicationForm'.$application->id, 'class'=>'row gy-1 pt-75'])); ?>

                       
                    <div class="col-12 col-md-4" style="margin-top:33px">
                                     
                     <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="title"><?php echo e(trans('common.title')); ?></label>
                            <?php echo e(Form::text('title',$application->title,['id'=>'title','class'=>'form-control'])); ?>

                            </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="description"><?php echo e(trans('common.description')); ?></label>
                            <?php echo e(Form::textarea('description',$application->description,['id'=>'description','class'=>'form-control','rows'=>'3'])); ?>

                        </div>
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
    <a href="javascript:;" data-bs-target="#createApplication" data-bs-toggle="modal" class="btn btn-primary">
        <?php echo e(trans('common.CreateNew')); ?>

    </a>

    <div class="modal fade text-md-start" id="createApplication" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.CreateNew')); ?></h1>
                    </div>
                    <?php echo e(Form::open(['files'=>'true','url'=>route('admin.applications.store'), 'id'=>'createApplicationForm', 'class'=>'row gy-1 pt-75'])); ?>

                       
                        <div class="col-12 col-md-4" style="margin-top:33px">
                            <div class="file-loading"> 
                                <input class="files" name="image" type="file">
                            </div>
                        </div>

                        <div class="col-12 col-md-8">
                            <label class="form-label" for="title"><?php echo e(trans('common.title')); ?></label>
                            <?php echo e(Form::text('title','',['id'=>'title', 'class'=>'form-control'])); ?>

                        </div>

                        <div class="col-12 col-md-12">
                            <label class="form-label" for="section1des"><?php echo e(trans('common.description')); ?></label>
                            <?php echo e(Form::textarea('description','',['id'=>'description','class'=>'form-control'])); ?>

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
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/applications/index.blade.php ENDPATH**/ ?>