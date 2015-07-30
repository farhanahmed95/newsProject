@extends('tnr.master.app')

@section('page-title')
Home
@stop
@section('more-head-tags')
<style>
    #hotNews .caption
    {
        background-color: #D9D9D9;
        color:black;
    }
    #feature-section-box
    {
        padding-top: 100px;
        background-color: black;
        padding-bottom: 100px;
    }
    
</style>
@stop

@section('page-content')
<div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="front-big-news">
        <a href="{{ URL::route('tnr.index') }}/{{ $main_heading[0]->type }}/{{ $main_heading[0]->slug }}">
            <div class="thumbnail">
                <img id="front-big-news-img" class="img-responsive" src="{{ $main_heading[0]->image_url }}"/>
                <div class="caption">
                    <h2>{{ $main_heading[0]->heading }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="thumbnail" id="hotNews">
            <div class="caption">
                <p class="h3">Hot News</p>
            </div>

            <table class="table table-hover">



                @foreach($hot_news as $hotNews)
                <tr>
                    <td><a href="{{ URL::route('tnr.index') }}/{{ $hotNews->type }}/{{ $hotNews->slug }}">{{ $hotNews->heading }}</a></td>
                </tr>
                @endforeach


            </table>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p class="h4">Weather</p>
            </div>

            <table class="table table-hover">
                <tr>
                    <td class="h2">
                        <form onsubmit="return false;" class="form form-inline">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-globe"></span>        
                                    </div>
                                    <input type="text" name="city" placeholder="City" required class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <script>
                                    $(document).ready(function ()
                                    {
                                        loadWeatherInfo();
                                    });
                                    function loadWeatherData()
                                    {
                                        var city = $(".form input[type=text]").val();
                                        loadWeatherInfo(city);

                                    }

                                    function loadWeatherInfo(city)
                                    {

                                        city = typeof city !== 'undefined' ? city : "lahore";
                                        $.getJSON("http://api.openweathermap.org/data/2.5/forecast/daily?q=" + city + "&cnt=7&mode=json", function (data)
                                        {
                                            try {
                                                $("#weatherData").empty();
                                                $("#weatherData").append("<i class='fa fa-sun-o'></i> " + data.city.name.toLocaleUpperCase() + " | " + parseInt(data.list[0].temp.day - 273) + "<sup>o</sup>");
                                            } catch (e)
                                            {
                                                $("#weatherData").empty();
                                                $("#weatherData").append("<i>Can't Find City</i>");

                                            }
                                        });
                                    }
                                </script>
                                <button type="submit" class="btn btn-danger"  onclick="loadWeatherData()"><span class="glyphicon glyphicon-search" ></span> Find</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="h4" id="weatherData"></td>
                </tr>

            </table>
        </div>
    </div>
</div>
</div>
<div id='feature-section-box' >
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p style="color:white"class="page-header h2">Featured Section</p>
            </div>
        </div>

        <div class="row">
            @foreach($featured_section as $featured_news)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">

                <div class="col-xs-12" id="feature-section-title">
                    <a href="{{ URL::route('tnr.index') }}/{{ $featured_news[0]->type }}" class="text-left text-uppercase h3">{{ $featured_news[0]->type }} <span class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                </div>

                <div class="thumbnail" id='scale'>

                    <a href="{{ URL::route('tnr.index') }}/{{ $featured_news[0]->type }}/{{ $featured_news[0]->slug }}">
                        
                        <img src="{{ $featured_news[0]->image_url }}" id="img"/>
                        <div class="caption">
                            <p class="h4"><a href="{{ URL::route('tnr.index') }}/{{ $featured_news[0]->type }}/{{ $featured_news[0]->slug }}">{{ $featured_news[0]->heading }}</a></p>
                        </div>
                    </a>
                    <table class="table table-hover">


                        @foreach($featured_news as $news)
                        @if($news->id != $featured_news[0]->id)
                        <tr>
                            <td><a class="h5" href="{{ URL::route('tnr.index') }}/{{ $news->type }}/{{ $news->slug }}">{{ $news->heading }}</a></td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop