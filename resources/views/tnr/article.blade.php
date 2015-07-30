@extends('tnr.master.app')

@section('page-title')
{{ $type }}
@stop

@section('more-head-tags')
<style>#loadMore{margin-bottom: 10px;}</style>
@stop

@section('page-content')
<script type="text/javascript">
    $(document).ready(function ()
    {
        $.getJSON("{{ URL::route('tnr.index')}}/json/{{ $type }}", function (obj)
        {
            var size = obj.length;
            //var size = Math.ceil(size / 10);
            console.log(size);
            var i = 0;
            count = 0;
            if (size == 0)
            {
                $("#loadMore").hide();

                $("#show").append("<h1>No Article Here<h1>");
            }
            var perPage = new Array();

            for (; i < 10; i++)
            {
                perPage[i] = obj[i];
            }
            loadData(perPage);
            $("#loadMore").click(function ()
            {
                if (count <= size)
                {
                    count += 10;
                    console.log("count " + count);

                    var i = count;
                    console.log("I " + i);
                    var perPage = new Array();
                    var x = 0;
                    for (; i < count + 10; i++)
                    {
                        perPage[x] = obj[i];
                        x++;
                    }
                    loadData(perPage);
                }
                else {
                    return;
                }

            });
        });
    });
    function loadData(obj)
    {
        try {
            jQuery.each(obj, function (key, val)
            {
                console.log("id => " + val.id + "\n");
                $("#show").append("<a href='" + val.source_url + "'" + "><div class='thumbnail'><div class='caption media-body'><h3 class='media-header'>" + val.heading + "</h3><p>" + val.sub_heading + "</p></div></div></a>");

            });
        } catch (e)
        {
            console.log("Reached at end");
        }
    }
</script>
<div class="container">
    <div class="row" >
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" id="show"></div>
        <div class="hidden-xs hidden-sm col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <h1>LORUM IPSUM</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <button class="btn btn-default col-xs-12 col-sm-3 col-md-3" id="loadMore">Show More</button>
        </div>
    </div>
</div>


@stop