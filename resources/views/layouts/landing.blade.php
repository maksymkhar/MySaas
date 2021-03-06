<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pratt - Free Bootstrap 3 Theme">
    <meta name="author" content="Alvarez.is - BlackTie.co">

    <title>Acacha AdminLTE Laravel package template Landing page - Using Pratt</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="css/all.css" class="style">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('/js/jquery.backstretch.min.js') }}"></script>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>adminlte-laravel</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smothscroll">Home</a></li>
                <li><a href="#desc" class="smothscroll">Description</a></li>
                <li><a href="#showcase" class="smothScroll">Showcase</a></li>
                <li><a href="#contact" class="smothScroll">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/plans') }}">Register</a></li>
                @elseif(Auth::user()->name != null)
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                @else()
                    <li><a href="/home">{{ Auth::user()->email }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>

<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>No idea <b><a href="https://github.com/acacha/adminlte-laravel">Jolo Compolo</a></b></h1>
                <h3>A <a href="https://laravel.com/">Laravel</a> 5 package that switchs default Laravel
                    scaffolding/boilerplate to <a href="https://almsaeedstudio.com/preview">AdminLTE</a> template with
                    <a href="http://getbootstrap.com/">Bootstrap</a> 3.0 and <a href="http://blacktie.co/demo/pratt/">Pratt</a> Landing page</h3>
                <h3><a href="{{ url('/plans') }}" class="btn btn-lg btn-success">Get Started!</a></h3>
            </div>
            <div class="col-lg-4">
                <h5>Amazing admin template</h5>
                <p>Based on adminlte bootstrap theme</p>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
            </div>
            <div class="col-lg-4">
                <!--img class="img-responsive" src="{{ asset('/img/app-bg.png') }}" alt=""-->
                <iframe src="https://appetize.io/embed/0y4rcah6cv4qkbdky3ced7e9zg?device=iphone5s&scale=75&autoplay=false&orientation=portrait&deviceColor=black"
                        height="587px"
                        frameborder="0"
                        scrolling="no"></iframe>
            </div>
            <div class="col-lg-4">
                <br>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                <h5>Awesome packaged...</h5>
                <p>... by <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a> at <a href="http://acacha.org">acacha.org</a> ready to use with Laravel!</p>
            </div>
        </div>
    </div> <!--/ .container -->


</div><!--/ #headerwrap -->


<section id="showcase" name="showcase"></section>
<div id="showcase">
    <div class="container">
        <div class="row">
            <h1 class="centered">Check out our servicess</h1>
            <br>
            <div class="col-lg-8 col-lg-offset-2">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ asset('/img/item-01.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('/img/item-02.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
                <h3><a href="{{ url('/plans') }}" class="btn btn-lg btn-success">REGISTER!</a></h3>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div><!-- /container -->
</div>


<section id="contact" name="contact"></section>
<div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3>Address</h3>
            <p>
                Av. Greenville 987,<br/>
                New York,<br/>
                90873<br/>
                United States
            </p>
        </div>

        <div class="col-lg-7">
            <h3>Drop Us A Line</h3>
            <br>
            <form role="form" action="{{url('sendContactEmail')}}" method="post" enctype="plain">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name1">Your Name</label>
                    <input type="text" name="Name" class="form-control" id="name1" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Your Text</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
            </form>
        </div>
    </div>

</div>
<div id="c">
    <div class="container">
        <p>
            <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. A Laravel 5 package that switchs default Laravel scaffolding/boilerplate to AdminLTE template.<br/>
            <strong>Copyright &copy; 2015 <a href="http://acacha.org">Acacha.org</a>.</strong> Created by <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a>. See code at <a href="https://github.com/acacha/adminlte-laravel">Github</a>
            <br/>
            AdminLTE created by Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
            <br/>
             Pratt Landing Page Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a>
        </p>



    </div>


    <!--div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_dd" href="https://www.addtoany.com/share?linkurl=https%3A%2F%2Fgithub.com%2Fmaksymkhar%2FMySaas&amp;linkname=MySaas"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_google_plus"></a>
    </div>
    <script>
        var a2a_config = a2a_config || {};
        a2a_config.linkname = "MySaas";
        a2a_config.linkurl = "https://github.com/maksymkhar/MySaas";
    </script>
    <script async src="https://static.addtoany.com/menu/page.js"></script-->








</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>

<script src="js/all.js"></script>
@include('layouts.partials.flash_message')

<script>
    $('#headerwrap').backstretch([
        '/img/slide_1.jpg',
        '/img/slide_2.jpg',
        '/img/slide_3.jpg'
        //, "./assets/img/background_3.jpg"
    ], {duration: 3000, fade: 750});
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56eb1402b198c6fc"></script>


</body>
</html>
