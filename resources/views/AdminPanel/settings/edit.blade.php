@extends('AdminPanel.layouts.master')
@section('content')

<!-- form -->

 {{Form::open(['url'=>route('admin.settings.update'), 'files'=>'true'])}}
<div class="row">
    <div class="divider">
        <div class="divider-text"> Demos </div>
    </div>
  
    <div class="col-12 col-md-6">
        <label class="form-label" for="siteTitle_ar">  edit value </label>
        {{Form::text($setting->key,getSettingValue($setting->key),['id'=>'key','class'=>'form-control'])}}
    </div>

    <div class="card-footer">
        <input type="submit" value="{{trans('common.Save changes')}}" class="btn btn-primary">
    </div>
</div>
 {{Form::close()}}
<!--/ form -->

@stop