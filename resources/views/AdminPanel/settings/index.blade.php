@extends('AdminPanel.layouts.master')
@section('content')


    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            {{Form::open(['url'=>route('admin.settings.update'), 'files'=>'true'])}}
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">


                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="false">
                                <i data-feather="home"></i> {{trans('common.home')}}
                            </a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" id="subscription-tab" data-bs-toggle="tab" href="#subscription" aria-controls="subscription" role="tab" aria-selected="false">
                                <i data-feather="list"></i> {{trans('common.subscription')}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="siteData-tab" data-bs-toggle="tab" href="#siteData" aria-controls="siteData" role="tab" aria-selected="false">
                                <i data-feather="image"></i> {{trans('common.siteData')}}
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" aria-controls="images" role="tab" aria-selected="false">
                                <i data-feather="images"></i> {{trans('common.images')}}
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" id="demo-tab" data-bs-toggle="tab" href="#demo" aria-controls="home" role="tab" aria-selected="true">
                                  {{trans('common.demo')}}
                            </a>
                        </li>
                       
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.home')
                        </div>

                        <div class="tab-pane" id="subscription" aria-labelledby="subscription-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.subscription')
                        </div>
                    
                        <div class="tab-pane" id="siteData" aria-labelledby="siteData-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.sitedata')
                        </div>

                        <div class="tab-pane" id="images" aria-labelledby="images-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.images')
                        </div>

                        <div class="tab-pane" id="demo" aria-labelledby="demo-tab" role="tabpanel">
                            @include('AdminPanel.settings.includes.demos')
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" value="{{trans('common.Save changes')}}" class="btn btn-primary">
                </div>
                
            </div>
            {{Form::close()}}
        </div>
    </div>
    <!-- Bordered table end -->
@stop