
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
                                <th><?php echo e(trans('common.phone')); ?></th>
                                <th><?php echo e(trans('common.status')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($client->id); ?>">
                                <td>
                                    <?php echo e($client->id); ?>

                                </td>
                                <td>
                                    <?php echo e($client->name); ?>

                                </td>
                                <td><?php echo e($client->email); ?></td>
                                <td>
                                    <?php echo e($client->phone); ?>

                                </td>
                                <td>
                                    <?php if($client->status == 1): ?>  <p> contact </p>
                                    <?php elseif($client->status == 0): ?> <p> not-contacted </p> 
                                    <?php else: ?> <p> unknown </p>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.clientUsers.edit',['id'=>$client->id])); ?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                        <i data-feather='edit'></i>
                                    </a>
                                    <?php $delete = route('admin.clientUsers.delete',['id'=>$client->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($client->id); ?>')">
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



<?php $__env->stopSection(); ?>


<?php $__env->startSection('page_buttons'); ?>
    <a href="javascript:;" data-bs-target="#searchClients" data-bs-toggle="modal" class="btn btn-primary">
        <?php echo e(trans('common.search')); ?>

    </a>

    <div class="modal fade text-md-start" id="searchClients" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.search')); ?></h1>
                    </div>
                    <?php echo e(Form::open(['url'=>route('admin.filterClients'), 'id'=>'searchClientsForm', 'class'=>'row gy-1 pt-75','method'=>'GET'])); ?>

                        
                       <div class="col-12 col-md-3">
                            <label class="form-label" for="work"><?php echo e(trans('common.work')); ?></label>
                            <?php echo e(Form::select('work',
                                                    [''=>trans('common.work')]
                                                    + App\Activity::pluck('name','id')->all(),
                                                    isset($_GET['work']) ? $_GET['work'] : '',['id'=>'work', 'class'=>'form-control selectpicker','data-live-search'=>'true'])); ?>

                        </div>

                        <div class="col-12 col-md-3">
                            <label class="form-label" for="status"><?php echo e(trans('common.status')); ?></label>
                            <?php echo e(Form::select('status',
                                                    [''=>trans('common.status')]
                                                    + ['not-contacted','contact'],
                                                    isset($_GET['status']) ? $_GET['status'] : '',['id'=>'status', 'class'=>'form-control selectpicker','data-live-search'=>'true'])); ?>

                        </div>

                        <div class="col-12 col-md-3">
                            <label class="form-label" for="from_date"><?php echo e(trans('common.from_date')); ?></label>
                            <?php echo e(Form::date('from_date',isset($_GET['from_date']) ? $_GET['from_date'] : '',['id'=>'from_date', 'class'=>'form-control'])); ?>

                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label" for="to_date"><?php echo e(trans('common.to_date')); ?></label>
                            <?php echo e(Form::date('to_date',isset($_GET['to_date']) ? $_GET['to_date'] : '',['id'=>'to_date', 'class'=>'form-control'])); ?>

                        </div>   
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1"><?php echo e(trans('common.search')); ?></button>
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
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/clients/index.blade.php ENDPATH**/ ?>