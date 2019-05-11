@extends('layouts.master_admin')

@section('page_style')
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin_bsb_template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{asset('admin_bsb_template//plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{asset('admin_bsb_template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin_bsb_template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('admin_bsb_template/plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('admin_bsb_template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admin_bsb_template/css/themes/all-themes.css')}}" rel="stylesheet" />


    <!-- For charts -->
    <!-- Waves Effect Css -->
    <link href="{{asset('admin_bsb_template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin_bsb_template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- For tables -->
    <!-- JQuery DataTable Css -->
    <link href="{{asset('admin_bsb_template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@stop

@section('content')
	<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Select -->
    <div class="row clearfix" style="display: none;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <!-- <div class="header">
                    <h2>
                        SELECT
                    </h2>
                    
                </div> -->
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4 col-4">
                            <select class="form-control show-tick">
                                <option value="" selected="">-- Please select --</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-sm-4  col-4">
                            <select class="form-control">
                                <option value="" selected="">-- Please select --</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-sm-4  col-4">
                            <select class="form-control">
                                <option value="" selected="">-- Please select --</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Select -->

    <?php //echo '<pre>'; var_export($bar_chart);?>

	<section class="content" style="margin-left: 0; margin-top: 0;">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Exportable Table -->
            <section>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    EXPORTABLE TABLE
                                </h2>
                                
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td style="text-align: right">Week</td>
                                                <td style="text-align: right">Start</td>
                                                <td style="text-align: right">End</td>
                                                <td style="text-align: right"> EST Total</td>
                                                <td style="text-align: right"> EST FW</td>
                                                <td style="text-align: right"> EST NFW</td>
                                                <td style="text-align: right"> ACT Qty</td>
                                                <td style="text-align: right"> ACT FW</td>
                                                <td style="text-align: right"> ACT NFW</td>
                                                <td style="text-align: right"> EST Total</td>
                                                <td style="text-align: right"> EST FW</td>
                                                <td style="text-align: right"> EST NFW</td>
                                                <td style="text-align: right"> ACT Qty</td>
                                                <td style="text-align: right"> ACT FW</td>
                                                <td style="text-align: right"> ACT NFW</td>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td style="text-align: right">Week</td>
                                                <td style="text-align: right">Start</td>
                                                <td style="text-align: right">End</td>
                                                <td style="text-align: right"> EST Total</td>
                                                <td style="text-align: right"> EST FW</td>
                                                <td style="text-align: right"> EST NFW</td>
                                                <td style="text-align: right"> ACT Qty</td>
                                                <td style="text-align: right"> ACT FW</td>
                                                <td style="text-align: right"> ACT NFW</td>
                                                <td style="text-align: right"> EST Total</td>
                                                <td style="text-align: right"> EST FW</td>
                                                <td style="text-align: right"> EST NFW</td>
                                                <td style="text-align: right"> ACT Qty</td>
                                                <td style="text-align: right"> ACT FW</td>
                                                <td style="text-align: right"> ACT NFW</td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                                @foreach($report_info as $info)
                                                    <tr>
                                                        <td><?php echo ($info->week_in != null) ? $info->week_in : '';?></a></td>
                                                        <td><?php echo ($info->date_from != null) ? $info->date_from : '';?></a></td>
                                                        <td><?php echo ($info->date_to != null) ? $info->date_to : '';?></a></td>
                                                        
                                                        <td style="text-align: right"><?php if($info->total_est!=null){echo $info->total_est;} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->fw_est!=null){echo number_format($info->fw_est);} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->nfw_est!=null){echo number_format($info->nfw_est);} else{echo '-';} ?></td>
                                                        
                                                        <td style="text-align: right"><?php if($info->tot_qty!=null){echo $info->tot_qty;} else{echo '-';} ?>
                                                        </td>
                                                        <td style="text-align: right"><?php if($info->tot_fw!=null){echo number_format($info->tot_fw);} else{echo '-';} ?>
                                                        </td>
                                                        <td style="text-align: right"><?php if($info->tot_nfw!=null){echo number_format($info->tot_nfw);} else{echo '-';} ?>
                                                        </td>
                                                        
                                                         <td style="text-align: right"><?php if($info->total_est_value!=null){echo $info->total_est_value;} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->fw_est_value!=null){echo number_format($info->fw_est_value);} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->nfw_est_value!=null){echo number_format($info->nfw_est_value);} else{echo '-';} ?></td>
                                                        
                                                         <td style="text-align: right"><?php if($info->tot_value!=null){echo $info->tot_value;} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->tot_fw_value!=null){echo number_format($info->tot_fw_value);} else{echo '-';} ?></td>
                                                        <td style="text-align: right"><?php if($info->tot_nfw_value!=null){echo number_format($info->tot_nfw_value);} else{echo '-';} ?></td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- #END# Exportable Table -->

            <!-- Widgets -->
            <div class="row clearfix" style="display: none;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Quantity</div>
                            <div class="number count-to" data-from="0" data-to="{{$data->first()->total_qty}}" data-speed="15" data-fresh-interval=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Value</div>
                            <div class="number count-to" data-from="0" data-to="{{$data->first()->tot_price1}}" data-speed="1000" data-fresh-interval=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">arrow_downward</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Discount</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">transform</i>
                        </div>
                        <div class="content">
                            <div class="text">Average</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <!-- Widgets -->
            <div class="row clearfix" style="display: none;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">ABS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">ABV</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Diversity</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <!-- CPU Usage -->
            <div class="row clearfix" style="display: none;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CPU USAGE (%)</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                    </div>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix" style="display: none;">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                12,10,9,6,5,6,10,5,7,5,12,13,7,12,11
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">LATEST SOCIAL TRENDS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    #socialtrends
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>
                                    #materialdesign
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>#adminbsb</li>
                                <li>#freeadmintemplate</li>
                                <li>#bootstraptemplate</li>
                                <li>
                                    #freehtmltemplate
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST YEAR
                                    <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    ALL
                                    <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>


            <!-- Flot chart -->
            <section class="content" style="margin-left: 0; display: none;">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>
                            FLOT CHART
                            <small>Taken from <a href="http://www.flotcharts.org" target="_blank">www.flotcharts.org</a></small>
                        </h2>
                    </div>

                    <!-- Multiple Axis -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>MULTIPLE AXIS</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="multiple_axis_chart" class="flot-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Multiple Axis -->
                    <!-- Tracking -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>TRACKING</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="tracking_chart" class="flot-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Tracking -->
                </div>
            </section>

            <!-- Chart -->
            <div class="clearfix">
                <!-- Charts -->
                <section class="content" style="margin-left: 0;">
                    <div class="container-fluid">
                        <div class="block-header" style="display: none;">
                            <h2>
                                ChartJS
                                <small>Taken from <a href="https://github.com/chartjs/Chart.js" target="_blank">github.com/chartjs/Chart.js</a></small>
                            </h2>
                        </div>
                        <div class="row clearfix">
                            <!-- Line Chart -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: none;">
                                <div class="card">
                                    <div class="header">
                                        <h2>LINE CHART</h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <canvas id="line_chart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Line Chart -->
                            <!-- Bar Chart -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>BAR CHART</h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <canvas id="bar_chart" height="150" style="width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Bar Chart -->
                        </div>

                        <div class="row clearfix" style="display: none;">
                            <!-- Radar Chart -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>RADAR CHART</h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <canvas id="radar_chart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Radar Chart -->
                            <!-- Pie Chart -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>PIE CHART</h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);">Action</a></li>
                                                    <li><a href="javascript:void(0);">Another action</a></li>
                                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <canvas id="pie_chart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- #END# Pie Chart -->
                        </div>
                    </div>
                </section>
            </div>

            <!-- Morris chart -->
            <section class="content" style="margin-left: 0; display: none;" style="display: none;">
                <div class="container-fluid">
                    <div class="block-header">
                        <h2>
                            MORRIS
                            <small>Taken from <a href="https://github.com/morrisjs/morris.js" target="_blank">github.com/morrisjs/morris.js</a></small>
                        </h2>
                    </div>
                    <div class="row clearfix" >
                        <!-- Line Chart -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>LINE CHART</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="morris_line_chart" class="graph"></div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Line Chart -->
                        <!-- Bar Chart -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>BAR CHART</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="morris_bar_chart" class="graph"></div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Bar Chart -->
                    </div>
                    <div class="row clearfix">
                        <!-- Area Chart -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>AREA CHART</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="area_chart" class="graph"></div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Area Chart -->
                        <!-- Donut Chart -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>DONUT CHART</h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="donut_chart" class="graph"></div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Donut Chart -->
                    </div>
                </div>
            </section>

            <div class="row clearfix" style="display: none;">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Manager</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Task A</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Task B</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Task C</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Task D</td>
                                            <td><span class="label bg-orange">Wait Approvel</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Task E</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>BROWSER USAGE</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="dashboard-donut-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>

        </div>
    </section>
