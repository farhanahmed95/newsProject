$(document).ready(function ()
{
    var type = $.urlParam("type");
    
    $.get("/news_reporter/include/rowData.php?type="+type, function (data)
    {
        obj = jQuery.parseJSON(data);
        var size = obj.length;
        //var size = Math.ceil(size / 10);
        console.log(size);
        var i = 0;
        count = 0;
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
        $("#show").append("<a href='article.php?id=" + val.id+"&type="+val.type + "'><div class='thumbnail'><div class='caption media-body'><h3 class='media-header'>" + val.title + "</h3><p>" + val.body.content.substring(0, 50) + "</p></div></div></a>");

    });
    }catch (e)
    {
        console.log("nothing to load");
    }
}
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}