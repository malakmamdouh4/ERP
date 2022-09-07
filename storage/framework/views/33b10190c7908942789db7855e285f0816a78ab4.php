<!-- form -->
<div class="row">

            

      <!-- dashboard -->
    <div class="divider">
        <div class="divider-text"><?php echo e(trans('common.dashboard')); ?></div>
    </div>

      <!-- header of dashboard -->
        <div class="row pt-2 pb-4">
            <h3><?php echo e(trans('common.dashboard')); ?> </h3>
          
            <div class="col-md-12"></div>
            <div class="col-12 col-md-4">
                <?php echo getSettingImageValue('dashboard'.'img'); ?>

                <div class="file-loading"> 
                    <input class="files" name="dashboardimg" type="file">
                </div>
            </div>

        </div>


          <!-- logo -->
    <div class="divider">
        <div class="divider-text"><?php echo e(trans('common.logoo')); ?></div>
    </div>

      <!-- header of dashboard -->
        <div class="row pt-2 pb-4">
            <h3><?php echo e(trans('common.logoo')); ?> </h3>
          
            <div class="col-md-12"></div>
            <div class="col-12 col-md-4">
                <?php echo getSettingImageValue('logo'.'img'); ?>

                <div class="file-loading"> 
                    <input class="files" name="logoimg" type="file">
                </div>
            </div>

        </div>


       

</div>
<!--/ form -->




    <?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/includes/images.blade.php ENDPATH**/ ?>