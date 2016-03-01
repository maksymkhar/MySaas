@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Collapsable</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div style="display: block;" class="box-body">
                        The body of the box
                    </div>
                    <!-- /.box-body -->
                </div>

        </div>
    </div>
@endsection
