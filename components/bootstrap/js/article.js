$(document).ready(function()
{
    alert("dsd");
   $.get("http://localhost/news_reporter/include/getArticle.php?id="+$.urlParam("id")+"&type="+$.urlParam("type"),function(data)
   {
        alert(data);
   }); 
});

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}