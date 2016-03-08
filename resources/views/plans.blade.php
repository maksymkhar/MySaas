@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
        </div>

    </div><!-- /.register-box -->



    <style>

        .pricing-container{
            display: flex;
            display: -webkit-flex;
            flex-flow: row wrap;
            -webkit-flex-flow: row wrap;
        }

        .columna1,
        .columna2,
        .columna3,
        .columna4 {
            flex: 1;
        }

        @media (min-width: 600px) {

            .columna1,
            .columna2 {
                width: 50%;
            }
            .columna3,
            .columna4 {
                width: 50%;
            }
        }
        @media (min-width: 800px) {
            .columna1,
            .columna2,
            .columna3,
            .columna4 {
                width: 25%;
            }
        }

        .pricing-card {
            background: white;
            padding: 10px;
            margin: 10px;
            border: black solid 1px;
            border-radius: 25px;

        }

        .card-header {
            text-align: center;
            border-radius: 25px;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .bck-red {
            background: #ff514f;
        }

        .bck-blue {
            background: #517fff;
        }

        .bck-orange {
            background: #ffac43;
        }

        .bck-green {
            background: #68bd48;
        }


        .card-body {
            margin: 10px;
        }

        .card-footer {
            text-align: center;
            border-radius: 25px;
            color: white;

        }

        .pricing-link {
            color: white;
            font-weight: bold;
        }

        .price {
            font-size: 15px;
        }

        ul.pricing-list {
            list-style: none;
        }
        ul.pricing-list li {
            list-style: none;
            text-indent: -1.4em;
            margin: 1em 2em;
        }
        ul.pricing-list li:before {
            font-family: FontAwesome;
            content: "\f00c";
            float: left;
            width: 1.4em;
            color: #69aa46;
        }
        ul.pricing-list li.uncheck:before {
            content: "\f00d";
            color: red;
        }
    </style>

    <div class="pricing-container">

        <section class="columna1">

            <div class="pricing-card">

                <div class="card-header bck-red">
                    Pricing plan 1
                    <p class="price">FREE</p>
                </div>

                <div class="card-body">
                    <ul class="pricing-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Dolorem ducimus enim eum ipsam modi, non. Sint!</li>
                        <li class="uncheck">Animi at eligendi exercitationem illum modi quidem, voluptatem.</li>
                        <li class="uncheck">Enim est magnam nisi ullam veniam? Amet, quidem?</li>
                        <li class="uncheck">Animi consectetur exercitationem modi molestiae nihil ratione recusandae.</li>
                    </ul>
                </div>

                <div class="card-footer bck-red">
                    <a class="pricing-link" href="{{url('register')}}">REGISTER</a>
                </div>

            </div>

        </section>

        <section class="columna2">

            <div class="pricing-card">

                <div class="card-header bck-blue">
                    Pricing plan 2
                    <p class="price">40€/Month</p>
                </div>

                <div class="card-body">
                    <ul class="pricing-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Dolorem ducimus enim eum ipsam modi, non. Sint!</li>
                        <li>Animi consectetur exercitationem modi molestiae nihil ratione recusandae.</li>
                        <li>Animi at eligendi exercitationem illum modi quidem, voluptatem.</li>
                        <li class="uncheck">Enim est magnam nisi ullam veniam? Amet, quidem?</li>
                    </ul>
                </div>

                <div class="card-footer bck-blue">
                    <a class="pricing-link" href="{{url('register_subscription')}}">REGISTER</a>
                </div>

            </div>

        </section>

        <section class="columna3">

            <div class="pricing-card">

                <div class="card-header bck-orange">
                    Pricing plan 3
                    <p class="price">50€/Month</p>
                </div>

                <div class="card-body">
                    <ul class="pricing-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Dolorem ducimus enim eum ipsam modi, non. Sint!</li>
                        <li>Animi at eligendi exercitationem illum modi quidem, voluptatem.</li>
                        <li class="uncheck">Enim est magnam nisi ullam veniam? Amet, quidem?</li>
                    </ul>
                </div>

                <div class="card-footer bck-orange">
                    <a class="pricing-link" href="#">REGISTER</a>
                </div>

            </div>

        </section>

        <section class="columna4">

            <div class="pricing-card">

                <div class="card-header bck-green">
                    Pricing plan 4
                    <p class="price">60€/Month</p>
                </div>

                <div class="card-body">
                    <ul class="pricing-list">
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Dolorem ducimus enim eum ipsam modi, non. Sint!</li>
                        <li>Animi at eligendi exercitationem illum modi quidem, voluptatem.</li>
                        <li>Enim est magnam nisi ullam veniam? Amet, quidem?</li>
                        <li>Animi consectetur exercitationem modi molestiae nihil ratione recusandae.</li>
                    </ul>
                </div>

                <div class="card-footer bck-green">
                    <a class="pricing-link" href="#">REGISTER</a>
                </div>

            </div>

        </section>

    </div>





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