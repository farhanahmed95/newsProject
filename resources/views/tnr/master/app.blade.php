<!DOCTYPE html>
<html>
    <head>
        <title>@yield('page-title') - The News Reporter</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <style>
            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 100;
                src: url('https://themes.googleusercontent.com/font?kit=7KXg6nyyqN8gyMoNwQ7aOQ') format('woff');
            }
            *
            {
                font-family: Roboto;
            }
            body { padding-top: 140px; }
            .navbar
            {
                background-color: #F44336;
                color: #fff;
            }
            #logo
            {
                height: 70px;
                background-color: #F44336;
            }
            #logo h1
            {
                font-family: Roboto;
            }
            .nav li a
            {
                color: #fff;
            }

            .nav li:hover a
            {
                background-color: #B71C1C;
            }

            .navbar-brand
            {
                color: #fff;
                font-family: Roboto;
            }
            .navbar-brand:hover
            {
                color: #B71C1C;
            }
            #navbar-button .icon-bar
            {
                background-color: #fff;
            }

            .thumbnail
            {
                border-radius: 0px;
                padding: 0px; 
            }
            #feature-section-title
            {
                padding: 10px;
                background-color: #D9D9D9;
            }
            #feature-section-title a
            {
                font-weight: bolder;
                text-decoration: none;
            }
            #feature-section-title a:hover
            {
                color:#B71C1C;
            }
            #activeHoverColor
            {
                background-color: #B71C1C;
            }
            #activeBlurColor
            {
                background-color: #F44336;

            }
            .thumbnail a img
            {
                width: 100%;
                height: 250px;
            }
            .thumbnail a
            {
                color: black;
            }
            .thumbnail a:hover
            {
                color: #F44336;
            }
            #articleBody
            {
                line-height: 180%;
            }
            .navbar-brand{
                margin-left: 10px;
            }
            @media (max-width: 767px) {
                body {
                    padding-top: 80px;
                }
            }
        </style>

        @yield('more-head-tags')
    </head>

    <body>
        <nav class="navbar navbar-fixed-top">
            <div class="row">
                <div class="col-xs-12 hidden-xs" id="logo">
                    <h1 class="text-center"><b>The News Reporter</b></h1>
                </div>
            </div>
            <div class="row">
                <div class="navbar-header">
                    <button id="navbar-button" class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="visible-xs-block">
                        <a href="{{ URL::route('tnr.index') }}" class="navbar-brand"><b>The News Reporter</b></a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="container">
                        <ul class="nav nav-justified">
                            <li class="active"><a href="{{ URL::route('tnr.index') }}">Home</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/World">World</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Sports">Sports</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Tech">Tech</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Business">Business</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/LifeStyle">LifeStyle</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Entertainment">Entertainment</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Food">Food</a></li>
                            <li><a href="{{ URL::route('tnr.index') }}/Health">Health</a></li>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">$(document).ready(function ()
{
    $(window).scroll(function ()
    {
        var scroll = $(window).scrollTop();

        if (scroll >= 64)
        {
            $("#logo").hide();
            $(".nav li a").addClass(".onScroll");
        }
        else if (scroll < 64)
        {
            $("#logo").show();

            $(".onScroll").removeClass(".onScroll");
        }
    });

});
                </script>
            </div>
        </nav>
        <div class='container'>
            <h1 style="color:red">TNR TEST VERSION</h1>
            <p>This is The News Reporter TEST VERSION, Developed By FARHAN AHMED</p>
        </div>
        @yield('page-content')
        <div class="container">
            <footer style="margin-top:50px;margin-bottom: 50px;">
                <p class="text-center">TNR Developed By Farhan Ahmed</p>
            </footer>

        </div>
    </body>

</html>