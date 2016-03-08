@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            Plan 2
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('auth/partials/register')




        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>


            <form action="" method="POST" id="payment-form">
                <span class="payment-errors"></span>


                <div class="form-group has-feedback">
                    <input class="form-control" type="text" placeholder="Card Number" size="20" data-stripe="number"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input class="form-control" type="text" placeholder="CVC" size="4" data-stripe="cvc"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-row">

                    <label>
                        <span>Expiration (MM/YYYY)</span>
                        <input type="text" size="2" data-stripe="exp-month"/>
                    </label>
                    <span> / </span>
                    <input type="text" size="4" data-stripe="exp-year"/>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit Payment</button>
            </form>



        </div>






    </div><!-- /.register-box -->
















    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection
