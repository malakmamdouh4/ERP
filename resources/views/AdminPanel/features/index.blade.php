@extends('AdminPanel.layouts.master')
@section('content')


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$title}}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr> 
                                <th>{{trans('common.id')}}</th>
                                <th>{{trans('common.image')}}</th>
                                <th>{{trans('common.title')}}</th>
                                <th>{{trans('common.description')}}</th>
                                <th>{{trans('common.features')}}</th>
                                <th class="text-center">{{trans('common.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($features as $feature)
                            <tr id="row_{{$feature->id}}">
                                <td>
                                    {{$feature->id}}
                                </td>
                                <td>
                                    <img src="{{asset($feature->imageFeatureLink())}}" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    {{$feature->title}}
                                </td>
                                <td>
                                    {{$feature->description}}
                                </td>
                                <td>
                                    @if($feature->feature != '')
                                        <ul>
                                            @foreach($feature->featureArr() as $index => $featureItem)
                                                <li>
                                                    <span>{{$featureItem['icon']}}</span>
                                                    {{$featureItem['title']}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                              
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editFeature{{$feature->id}}" data-bs-toggle="modal" class="btn btn-featuresIcon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.features.delete',['id'=>$feature->id]); ?>
                                    <button type="button" class="btn btn-featuresIcon btn-danger" onclick="confirmDelete('{{$delete}}','{{$feature->id}}')">
                                        <i data-feather='trash-2'></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 text-center ">
                                        <h2>{{trans('common.nothingToView')}}</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- {{ $feature->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@foreach($features as $feature)
    <div class="modal fade text-md-start" id="editFeature{{$feature->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.Edit')}}: {{$feature['title'.session()->get('Lang')]}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.features.update',$feature->id), 'id'=>'editFeatureForm'.$feature->id, 'class'=>'row gy-1 pt-75'])}}
                       
                    <div class="col-12 col-md-4" style="margin-top:33px">
                                     
                     <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="title">{{trans('common.title')}}</label>
                            {{Form::text('title',$feature->title,['id'=>'title','class'=>'form-control'])}}
                            </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="description">{{trans('common.description')}}</label>
                            {{Form::textarea('description',$feature->description,['id'=>'description','class'=>'form-control','rows'=>'3'])}}
                        </div>
                    </div>

                    <div class="col-12 col-sm-3 mb-1">
                        {{ Form::label('type') }}
                        {{ Form::select('type', ['no-features','with-features'], $feature->type , array('class'=>'form-control')) }}
                    </div>

                     
                    <div class="repeatableNewFeatures col-sm-12">
                        <h4> features </h4>
                        @if($feature->feature != '')
                            @foreach($feature->featureArr() as $index => $feature)
                                <div class="More row">
                                    <div class="col-12 col-md-3">
                                        <label class="form-label">الأيقونة</label>
                                        {{ Form::text('featuresIcon[]',$feature['icon'],array('id'=>'featuresIcon','class'=>'form-control')) }}
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <label class="form-label">العنوان</label>
                                        {{ Form::text('featuresTitle[]',$feature['title'],array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)')) }}
                                    </div> 
                                    @if($index > 0)
                                        <div class="col-1 col-md-1 mt-2">
                                            <span class="delete btn btn-danger">
                                                حذف
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="More row">
                                <div class="col-12 col-md-3">
                                    <label class="form-label">الأيقونة</label>
                                    {{ Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control')) }}
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="form-label">العنوان</label>
                                    {{ Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)')) }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <span class="add_NewFeature btn btn-sm btn-info">أضف جديد</span>
                    </div>

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">{{trans('common.Save changes')}}</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            {{trans('common.Cancel')}}
                        </button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endforeach

@stop




@section('page_buttons')
    <a href="javascript:;" data-bs-target="#createFeature" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.CreateNew')}}
    </a>

    <div class="modal fade text-md-start" id="createFeature" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.features.store'), 'id'=>'createFeatureForm', 'class'=>'row gy-1 pt-75'])}}
                       
                        <div class="col-12 col-md-4" style="margin-top:33px">
                            <div class="file-loading"> 
                                <input class="files" name="image" type="file">
                            </div>
                        </div>

                        <div class="col-12 col-md-8">
                            <label class="form-label" for="title">{{trans('common.title')}}</label>
                            {{Form::text('title','',['id'=>'title', 'class'=>'form-control'])}}
                        </div>

                        <div class="col-12 col-md-12">
                            <label class="form-label" for="section1des">{{trans('common.description')}}</label>
                            {{Form::textarea('description','',['id'=>'description','class'=>'form-control'])}}
                        </div>

                        <div class="col-12 col-sm-6 mb-1">
                                {{ Form::label('type') }}
                                {{ Form::select('type', ['no-features','with-features'], null, array('class'=>'form-control')) }}
                        </div>

                        <div class="repeatableFeatures col-sm-12">
                            <h4> features </h4>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label class="form-label">الأيقونة</label>
                                    {{ Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control')) }}
                                </div>
                                <div class="col-12 col-md-9">
                                    <label class="form-label">العنوان</label>
                                    {{ Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <span class="add_Feature btn btn-sm btn-info">أضف جديد</span>
                        </div>
                      

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">{{trans('common.Save changes')}}</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                {{trans('common.Cancel')}}
                            </button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop



@section('scripts')
    <script type="text/template" id="RepeatFeatureTPL">
        <div class="More row">
            <div class="col-12 col-md-3">
                <label class="form-label">الأيقونة</label>
                {{ Form::text('featuresIcon[]','',array('id'=>'featuresIcon','class'=>'form-control')) }}
            </div>
            <div class="col-12 col-md-8">
                <label class="form-label">العنوان</label>
                {{ Form::text('featuresTitle[]','',array('id'=>'featuresTitle','class'=>'form-control','onkeyup'=>'updateTotals(this)')) }}
            </div>
            <div class="col-1 col-md-1 mt-2">
                <span class="delete btn btn-danger">
                    حذف
                </span>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var max_fields          = 50;
            var wrapper             = $(".repeatableFeatures");
            var add_button          = $(".add_Feature");
            var wrapperNew             = $(".repeatableNewFeatures");
            var add_buttonNew          = $(".add_NewFeature");
            var RepeatOpponentTPL   = $("#RepeatFeatureTPL").html();

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });
            $(add_buttonNew).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapperNew).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });
            
            $(wrapperNew).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });

        });
    </script>

@stop
