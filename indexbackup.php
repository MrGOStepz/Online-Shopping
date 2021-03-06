<?php
include("includes/session.php");
include ("includes/dbconnection.php");

//Image for slide
$slide1 = "slide1";
$slide2 = "slide2";
$slide3 = "slide3";

//get products
//product query
$query = "SELECT * FROM product";
//if there is filter, append filter to query
if(count($_GET)>0){
    $selectedcategory = $_GET["category"];
    if($selectedcategory){
        $query=$query." WHERE categoryid='$selectedcategory'";
    }
}
$products = array();
$result = $dbconnection->query($query);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        array_push($products,$row);
    }
}
//get categories
$catquery = "SELECT * FROM category";
$catresult = $dbconnection->query($catquery);
$categories = array();
if($catresult->num_rows>0){
    while($row = $catresult->fetch_assoc()){
        array_push($categories,$row);
    }
}
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
                </ol>
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                    <?php echo "<img src='images/$slide1.jpg' alt='...'>";?>
                      <div class="carousel-caption">
                      </div>
                    </div>
                  <div class="item">
                    <?php echo "<img src='images/$slide2.jpg' alt='...'>";?>
                    <div class="carousel-caption">
                    </div>
                  </div>
                  <div class="item">
                    <?php echo "<img src='images/$slide3.jpg' alt='...'>";?>
                    <div class="carousel-caption">
                    </div>
                  </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
              <!--Next row-->
              <div class="container">
                <div class="row">
                  
                  <h1 style="text-align: center;">Feature Products</h1>
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images/S79914_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role = "button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\M19840_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role = "button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\AY9329_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role =" button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                      <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\AY7864_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role =" button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     
                  </div>
                  
                  <div class="row">
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images/BB3898_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role = "button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\AY5135_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role = "button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\AY5130_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role =" button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                      <div class = "col-sm-3">
                        <div class = "thumbnail">
                           <img src = "images\AQ2184_01_standard.jpg" alt = "Generic placeholder thumbnail">
                        </div>
                        
                        <div class = "caption">
                           <h3>Thumbnail label</h3>
                           <p>Some sample text. Some sample text.</p>
                           
                           <p>
                              <a href = "#" class = "btn btn-primary" role = "button">
                                 Button
                              </a> 
                              
                              <a href = "#" class = "btn btn-default" role =" button">
                                 Button
                              </a>
                           </p>
                           
                        </div>
                     </div>
                     
                     
                  </div>
              </div>
              
              <!-- Container (Contact Section) -->
                <div id="contact" style="background-color: black;">
                  <h3 class="text-center">Contact</h3>
                  <p class="text-center"><em>We love our fans!</em></p>
                
                  <div class="row">
                    <div class="col-md-4" class="text-center">
                      <p>Fan? Drop a note.</p>
                      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
                      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
                      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
                    </div>
                    <div class="col-md-4" class="text-center">
                      <div class="row">
                        <div class="col-sm-6 form-group">
                          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                      </div>
                      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                      <br>
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <button class="btn pull-right" type="submit">Send</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <h3 class="text-center">From The Blog</h3>
       <?php include("includes/scripts.php");?>
    </body>
</html>