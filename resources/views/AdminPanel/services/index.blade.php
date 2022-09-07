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
                            @forelse($services as $service)
                            <tr id="row_{{$service->id}}">
                                <td>
                                    {{$service->id}}
                                </td>
                                <td>
                                    <img src="{{asset($service->imageLink())}}" style="width:50px;height:50px;margin-right:10px">
                                </td>
                                <td>
                                    {{$service->title}}
                                </td>
                                <td>
                                    {{$service->description}}
                                </td>
                                <td class="text-center">
                                    <a href="javascript:;" data-bs-target="#editService{{$service->id}}" data-bs-toggle="modal" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>

                                    <?php $delete = route('admin.services.delete',['id'=>$service->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$service->id}}')">
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

                {{-- {{ $service->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@foreach($services as $service)
    <div class="modal fade text-md-start" id="editService{{$service->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.Edit')}}: {{$service['title'.session()->get('Lang')]}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.services.update',$service->id), 'id'=>'editServiceForm'.$service->id, 'class'=>'row gy-1 pt-75'])}}
                       
                    <div class="col-12 col-md-4" style="margin-top:33px">
                                     
                     <div class="file-loading"> 
                            <input class="files" name="image" type="file">
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                            <label class="form-label" for="title">{{trans('common.title')}}</label>
                            {{Form::text('title',$service->title,['id'=>'title','class'=>'form-control'])}}
                    </div>

                    <div class="col-12 col-md-12">
                            <label class="form-label" for="description">{{trans('common.description')}}</label>
                            {{Form::textarea('description',$service->description,['id'=>'description','class'=>'form-control','rows'=>'3'])}}
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
    <a href="javascript:;" data-bs-target="#createService" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.CreateNew')}}
    </a>

    <div class="modal fade text-md-start" id="createService" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.CreateNew')}}</h1>
                    </div>
                    {{Form::open(['files'=>'true','url'=>route('admin.services.store'), 'id'=>'createServiceForm', 'class'=>'row gy-1 pt-75'])}}
                       
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