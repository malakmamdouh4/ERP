
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
                                <th><?php echo e(trans('common.features')); ?></th>
                                <th class="text-center"><?php echo e(trans('common.actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr id="row_<?php echo e($feature->id); ?>">
                                <td>
                                    <?php echo e($feature->id); ?>

                                </td>
                                <td>
                                    <img src="<?php echo e(asset($feature->imageFeatureLink())); ?>" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    <?php echo e($feature->title); ?>

                                </td>
                                <td>
                                    <?php echo e($feature->description); ?>

                                </td>
                                <td>
                                    <?php if($feature->feature != ''): ?>
                                        <ul>
                                            <?php $__currentLoopData = $feature->featureArr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $featureItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <span><?php echo e($featureItem['icon']); ?></span>
                                                    <?php echo e($featureItem['title']); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                              
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editFeature<?php echo e($feature->id); ?>" data-bs-toggle="modal" class="btn btn-featuresIcon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?php echo e(trans('common.edit')); ?>">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.features.delete',['id'=>$feature->id]); ?>
                                    <button type="button" class="btn btn-featuresIcon btn-danger" onclick="confirmDelete('<?php echo e($delete); ?>','<?php echo e($feature->id); ?>')">
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



<?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade text-md-start" id="editFeature<?php echo e($feature->id); ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.Edit')); ?>: <?php echo e($feature['title'.session()->get('Lang')]); ?></h1>
                    </div>
                    <?php echo e(Form::open(['files'=>'true','url'=>route('admin.features.update',$feature->id), 'id'=>'editFeatureForm'.$feature->id, 'class'=>'row gy-1 pt-75'])); ?>

                       
                    <div class="col-12 col-md-4" style="margin-top:33px">
                                     
                     <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="title"><?php echo e(trans('common.title')); ?></label>
                            <?php echo e(Form::text('title',$feature->title,['id'=>'title','class'=>'form-control'])); ?>

                            </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="description"><?php echo e(trans('common.description')); ?></label>
                            <?php echo e(Form::textarea('description',$feature->description,['id'=>'description','class'=>'form-control','rows'=>'3'])); ?>

                        </div>
                    </div>

                    <div class="col-12 col-sm-3 mb-1">
                        <?php echo e(Form::label('type')); ?>

                        <?php echo e(Form::select('type', ['no-features','with-features'], $feature->type , array('class'=>'form-control'))); ?>

                    </div>

                     
                    <div class="repeatableNewFeatures col-sm-12">
                        <h4> features </h4>
                        <?php if($feature->feature != ''): ?>
                            <?php $__currentLoopData = $feature->featureArr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="More row">
                                    <div class="col-12 col-md-3">
                                        <label class="form-label">الأيقونة</label>
                                        <?php echo e(Form::text('featuresIcon[]',$feature['icon'],array('id'=>'featuresIcon','class'=>'form-control'))); ?>

                                    </div>
                                    <div class="col-12 col-md-8">
                                        <label class="form-label">العنوان</label>
                                        <?php echo e(Form::text('featuresTitle[]',$feature['title'],array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)'))); ?>

                                    </div> 
                                    <?php if($index > 0): ?>
                                        <div class="col-1 col-md-1 mt-2">
                                            <span class="delete btn btn-danger">
                                                حذف
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="More row">
                                <div class="col-12 col-md-3">
                                    <label class="form-label">الأيقونة</label>
                                    <?php echo e(Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control'))); ?>

                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="form-label">العنوان</label>
                                    <?php echo e(Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)'))); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-12">
                        <span class="add_NewFeature btn btn-sm btn-info">أضف جديد</span>
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
    <a href="javascript:;" data-bs-target="#createFeature" data-bs-toggle="modal" class="btn btn-primary">
        <?php echo e(trans('common.CreateNew')); ?>

    </a>

    <div class="modal fade text-md-start" id="createFeature" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1"><?php echo e(trans('common.CreateNew')); ?></h1>
                    </div>
                    <?php echo e(Form::open(['files'=>'true','url'=>route('admin.features.store'), 'id'=>'createFeatureForm', 'class'=>'row gy-1 pt-75'])); ?>

                       
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

                        <div class="col-12 col-sm-6 mb-1">
                                <?php echo e(Form::label('type')); ?>

                                <?php echo e(Form::select('type', ['no-features','with-features'], null, array('class'=>'form-control'))); ?>

                        </div>

                        <div class="repeatableFeatures col-sm-12">
                            <h4> features </h4>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label class="form-label">الأيقونة</label>
                                    <?php echo e(Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control'))); ?>

                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="form-label">العنوان</label>
                                    <?php echo e(Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="add_Feature btn btn-sm btn-info">أضف جديد</span>
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
    <script type="text/template" id="RepeatFeatureTPL">
        <div class="More row">
            <div class="col-12 col-md-3">
                <label class="form-label">الأيقونة</label>
                <?php echo e(Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control'))); ?>

            </div>
            <div class="col-12 col-md-8">
                <label class="form-label">العنوان</label>
                <?php echo e(Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)'))); ?>

            </div>
            <div class="col-1 col-md-1 mt-2">
                <span class="delete btn btn-danger">
                    حذف
                </span>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var max_fields          = 50;
            var wrapper             = $(".repeatableFeatures");
            var add_button          = $(".add_Feature");
            var wrapperNew             = $(".repeatableNewFeatures");
            var add_buttonNew          = $(".add_NewFeature");
            var RepeatOpponentTPL   = $("#RepeatFeatureTPL").html();

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });
            $(add_buttonNew).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapperNew).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });
            
            $(wrapperNew).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('AdminPanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel techno\ERP\resources\views/AdminPanel/features/index.blade.php ENDPATH**/ ?>