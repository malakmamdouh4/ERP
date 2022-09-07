<!-- form -->
<div class="row">


     <!-- services -->
    <div class="divider">
        <div class="divider-text">{{trans('common.services')}}</div>
    </div>


       <div class="col-12 col-md-12">
            <div class="col-12 col-md-12">
            <label class="form-label" for="servicetitle">{{trans('common.title')}}</label>
            {{Form::text('service'.'title',getSettingValue('service'.'title'),['id'=>'service'.'title','class'=>'form-control'])}}
            </div>
        </div>

        <div class="col-md-12"></div>
        <div class="col-12 col-md-12">
            <div class="col-12 col-md-12">
                <label class="form-label" for="servicedes">{{trans('common.des')}}</label>
                {{Form::textarea('service'.'des',getSettingValue('service'.'des'),['id'=>'service'.'des','class'=>'form-control','rows'=>'3'])}}
            </div>
        </div>



        <!-- applications -->
        <div class="divider">
            <div class="divider-text">{{trans('common.applications')}}</div>
        </div>


        <div class="col-12 col-md-12">
               <div class="col-12 col-md-12">
                <label class="form-label" for="applicationtitle">{{trans('common.title')}}</label>
                {{Form::text('application'.'title',getSettingValue('application'.'title'),['id'=>'application'.'title','class'=>'form-control'])}}
                </div>
            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="applicationdes">{{trans('common.des')}}</label>
                    {{Form::textarea('application'.'des',getSettingValue('application'.'des'),['id'=>'application'.'des','class'=>'form-control','rows'=>'3'])}}
                </div>
        </div>


</div>
<!--/ form -->




    