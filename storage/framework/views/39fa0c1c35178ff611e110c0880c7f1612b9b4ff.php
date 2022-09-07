
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
                                <th><?php echo e(trans('common.name')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.users')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($role->id); ?>">
                                <td>
                                    <?php echo e($role['name_ar']); ?><br>
                                    <?php echo e($role['name_en']); ?><br>
                                    <?php echo e($role['name_fr']); ?>

                                </td>
                                <td class="text-center">
                                    <?php echo e($role->users()->count()); ?>

                                </td>
                                <td class="text-center">
                                    <?php if(!in_array($role->id,['1'])): ?>
                                        <a href="javascript:;" data-bs-target="#editRole<?php echo e($role->id); ?>" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                            <i data-feather='edit'></i>
                                        </a>
                                        <?php $delete = route('admin.roles.delete',['id'=>$role->id]); ?>
                                        <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($role->id); ?>')">
                                            <i data-feather='trash-2'></i>
                                        </button>
                                    <?php else: ?>
                                    -
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

                <?php echo e($roles->links('vendor.pagination.default')); ?>



            </div>
        </div>
    </div>
    <!-- Bordered table end -->

<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="modal fade text-md-start" id="editRole<?php echo e($role->id); ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.Edit')); ?>: <?php echo e($role['name_'.session()->get('Lang')]); ?></h1>
                    </div>
                    <?php echo e(Form::open(['url'=>route('admin.roles.update',$role->id), 'id'=>'editRoleForm'.$role->id, 'class'=>'row gy-1 pt-75'])); ?>

                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_ar"><?php echo e(trans('common.name_ar')); ?></label>
                            <?php echo e(Form::text('name_ar',$role->name_ar,['id'=>'name_ar', 'class'=>'form-control'])); ?>

                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_en"><?php echo e(trans('common.name_en')); ?></label>
                            <?php echo e(Form::text('name_en',$role->name_en,['id'=>'name_en', 'class'=>'form-control'])); ?>

                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_fr"><?php echo e(trans('common.name_fr')); ?></label>
                            <?php echo e(Form::text('name_fr',$role->name_fr,['id'=>'name_fr', 'class'=>'form-control'])); ?>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mt-2 pt-50"><?php echo e(trans('common.Role Permissions')); ?></h4>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap fw-bolder">
                                                    <?php echo e(trans('common.Select All')); ?>

                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('common.Allows a full access to the system')); ?>">
                                                        <i data-feather="info"></i>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll"> <?php echo e(trans('common.Select All')); ?> </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = getPermissions($role->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-nowrap fw-bolder"><?php echo e($permissionGroup['name'] ?? ''); ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php $__currentLoopData = $permissionGroup['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-check me-3 me-lg-1">
                                                                    <input class="form-check-input" type="checkbox" id="permission<?php echo e($permission['id']); ?>" name="permissions[]" value="<?php echo e($permission['id']); ?>" <?php if($permission['hasIt'] == 1): ?> checked <?php endif; ?> />
                                                                    <label class="form-check-label" for="permission<?php echo e($permission['id']); ?>"> <?php echo e($permission['name']); ?> </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
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
    <a href="javascript:;" data-bs-target="#createRole" data-bs-toggle="modal" class="btn btn-primary">
        <?php echo e(trans('common.CreateNew')); ?>

    </a>

    <div class="modal fade text-md-start" id="createRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.CreateNew')); ?></h1>
                    </div>
                    <?php echo e(Form::open(['url'=>route('admin.roles.store'), 'id'=>'createRoleForm', 'class'=>'row gy-1 pt-75'])); ?>

                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_ar"><?php echo e(trans('common.name_ar')); ?></label>
                            <?php echo e(Form::text('name_ar','',['id'=>'name_ar', 'class'=>'form-control'])); ?>

                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_en"><?php echo e(trans('common.name_en')); ?></label>
                            <?php echo e(Form::text('name_en','',['id'=>'name_en', 'class'=>'form-control'])); ?>

                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label" for="name_fr"><?php echo e(trans('common.name_fr')); ?></label>
                            <?php echo e(Form::text('name_fr','',['id'=>'name_fr', 'class'=>'form-control'])); ?>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4 class="mt-2 pt-50"><?php echo e(trans('common.Role Permissions')); ?></h4>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            <tr>
                                                <td class="text-nowrap fw-bolder">
                                                    <?php echo e(trans('common.Select All')); ?>

                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('common.Allows a full access to the system')); ?>">
                                                        <i data-feather="info"></i>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll"> <?php echo e(trans('common.Select All')); ?> </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = getPermissions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-nowrap fw-bolder"><?php echo e($permissionGroup['name'] ?? ''); ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php $__currentLoopData = $permissionGroup['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-check me-3 me-lg-1">
                                                                    <input class="form-check-input" type="checkbox" id="permission<?php echo e($permission['id']); ?>" name="permissions[]" value="<?php echo e($permission['id']); ?>" />
                                                                    <label class="form-check-label" for="permission<?php echo e($permission['id']); ?>"> <?php echo e($permission['name']); ?> </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('AdminAssets/app-assets/js/scripts/pages/modal-add-role.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/roles/index.blade.php ENDPATH**/ ?>