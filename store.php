<?php
include("includes/session.php");
include("includes/dbconnection.php");

//get user id from session
$userid = $_SESSION["id"];

//get categories
$catquery = "SELECT * FROM category";
$catresult = $dbconnection->query($catquery);
$categories = array();
if($catresult->num_rows>0){
    while($row = $catresult->fetch_assoc()){
        array_push($categories,$row);
    }
}

//get categories Type
$cattypequery = "SELECT * FROM categorytype";
$catresult = $dbconnection->query($cattypequery);
$categorytype = array();
if($catresult->num_rows>0){
    while($row = $catresult->fetch_assoc()){
        array_push($categorytype,$row);
    }
}


//---------get shopping cart products
$cartarray = array();
$cartquery = "SELECT productid FROM cart WHERE userid='$userid'";
$cartresult = $dbconnection->query($cartquery);
if($cartresult->num_rows>0){
  while($row=$cartresult->fetch_assoc()){
    array_push($cartarray,$row);
  }
}

$cartlength = count($cartarray);
//---------get wishlist products
$wisharray = array();
$wishquery = "SELECT productid FROM cart WHERE userid='$userid'";
$wishresult = $dbconnection->query($wishquery);
if($wishresult->num_rows>0){
  while($row=$wishresult->fetch_assoc()){
    array_push($wisharray,$row);
  }
}

$wishlength = count($wisharray);
//---------get products
//product query
$query = "SELECT * FROM products";
//if there is filter, append filter to query
if(count($_GET)>0){
    $selectedcategory = $_GET["category"];
    if($selectedcategory){
        $query=$query." "."WHERE categoryid='$selectedcategory'";
    }
}


$feature = array();
$query = "SELECT * FROM product INNER JOIN featureproduct WHERE product.code = featureproduct.code";
$featureresult = $dbconnection->query($query);
if($featureresult->num_rows>0){
    while($row = $featureresult->fetch_assoc()){
        array_push($feature,$row);       
    }
}

//get products
//product query
$query = "SELECT * FROM product";
//if there is filter, append filter to query
if(count($_GET)>0){
    
    $getCategories = $_GET['categories'];
    if(count($getCategories) > 0)
    {
        $query = $query." WHERE (";
        foreach ($getCategories as $getCategoriesid)
        {
            $count++;
            if($getCategoriesid == 1)
            {
                $query = $query." categoryid=$getCategoriesid";
            }
            else if($getCategoriesid == 2)
            {
                $query = $query." categoryid=$getCategoriesid";
            }
            else if($getCategoriesid == 3)
            {
                $query = $query." categoryid=$getCategoriesid";
            }
            if(count($getCategories) > 1 && count($getCategories) != $count)
            {
                $query = $query." OR";
            }
        }
        $query = $query.")";
    }
    
    $count =0;
    $getCategoriestype = $_GET['categoriestype'];
    if(count($getCategoriestype) > 0)
    {
        if(count($getCategories) > 0)
            $query = $query." AND (";
        else
            $query = $query." WHERE (";
        foreach ($getCategoriestype as $getCategoriestypeid)
        {
            $count++;
            if($getCategoriestypeid == 1)
            {
                $query = $query." categorytypeid=$getCategoriestypeid";
            }
            else if($getCategoriestypeid == 2)
            {
                $query = $query." categorytypeid=$getCategoriestypeid";
            }
            else if($getCategoriestypeid == 3)
            {
                $query = $query." categorytypeid=$getCategoriestypeid";
            }
            if(count($getCategoriestype) > 1 && count($getCategoriestype) != $count)
            {
                $query = $query." OR";
            }
        }
        $query = $query.")";
    }
}
$products = array();
$result = $dbconnection->query($query);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        //check if item is in cart
        foreach($cartarray as $cartitem){
          if($row["id"]==$cartitem["productid"]){
            //if product exists in cart
            $row["cart"] = true;
          }
        }
        //check if item is in wishlist
        foreach($wisharray as $wishitem){
          if($row["id"]==$wishitem["productid"]){
            $row["wish"] = true;
          }
        }
        array_push($products,$row);
    }
}


?>

