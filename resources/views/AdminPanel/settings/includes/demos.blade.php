<!-- form -->

<div class="row">
    <div class="col-12 col-md-6">
        <label class="form-label" for="facebook"> Demo Link </label>
        {{Form::text('demoLink',getSettingValue('demoLink'),['id'=>'key','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="twitter"> Demo User </label>
        {{Form::text('demoUserName',getSettingValue('demoUserName'),['id'=>'key','class'=>'form-control'])}}
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="instagram"> Demo Password  </label>
        {{Form::text('demoPassword',getSettingValue('demoPassword'),['id'=>'key','class'=>'form-control'])}}
    </div> 
    <div style="clear:both"></div>
    

</div>

<!-- end form  -->

