<?php
include("includes/session.php");
include ("includes/dbconnection.php");
?>

<!doctype html>
<html>
    <?php include("includes/head.php");?>
    <body>
        <?php include("includes/navigation.php");?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src='images/slide1.jpg' alt='...' style ="width:100%;">
                </div>
                <div class="item">
                    <img src='images/slide2.jpg' alt='...' style ="width:100%;">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src='images/slide3.jpg' alt='...' style ="width:100%;">
                    <div class="carousel-caption"></div>
                </div>
                <div class="item">
                    <img src='images/slide4.jpg' alt='...' style ="width:100%;">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-caption square"> 
                    <p style="font-size:48px;">THEY CAN'T STOP YOU<br>IF THEY CAN'T CATCH YOU</p>
                    <a href="store.php"><button type="button" class = "button">Store</button></a>
                    <a href="login.php"><button type="button" class = "button">Login</button></a>
                </div>
            </div> <!--Carousel-Inner-->
                
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> <!--Carousel-example-generic-->
        
        <!--Present Women, Men, Kid-->
        <div class="PWMK">
            <div class="container">
                <div class="row"><br>
                    <div class="col-sm-4">
                        <a href='store.php?categorytypeid=2'><img src="logoimage/woman.jpg" alt="..." class="img-rounded" style="width:100%;"></a>
                        <br><h3 style="text-align:center;"><b>Women</b></h3>
                        <p>Make this season your most stylish yet with new arrivals from Piper, Asilio, Alex Perry and more. Whether you are looking for evening dresses or the latest designer pieces, discover our range of women's clothing and accessories.</p>
                    </div>
                    <div class="col-sm-4">
                        <a href='store.php?categorytypeid=1'><img src="logoimage/man.jpg" alt="..." class="img-rounded" style="width:100%;"></a>
                        <br><h3 style="text-align:center;"><b>Men</b></h3>
                        <p>Upgrade your style with fresh arrivals from Barney Cools, I Love Ugly, Superdry and more. Whether you are looking for basic tees or sharp suits, discover our range of men's clothing and accessories.</p>
                    </div>                
                    <div class="col-sm-4">
                        <a href='store.php?categorytypeid=3'><img src="logoimage/kid.jpg" alt="..." class="img-rounded" style="width:100%;"></a>
                        <br><h3 style="text-align:center;"><b>Kid</b></h3>
                        <p>It is happy faces all round with our range of casual threads, special occasion outfits and comfy sleepwear for boys, girls and baby. Kit them out with stylish designs from Sprout, Bauhaus, Milkshake and more.</p>
                    </div>
                    <br>
                </div> <!--row-->
            </div><!--container-->
        </div><!--PWMK-->
                     
        <!--Footer Find Store and Email Signup-->
        <div class = "row" style = "background-color:#303030;  font-family: 'Raleway', sans-serif;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <button type="button" class = "button" id ="findstore" style ="background-color:#303030;">
                        <div class="col-md-1">
                            <span class="glyphicon glyphicon-map-marker" aria-hidden="true" style = "color:red; font-size:30px;"> </span>
                        </div>
                        <div class="col-md-1" style = "font-size:25px;">
                            Find&nbsp;Store
                        </div>
                    </button>
                </div> <!--col-md-6-->
                <a href ="login.php">
                    <button type="button" class = "button" style ="background-color:#303030;">
                        <div class="col-md-1">
                            <span class="glyphicon glyphicon-log-in" aria-hidden="true" style = "color:red; font-size:30px;"></span>
                        </div>
                        <div class="col-md-1" style = "font-size:25px;">
                            Email&nbsp;Signup
                        </div>
                    </button>
                </a>
            </div><!--col-md-6-->
        </div><!--Footer Find Store and Email Signup-->
        
        <!--Google Map-->
        <div class= "row" id="map" style="width:auto;height:400px;background:#131313;"></div>
        
        <!--Footer NEED Help?, Order, Stay Conneted-->
        <div class = "row" style = "background-color:#303030; border: 0.5px solid;border-color:#707070; color: white; font-family: 'Raleway', sans-serif;">
            <div class="col-md-3"></div>
            <div class="col-md-6" style = "padding-top:5px;">
                <div class="col-md-4 footer">
                    NEED HELP ?<br><br>
                    <a href="#">Help Center</a><br>
                    <a href="#">Email Us</a><br>
                    <a href="#">FAQs"</a>
                </div> 
                <div class="col-md-4 footer">
                    ORDER<br><br>
                    <a href="#">Track My Order</a><br>
                    <a href="#">Shipping Information</a><br>
                    <a href="#">Free Returns</a><br>
                    <a href="#">Wish List</a>
                      
                </div> 
                <div class="col-md-4 footer">
                    STAY CONNECTED<br><br>
                    <ul style="text-align:left;">
                        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-lg fa-facebook-square fa-1.5x"></i></a>
                        <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-lg fa-twitter fa-1.5x"></i></a>
                        <a href="#"><i class="fa fa-lg fa-pinterest fa-1.5x"></i></a>
                        <a href="#"><i class="fa fa-lg fa-instagram fa-1.5x"></i></a>
                    </ul>
                </div> 
            </div>
            <div class="col-md-3"></div>
        </div> <!--row NEED Help?-->
          
        <!--Footer Copy Right-->          
        <div class= "row" style = "text-align:center; background-color:#303030; color:white;">
                <br>Copy right 2016 PS Store<br>
        </div>
        
        <?php include("includes/scripts.php");?>
        <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
    </body>
</html>