<!doctype html>
<html>
    <?php include("includes/head.php");?>
    <body style ="padding-top: 100px; color:white;" >
        <?php include("includes/navigation.php");?>
        
             <div class="row">
              <div class="col-md-2">
                  
                  
              <h4>Filter by Categories</h4>
                  <form method="GET" action="store.php">
                        <!--<input type='checkbox' name='categories[]' value='0' checked>All<br>-->
                        <?php
                            foreach($categories as $cat){
                                $catid = $cat["categoryid"];
                                $catname = $cat["name"];
                                echo "<input type='checkbox' name='categories[]' id='categories' value='$catid'>$catname<br>";
                            }
                        ?>

              <h4>Filter by Categories Type</h4>
                    <form method="GET" action="store.php">
                        <?php
                            foreach($categorytype as $cattype){
                                $cattypeid = $cattype["categorytypeid"];
                                $catname = $cattype["name"];
                                echo "<input type='checkbox' name='categoriestype[]' id='categoriestype' value='$cattypeid' style = 'color:white;'>$catname<br>";
                            }
                        ?>
                        
                        <button type="submit" role="submit" class="btn btn-default">Filter Type</button>
              </form>  
              </form>
              </div>
              <div class="col-md-10">
              <!--Next row-->
              <div class="container">
                <div class="row">
                  
                  <h1 style="text-align: center;">Feature Products</h1>
                     
                     
                        <?php
                        $i=1;
                        foreach($products as $product){
                            $name = $product["shortname"];
                            $price = $product["price"];
                            $id = $product["id"];
                            $description = $product["description"];
                            $description = substr_replace($description, '...', 35);
                            $image = $product["image"];
                            $arimage = ( explode( ',', $image ) );
                            $imagename = $arimage[0];
                            
                            if($i%4==0){
                                echo "<div class=\"row\">";
                            }
                            echo"
                                
                             <div class = \"col-sm-3\">
                                <div class = \"thumbnail\">
                                   <a href = 'detail.php?id=$id'><img src = \"images/$imagename\" alt = \"$name\"></a>
                                </div>
                                <div class = \"caption\">
                                   <h4>$name</h4>
                                   <p>$description </p>
                                   <h4><b>\$$price</b></h4>
                                   <p>
                                      <a href = \"detail.php?id=$id\" class = \"btn btn-default\" role = \"button\">Detail</a>";
                                      if($product["cart"]==true){
                                        echo "<span class=\"badge\"><i class=\"glyphicon glyphicon-shopping-cart\"></i>
                                            in cart
                                            </span>";
                                                    }
                                      if($product["wish"]==true){
                                        echo "<span class=\"badge\"><i class=\"glyphicon glyphicon-star\"></i>
                                        in wishlist
                                            </span>";
                                                    } 
                                   echo "</p>
                                </div>
                             </div>";
                            if($i%4==0){
                                echo "</div>";
                            }
                             $i = $i +1;}?>
              
                  </div>
              </div>
           </div>   
           <hr>
              <!-- Items you may like -->
              <div class ="container">
            		<div class="col-md-12">
            		  <br><h1 style = "text-align:center;">Item you may like !!</h1>
            
                    <div class="well">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                    <?php 
                                        $i=0;
                                        foreach($feature as $product){
                                            if($i == 6)
                                            {
                                              break;
                                            }
                                            $name = $product["shortname"];
                                            $price = $product["price"];
                                            $id = $product["id"];
                                            $description = $product["description"];
                                            $description = substr_replace($description, '...', 35);
                                            $image = $product["image"];
                                            $arimage = ( explode( ',', $image ) );
                                            $imagename = $arimage[0];
                                            $i= $i+1;
                                        echo "
                                        <div class='col-sm-2'>   
                                          <div class = 'thumbnail'>
                                             <a href='detail.php?id=$id'><img src = 'images/$imagename' alt = '$name'></a>
                                          </div>
                                          <div class = 'caption'>
                                             <h4>$name</h4>
                                          
                                             <h4><b>\$$price</b></h4>
                                             <p>

                                                <a href = 'detail.php?id=$id' class = 'btn btn-default' role = 'button'>Detail</a>
   
                                             </p>
                                          </div>
                                        </div>";
                                          }?>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                    <?php 
                                        $i=0;
                                        foreach($feature as $product){
                                            if($i <6)
                                            {
                                              $i= $i+1;
                                              continue;
                                            }else if($i == 12)
                                            {
                                              break;
                                            }
                                            $name = $product["shortname"];
                                            $price = $product["price"];
                                            $id = $product["id"];
                                            $description = $product["description"];
                                            $description = substr_replace($description, '...', 25);
                                            $image = $product["image"];
                                            $arimage = ( explode( ',', $image ) );
                                            $imagename = $arimage[0];
                                            $i= $i+1;
                                        echo "
                                        <div class='col-sm-2'>   
                                          <div class = 'thumbnail'>
                                             <a href='detail.php?id=$id'><img src = 'images/$imagename' alt = '$name'></a>
                                          </div>
                                          <div class = 'caption'>
                                             <h4>$name</h4>
                                             
                                             <h4><b>\$$price</b></h4>
                                             <p>
                                                <a href = 'detail.php?id=$id' class = 'btn btn-default' role = 'button'>Detail</a>
                                             </p>
                                          </div>
                                        </div>";
                                          }?>
                                    </div>
                                    <!--/row-->
                                </div>
                            </div>
                            <!--/carousel-inner--> 
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button"><</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button">></a>
                        </div>
                        <!--/myCarousel-->
                    </div>
                    <!--/well-->
                    </div>
                    </div>
                    </div>
                		
           <?php include("includes/scripts.php");?>
    </body>
</html>