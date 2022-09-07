<!-- form -->
<div class="row">


     <!-- home -->
    <div class="divider">
        <div class="divider-text"><?php echo e(trans('common.homeSlider')); ?></div>
    </div>
   
        <div class="row pt-2 pb-4">
            <h3><?php echo e(trans('common.photo')); ?> </h3>
            
            <div class="col-md-12"></div>
            <div class="col-12 col-md-4" style="margin-top:20px">
                <?php echo getSettingImageValue('home'.'img'); ?>

                <div class="file-loading"> 
                    <input class="files" name="homeimg" type="file">
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="col-12 col-md-12">
                <label class="form-label" for="hometitle"><?php echo e(trans('common.title')); ?></label>
                <?php echo e(Form::text('home'.'title',getSettingValue('home'.'title'),['id'=>'home'.'title','class'=>'form-control'])); ?>

                </div>
            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="homedes"><?php echo e(trans('common.des')); ?></label>
                    <?php echo e(Form::textarea('home'.'des',getSettingValue('home'.'des'),['id'=>'home'.'des','class'=>'form-control','rows'=>'3'])); ?>

                </div>
            </div>
            
        </div>
 

   

</div>
<!--/ form --><?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/includes/home.blade.php ENDPATH**/ ?>