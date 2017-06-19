$(document).ready(function(){
    //Auto Complete Search
    jQuerySearch("#search").autocomplete("search1.php", {
        selectFirst: true
        });
   
    //Hide and Show Google Map
    $("button#findstore").click(function(){
        $("#map").fadeToggle();
    });
    
    //Detail Slide Images 1
    $('li#slaveimage1').click(function(){
     var values = $('li#slaveimage1').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Detail Slide Images 2
    $('li#slaveimage2').click(function(){
     var values = $('li#slaveimage2').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Detail Slide Images 3
    $('li#slaveimage3').click(function(){
     var values = $('li#slaveimage3').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Detail Slide Images 4
    $('li#slaveimage4').click(function(){
     var values = $('li#slaveimage4').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Detail Slide Images 5
    $('li#slaveimage5').click(function(){
     var values = $('li#slaveimage5').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Detail Slide Images 6
    $('li#slaveimage0').click(function(){
     var values = $('li#slaveimage0').attr('value');
    $('#mainimage').attr('src', values);
    });
    
    //Hide Navigation when scroll mouse
    $(function () {
        $(window).scroll(function () {
        // set distance user needs to scroll before we fadeIn navbar
        if ($(this).scrollTop() > 100) {
            $(".container-fluid.nav1").hide();
            $(".navbar-header.nav1").hide();
            $(".navbar-header.nav2").show();
        } 
        else{
            $(".container-fluid.nav1").show();
            $(".container-fluid.nav2").show();
            $(".navbar-header.nav2").hide();
            $(".navbar-header.nav1").show();
        }
        });
    });
});

//Click to slide images
$(function(){
    $('#slider2').Thumbelina({
        $bwdBut:$('#slider2 .left'),    // Selector to left button.
        $fwdBut:$('#slider2 .right')    // Selector to right button.
    });
})

//Setting Google Map to PS Store address AIT
function myMap() {
  var mapCanvas = document.getElementById("map");
  var AIT = {lat: -33.881798, lng: 151.195269};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: AIT
        });
        var marker = new google.maps.Marker({
          position: AIT,
          title: 'PS Store',
          map: map
        });
}


