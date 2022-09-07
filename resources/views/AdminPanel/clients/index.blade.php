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
                                <th>{{trans('common.name')}}</th>
                                <th>{{trans('common.email')}}</th>
                                <th>{{trans('common.phone')}}</th>
                                <th>{{trans('common.status')}}</th>
                                <th class="text-center">{{trans('common.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                            <tr id="row_{{$client->id}}">
                                <td>
                                    {{$client->id}}
                                </td>
                                <td>
                                    {{$client->name}}
                                </td>
                                <td>{{$client->email}}</td>
                                <td>
                                    {{$client->phone}}
                                </td>
                                <td>
                                    @if($client->status == 1)  <p> contact </p>
                                    @elseif($client->status == 0) <p> not-contacted </p> 
                                    @else <p> unknown </p>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('admin.clientUsers.edit',['id'=>$client->id])}}" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{trans('common.edit')}}">
                                        <i data-feather='edit'></i>
                                    </a>
                                    <?php $delete = route('admin.clientUsers.delete',['id'=>$client->id]); ?>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="confirmDelete('{{$delete}}','{{$client->id}}')">
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

                {{-- {{ $client->links('vendor.pagination.default') }} --}}

            </div>
        </div>
    </div>
    <!-- Bordered table end -->



@stop


@section('page_buttons')
    <a href="javascript:;" data-bs-target="#searchClients" data-bs-toggle="modal" class="btn btn-primary">
        {{trans('common.search')}}
    </a>

    <div class="modal fade text-md-start" id="searchClients" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">{{trans('common.search')}}</h1>
                    </div>
                    {{Form::open(['url'=>route('admin.filterClients'), 'id'=>'searchClientsForm', 'class'=>'row gy-1 pt-75','method'=>'GET'])}}
                        
                       <div class="col-12 col-md-3">
                            <label class="form-label" for="work">{{trans('common.work')}}</label>
                            {{Form::select('work',
                                                    [''=>trans('common.work')]
                                                    + App\Activity::pluck('name','id')->all(),
                                                    isset($_GET['work']) ? $_GET['work'] : '',['id'=>'work', 'class'=>'form-control selectpicker','data-live-search'=>'true'])}}
                        </div>

                        <div class="col-12 col-md-3">
                            <label class="form-label" for="status">{{trans('common.status')}}</label>
                            {{Form::select('status',
                                                    [''=>trans('common.status')]
                                                    + ['not-contacted','contact'],
                                                    isset($_GET['status']) ? $_GET['status'] : '',['id'=>'status', 'class'=>'form-control selectpicker','data-live-search'=>'true'])}}
                        </div>

                        <div class="col-12 col-md-3">
                            <label class="form-label" for="from_date">{{trans('common.from_date')}}</label>
                            {{Form::date('from_date',isset($_GET['from_date']) ? $_GET['from_date'] : '',['id'=>'from_date', 'class'=>'form-control'])}}
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label" for="to_date">{{trans('common.to_date')}}</label>
                            {{Form::date('to_date',isset($_GET['to_date']) ? $_GET['to_date'] : '',['id'=>'to_date', 'class'=>'form-control'])}}
                        </div>   
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1">{{trans('common.search')}}</button>
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