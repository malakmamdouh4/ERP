@extends('AdminPanel.layouts.master')

@section('content')

    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row">
            
            <!-- Greetings Card starts -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="divider mt-0">
                            <div class="divider-text">{{trans('common.ShortCut')}}</div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card bg-primary text-white text-center">
                            <div class="card-body">
                                <a href="{{route('admin.clientUsers')}}" class="text-white">
                                    {{trans('common.Clients')}}
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card card-congratulations mb-0">
                    <div class="card-body text-center">
                        <img src="{{asset('AdminAssets/app-assets/images/elements/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('AdminAssets/app-assets/images/elements/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">{{trans('common.Congratulations')}}</h1>
                            <p class="card-text m-auto w-75">
                                <?php $publishers = 32; ?>
                                {{trans('common.You have reached the minimum amount to pay',['publishers'=>$publishers])}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Greetings Card ends -->

        </div>

    </section>
    <!-- Dashboard Analytics end -->

@stop

@section('new_style')
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/app-assets/css-rtl/plugins/charts/chart-apex.css')}}">
@stop

@section('scripts')
    <script src="{{asset('AdminAssets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <?php /*<script src="{{asset('AdminAssets/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>*/?>
    <script src="{{asset('AdminAssets/app-assets/js/scripts/pages/app-invoice-list.js')}}"></script>
    <!-- END: Page JS-->
    <script>
        $(window).on('load', function () {
            var $avgSessionStrokeColor2 = '#ebf0f7';
            var $avgSessionsChart = document.querySelector('#avg-sessions-chart');
            var avgSessionsChartOptions;
            var avgSessionsChart;
            // Average Session Chart
            // ----------------------------------
            avgSessionsChartOptions = {
                chart: {
                    type: 'bar',
                    height: 200,
                    sparkline: { enabled: true },
                    toolbar: { show: false }
                },
                states: {
                    hover: {
                    filter: 'none'
                    }
                },
                colors: [
                    window.colors.solid.primary,
                    window.colors.solid.primary,
                    window.colors.solid.primary,
                    window.colors.solid.primary,
                    window.colors.solid.primary,
                    window.colors.solid.primary
                ],
                series: [
                    {
                        name: 'Sessions',
                        data: [75, 125, 20, 175, 125, 75, 25]
                    }
                ],
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                        endingShape: 'rounded'
                    }
                },
                tooltip: {
                    x: { show: false }
                },
                xaxis: {
                    type: 'numeric'
                }
            };
            avgSessionsChart = new ApexCharts($avgSessionsChart, avgSessionsChartOptions);
            avgSessionsChart.render();

        });
    </script>
@stop
