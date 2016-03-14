@extends('layouts.app')

@section('htmlheader_title')
    Daily Sales
@endsection

@section('custom_scripts')
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dailySales').dataTable();
        } );
    </script>


@endsection

@section('custom_css')
    <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')

    <section class="content">

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
                            <tr>
                                <td>Day 1</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>Day 2</td>
                                <td>33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>

    </section>





@endsection