@endsection

@section('script')
	<!-- Bootstrap Core Js -->
    <script src="{{asset('admin_bsb_template/plugins/bootstrap/js/bootstrap.js')}}"></script>

	<!-- Select Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('admin_bsb_template/js/admin.js')}}"></script>
    <script src="{{asset('admin_bsb_template/js/pages/index.js')}}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/autosize/autosize.js')}}"></script>
    <!-- Form elements -->
    <!-- <script src="{{asset('admin_bsb_template/js/pages/forms/basic-form-elements.js')}}"></script> -->

    <!-- Demo Js -->
    <script src="{{asset('admin_bsb_template/js/demo.js')}}"></script>



    <!-- For charts -->
    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/node-waves/waves.js')}}"></script>

    <!-- Chart Plugins Js -->
    <script src="{{asset('admin_bsb_template/plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{{asset('admin_bsb_template/js/pages/charts/chartjs.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/morrisjs/morris.js')}}"></script>
    <script src="{{asset('admin_bsb_template/js/pages/charts/morris.js')}}"></script>

    <!-- Flot Chart Plugins Js -->
    <script src="{{asset('admin_bsb_template/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/flot-charts/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin_bsb_template/js/pages/charts/flot.js')}}"></script>

    <!-- For data tables -->
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin_bsb_template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('admin_bsb_template/js/pages/tables/jquery-datatable.js')}}"></script>

    //js/chartjs
    <script type="text/javascript">
        $(function () {
            new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
            new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
            new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
            new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
        });

        function getChartJs(type) {
            var config = null;

            if (type === 'line') {
                config = {
                    type: 'line',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [{
                            label: "My First dataset",
                            data: [65, 59, 80, 81, 56, 55, 40],
                            borderColor: 'rgba(0, 188, 212, 0.75)',
                            backgroundColor: 'rgba(0, 188, 212, 0.3)',
                            pointBorderColor: 'rgba(0, 188, 212, 0)',
                            pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                            pointBorderWidth: 1
                        }, {
                                label: "My Second dataset",
                                data: [28, 48, 40, 19, 86, 27, 90],
                                borderColor: 'rgba(233, 30, 99, 0.75)',
                                backgroundColor: 'rgba(233, 30, 99, 0.3)',
                                pointBorderColor: 'rgba(233, 30, 99, 0)',
                                pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                                pointBorderWidth: 1
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            else if (type === 'bar') {
                config = {
                    type: 'bar',
                    data: {
                        labels: @json($bar_chart['weeks']),
                        datasets: [{
                            label: "First dataset",
                            data: @json($bar_chart['actuals']),
                            backgroundColor: 'rgba(0, 0, 255, 0.8)'
                        }, {
                            label: "Second dataset",
                            data: @json($bar_chart['actuals']),
                            backgroundColor: 'rgba(233, 30, 99, 0.8)'
                        }, {
                            label: "hird dataset",
                            data: @json($bar_chart['actuals']),
                            backgroundColor: 'rgba(0, 255, 0, 0.8)'
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            else if (type === 'radar') {
                config = {
                    type: 'radar',
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [{
                            label: "My First dataset",
                            data: [65, 25, 90, 81, 56, 55, 40],
                            borderColor: 'rgba(0, 188, 212, 0.8)',
                            backgroundColor: 'rgba(0, 188, 212, 0.5)',
                            pointBorderColor: 'rgba(0, 188, 212, 0)',
                            pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
                            pointBorderWidth: 1
                        }, {
                                label: "My Second dataset",
                                data: [72, 48, 40, 19, 96, 27, 100],
                                borderColor: 'rgba(233, 30, 99, 0.8)',
                                backgroundColor: 'rgba(233, 30, 99, 0.5)',
                                pointBorderColor: 'rgba(233, 30, 99, 0)',
                                pointBackgroundColor: 'rgba(233, 30, 99, 0.8)',
                                pointBorderWidth: 1
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            else if (type === 'pie') {
                config = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [225, 50, 100, 40],
                            backgroundColor: [
                                "rgb(233, 30, 99)",
                                "rgb(255, 193, 7)",
                                "rgb(0, 188, 212)",
                                "rgb(139, 195, 74)"
                            ],
                        }],
                        labels: [
                            "Pink",
                            "Amber",
                            "Cyan",
                            "Light Green"
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
            return config;
        }
    </script>
@stop