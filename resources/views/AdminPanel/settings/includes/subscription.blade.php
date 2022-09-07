<!-- form -->
<div class="row">



    <!-- subscription -->
    <div class="divider">
        <div class="divider-text">{{trans('common.subscription')}}</div>
    </div>
   
        <div class="row pt-2 pb-4">
            <h3>{{trans('common.subscription')}} </h3>
          
            <div class="col-12 col-md-4" style="margin-top:20px">
                {!! getSettingImageValue('subscription'.'img') !!}
                <div class="file-loading"> 
                    <input class="files" name="subscriptionimg" type="file">
                </div>
            </div>
            
            <div class="col-12 col-md-8">
                <label class="form-label" for="subscriptiontitle">{{trans('common.title')}}</label>
                {{Form::text('subscription'.'title',getSettingValue('subscription'.'title'),['id'=>'subscription'.'title','class'=>'form-control'])}}
            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="subscriptiondes">{{trans('common.des')}}</label>
                    {{Form::textarea('subscription'.'des',getSettingValue('subscription'.'des'),['id'=>'subscription'.'des','class'=>'form-control','rows'=>'3'])}}
                </div>
            </div>
           
        </div>




</div>
<!--/ form -->