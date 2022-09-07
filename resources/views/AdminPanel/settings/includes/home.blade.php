<!-- form -->
<div class="row">


     <!-- home -->
    <div class="divider">
        <div class="divider-text">{{trans('common.homeSlider')}}</div>
    </div>
   
        <div class="row pt-2 pb-4">
            <h3>{{trans('common.photo')}} </h3>
            
            <div class="col-md-12"></div>
            <div class="col-12 col-md-4" style="margin-top:20px">
                {!! getSettingImageValue('home'.'img') !!}
                <div class="file-loading"> 
                    <input class="files" name="homeimg" type="file">
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="col-12 col-md-12">
                <label class="form-label" for="hometitle">{{trans('common.title')}}</label>
                {{Form::text('home'.'title',getSettingValue('home'.'title'),['id'=>'home'.'title','class'=>'form-control'])}}
                </div>
            </div>

            <div class="col-md-12"></div>
            <div class="col-12 col-md-12">
                <div class="col-12 col-md-12">
                    <label class="form-label" for="homedes">{{trans('common.des')}}</label>
                    {{Form::textarea('home'.'des',getSettingValue('home'.'des'),['id'=>'home'.'des','class'=>'form-control','rows'=>'3'])}}
                </div>
            </div>
            
        </div>
 

   

</div>
<!--/ form -->