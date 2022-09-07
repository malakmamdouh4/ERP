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
                                <th class="text-center">{{trans('common.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                            <tr id="row_{{$application->id}}">
                                <td>
                                    {{$application->id}}
                                </td>
                                <td>
                                    <img src="{{asset($application->imageApplicationLink())}}" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    {{$application->title}}
                                </td>
                                <td>
                                    {{$application->description}}
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editApplication{{$application->id}}" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.applications.delete',['id'=>$application->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$application->id}}')">
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

                {{-- {{ $application->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@foreach($applications as $application)
    <div class="modal fade text-md-start" id="editApplication{{$application->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.Edit')}}: {{$application['title'.session()->get('Lang')]}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.applications.update',$application->id), 'id'=>'editApplicationForm'.$application->id, 'class'=>'row gy-1 pt-75'])}}
                       
                    <div class="col-12 col-md-4" style="margin-top:33px">
                                     
                     <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="title">{{trans('common.title')}}</label>
                            {{Form::text('title',$application->title,['id'=>'title','class'=>'form-control'])}}
                            </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="description">{{trans('common.description')}}</label>
                            {{Form::textarea('description',$application->description,['id'=>'description','class'=>'form-control','rows'=>'3'])}}
                        </div>
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
    <a href="javascript:;" data-bs-target="#createApplication" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.CreateNew')}}
    </a>

    <div class="modal fade text-md-start" id="createApplication" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.applications.store'), 'id'=>'createApplicationForm', 'class'=>'row gy-1 pt-75'])}}
                       
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