<!-- form -->
<div class="row">



    <!-- subscription -->
    <div class="divider">
        <div class="divider-text"><?php echo e(trans('common.subscription')); ?></div>
    </div>
   
        <div class="row pt-2 pb-4">
            <h3><?php echo e(trans('common.subscription')); ?> </h3>
          
            <div class="col-12 col-md-4" style="margin-top:20px">
                <?php echo getSettingImageValue('subscription'.'img'); ?>

                <div class="file-loading"> 
                    <input class="files" name="subscriptionimg" type="file">
                </div>
            </div>
            
            <div class="col-12 col-md-8">
                <label class="form-label" for="subscriptiontitle"><?php echo e(trans('common.title')); ?></label>
                <?php echo e(Form::text('subscription'.'title',getSettingValue('subscription'.'title'),['id'=>'subscription'.'title','class'=>'form-control'])); ?>

            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="subscriptiondes"><?php echo e(trans('common.des')); ?></label>
                    <?php echo e(Form::textarea('subscription'.'des',getSettingValue('subscription'.'des'),['id'=>'subscription'.'des','class'=>'form-control','rows'=>'3'])); ?>

                </div>
            </div>
           
        </div>




</div>
<!--/ form --><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/includes/subscription.blade.php ENDPATH**/ ?>