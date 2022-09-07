@extends('AdminPanel.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">

            <!-- profile -->
            <div class="card">
                <div class="card-body py-2 my-25">
                                
                    {{Form::open(['url'=>route('admin.clientUsers.update',['id'=>$client->id]),'files'=>'true','class'=>'validate-form'])}}

                        <!-- form -->
                        <div class="row pt-3">
                            <div class="col-12 col-sm-3 mb-1">
                                <label class="form-label" for="name">{{trans('common.name')}}</label>
                                {{Form::text('name',$client->name,['id'=>'name','class'=>'form-control','disabled'])}}
                            </div>

                            <div class="col-12 col-sm-3 mb-1">
                                <label class="form-label" for="email">{{trans('common.email')}}</label>
                                {{Form::text('email',$client->email,['id'=>'email','class'=>'form-control','disabled'])}}
                            </div>

                            <div class="col-12 col-sm-3 mb-1">
                                <label class="form-label" for="phone">{{trans('common.phone')}}</label>
                                {{Form::text('phone',$client->phone,['id'=>'phone','class'=>'form-control','disabled'])}}
                            </div>

                            <div class="col-12 col-sm-3 mb-1">
                                <label class="form-label" for="nemployees">{{trans('common.nemployees')}}</label>
                                {{Form::text('nemployees',$client->nemployees,['id'=>'nemployees','class'=>'form-control','disabled'])}}
                            </div>

                            <div class="col-12 col-sm-3 mb-1">
                                {{ Form::label('activity') }}
                                {{ Form::select('activity', $works , $client->activity, array('class'=>'form-control')) }}
                            </div>

                            <div class="col-12 col-sm-3 mb-1">
                                {{ Form::label('status') }}
                                {{ Form::select('status', ['not-contacted','contact'], $client->status , array('class'=>'form-control')) }}
                            </div>
                        
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-1 me-1">{{trans('common.Save changes')}}</button>
                            </div>
                        </div>
                        <!--/ form -->
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop