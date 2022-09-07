<!-- form -->

<div class="row">
    <div class="col-12 col-md-6">
        <label class="form-label" for="facebook"> Demo Link </label>
        <?php echo e(Form::text('demoLink',getSettingValue('demoLink'),['id'=>'key','class'=>'form-control'])); ?>

    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="twitter"> Demo User </label>
        <?php echo e(Form::text('demoUserName',getSettingValue('demoUserName'),['id'=>'key','class'=>'form-control'])); ?>

    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="instagram"> Demo Password  </label>
        <?php echo e(Form::text('demoPassword',getSettingValue('demoPassword'),['id'=>'key','class'=>'form-control'])); ?>

    </div> 
    <div style="clear:both"></div>
    

</div>

<!-- end form  -->

<?php /**PATH F:\laravel-projects\ERP\resources\views/AdminPanel/settings/includes/demos.blade.php ENDPATH**/ ?>