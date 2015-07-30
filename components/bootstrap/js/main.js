$(document).ready(function()
{
    $(window).scroll(function()
    {
        var scroll = $(window).scrollTop();
        
        if(scroll >= 64)
        {
            $("#logo").hide();
            $(".nav li a").addClass(".onScroll");
        }
        else if(scroll <64)
        {
            $("#logo").show();
            
            $(".onScroll").removeClass(".onScroll");
        }
    });
    
});
