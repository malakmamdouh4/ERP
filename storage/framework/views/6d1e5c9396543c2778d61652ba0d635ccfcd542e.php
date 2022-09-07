
<?php $__env->startSection('content'); ?>


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <?php echo e(Form::open(['url'=>route('admin.settings.update'), 'files'=>'true'])); ?>

            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">


                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="false">
                                <i data-feather="home"></i> <?php echo e(trans('common.home')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" id="subscription-tab" data-bs-toggle="tab" href="#subscription" aria-controls="subscription" role="tab" aria-selected="false">
                                <i data-feather="list"></i> <?php echo e(trans('common.subscription')); ?>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="siteData-tab" data-bs-toggle="tab" href="#siteData" aria-controls="siteData" role="tab" aria-selected="false">
                                <i data-feather="image"></i> <?php echo e(trans('common.siteData')); ?>

                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" aria-controls="images" role="tab" aria-selected="false">
                                <i data-feather="images"></i> <?php echo e(trans('common.images')); ?>

                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="demo-tab" data-bs-toggle="tab" href="#demo" aria-controls="home" role="tab" aria-selected="true">
                                  <?php echo e(trans('common.demo')); ?>

                            </a>
                        </li>
                       
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                            <?php echo $__env->make('AdminPanel.settings.includes.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="tab-pane" id="subscription" aria-labelledby="subscription-tab" role="tabpanel">
                            <?php echo $__env->make('AdminPanel.settings.includes.subscription', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    
                        <div class="tab-pane" id="siteData" aria-labelledby="siteData-tab" role="tabpanel">
                            <?php echo $__env->make('AdminPanel.settings.includes.sitedata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="tab-pane" id="images" aria-labelledby="images-tab" role="tabpanel">
                            <?php echo $__env->make('AdminPanel.settings.includes.images', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="tab-pane" id="demo" aria-labelledby="demo-tab" role="tabpanel">
                            <?php echo $__env->make('AdminPanel.settings.includes.demos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" value="<?php echo e(trans('common.Save changes')); ?>" class="btn btn-primary">
                </div>
                
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
    <!-- Bordered table end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/index.blade.php ENDPATH**/ ?>