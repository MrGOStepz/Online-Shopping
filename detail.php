<?php
include("includes/session.php");
include("includes/dbconnection.php");
if(count($_GET)>0){
    $id=$_GET["id"];
    if(is_numeric($id)){
        //sanitise id
        $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        //find the product with the id requested
        $query = "SELECT * FROM product WHERE id='$id'";
        $product = array();
        $result = $dbconnection->query($query);
        //if product exists
        if($result->num_rows>0){
            $product = $result->fetch_assoc();
        }
    }
}
else{
    exit();
}
?>

<!doctype html>
<html>
    <?php include("includes/head.php");?>
    <body>
        <?php include("includes/navigation.php");?>
        
        <div class="container">
            <?php
            $shortname = $product["shortname"];
            $name = $product["name"];
            $price = $product["price"];
            $id = $product["id"];
            $description = $product["description"];
            $image = $product["image"];
            $stockqty = $product["stockqty"];
            $image = $product["image"];
            $arimage = ( explode( ',', $image ) );
            ?>
            
            <!--Picture and Description-->
            <div class='row'>
                <!--Images-->
                <div class='col-sm-6'>
                    <img class='product-image' id = 'mainimage' src='images/<?php echo $arimage[0];?>'>
                    <div class = "row">
                        <!--Clicke Slide image-->
                        <div id="slider2">
                            <div class="thumbelina-but horiz left">&#706;</div>
                            <ul>
                                <?php
                                for ($i = 0; $i < count($arimage); $i++) {
                                     echo "<li id='slaveimage$i' value = 'images/$arimage[$i]'><img src='images/$arimage[$i]' style = 'height: auto; width:120px;'></li>";
                                }
                                ?>
                            </ul>
                            <div class="thumbelina-but horiz right">&#707;</div>
                        </div> <!--slider2-->
                    </div><!--row slider2-->             
                </div><!--col-sm-6 Images-->
                
                <!--Desciption-->
                <div class='col-sm-6'>
                    <?php echo"
                    <h3 style=\"text-align: center;\">$name</h3>
                    <p>$description</p>
                    <p class='price'>$price</p>";
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" class="form-inline detail-form" action="additem.php">
                                <input type="number" class="form-control quantity" name="quantity" value="1">
                                <input type="hidden" name="productid" value="<?php echo $id;?>">
                                <button type="submit" name="submit" value="cart" data-id="<?php echo $id;?>" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    Add to cart
                                </button>
                                <button type="submit" name="submit" value="wish" data-id="<?php echo $id;?>" class="btn btn-default">
                                    <span class="glyphicon glyphicon-star"></span>
                                    Add to wishlist
                                </button>
                            </form>
                            
                            <!--CLick Add Cart and Wishlist show notification-->
                            <?php
                            $showalert = false;
                            if($_GET["success"]==true){
                                $class="alert-success";
                                $message="Item added";
                                $showalert=true;
                            }
                            elseif($_GET["success"]===false){
                                $class="alert-warning";
                                $message="Item cannot be added, due to an error";
                                $showalert=true;
                            }
                            if($showalert==true){
                            echo"
                            <div class=\"site-alert alert $class alert-dismissible text-center\" role=\"alert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                $message
                            </div>";
                            }
                            ?>
                        </div><!--col-md-12-->
                    </div><!--row col-md-12-->
                </div> <!--col-md-6-->
            </div> <!--row-->
        </div>  <!--container-->
        
        <?php include("includes/scripts.php");?>
    </body>
</html>