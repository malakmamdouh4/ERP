<!-- form -->
<div class="row">


     <!-- services -->
    <div class="divider">
        <div class="divider-text"><?php echo e(trans('common.services')); ?></div>
    </div>


       <div class="col-12 col-md-12">
            <div class="col-12 col-md-12">
            <label class="form-label" for="servicetitle"><?php echo e(trans('common.title')); ?></label>
            <?php echo e(Form::text('service'.'title',getSettingValue('service'.'title'),['id'=>'service'.'title','class'=>'form-control'])); ?>

            </div>
        </div>

        <div class="col-md-12"></div>
        <div class="col-12 col-md-12">
            <div class="col-12 col-md-12">
                <label class="form-label" for="servicedes"><?php echo e(trans('common.des')); ?></label>
                <?php echo e(Form::textarea('service'.'des',getSettingValue('service'.'des'),['id'=>'service'.'des','class'=>'form-control','rows'=>'3'])); ?>

            </div>
        </div>



        <!-- applications -->
        <div class="divider">
            <div class="divider-text"><?php echo e(trans('common.applications')); ?></div>
        </div>


        <div class="col-12 col-md-12">
               <div class="col-12 col-md-12">
                <label class="form-label" for="applicationtitle"><?php echo e(trans('common.title')); ?></label>
                <?php echo e(Form::text('application'.'title',getSettingValue('application'.'title'),['id'=>'application'.'title','class'=>'form-control'])); ?>

                </div>
            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="applicationdes"><?php echo e(trans('common.des')); ?></label>
                    <?php echo e(Form::textarea('application'.'des',getSettingValue('application'.'des'),['id'=>'application'.'des','class'=>'form-control','rows'=>'3'])); ?>

                </div>
        </div>


</div>
<!--/ form -->




    <?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/includes/sitedata.blade.php ENDPATH**/ ?>