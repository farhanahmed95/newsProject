/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    $.getJSON("http://api.openweathermap.org/data/2.5/forecast/daily?q="+city+"&cnt=7&mode=json",function(data)
    { 
        $("#weatherData").empty();
        $("#weatherData").append("<i class='fa fa-sun-o'></i> "+city.toLocaleUpperCase()+" | "+parseInt(data.list[0].temp.day-273)+"<sup>o</sup>");
    });
}