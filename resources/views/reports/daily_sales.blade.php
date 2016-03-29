@extends('layouts.app')

@section('htmlheader_title')
    Daily Sales
@endsection

@section('custom_scripts')
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script-->



    <script type="text/javascript">
        $(document).ready(function() {
            $('#dailySales').dataTable();
        } );
    </script>


    <script>



        {{--var ctx = document.getElementById("barChartDailySales").getContext("2d");--}}

        {{--var data = {--}}
            {{--labels: {!! json_encode($days) !!},--}}
            {{--datasets: [--}}
                {{--{--}}
                    {{--label: "Daily Sales",--}}
                    {{--fillColor: "rgba(255,154,0,0.5)",--}}
                    {{--strokeColor: "rgba(174,104,0,0.8)",--}}
                    {{--highlightFill: "rgba(255,154,0,0.75)",--}}
                    {{--highlightStroke: "rgba(174,104,0,1)",--}}
                    {{--data: {!! json_encode($totals) !!}--}}
                {{--}--}}
            {{--]--}}
        {{--};--}}

        {{--var options = {--}}
            {{--scaleBeginAtZero : true,--}}
            {{--scaleShowGridLines : true,--}}
            {{--scaleGridLineColor : "rgba(0,0,0,.05)",--}}
            {{--scaleGridLineWidth : 1,--}}
            {{--scaleShowHorizontalLines: true,--}}
            {{--scaleShowVerticalLines: true,--}}
            {{--barShowStroke : true,--}}
            {{--barStrokeWidth : 2,--}}
            {{--barValueSpacing : 30,--}}
            {{--barDatasetSpacing : 1--}}
        {{--};--}}

        {{--var myBarChart = new Chart(ctx).Line(data);--}}

    </script>

@endsection

@section('custom_css')
    <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daily report sales</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="dailySales">

                            <thead>
                            <tr>
                                <th>Day</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($totals as $index => $total)
                            <tr>
                                <td>{{$days[$index]}}</td>
                                <td>{{$total}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="chart">
                            <!--canvas height="227" width="510" id="barChartDailySales" style="height: 227px; width: 510px;"></canvas-->
                            <graph  :labels='{!!  json_encode($days) !!}'
                                    :values='{!!  json_encode($totals) !!}' ></graph>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>



    </section>


@endsection