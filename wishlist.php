<?php
include("includes/session.php");
include("includes/dbconnection.php");

$userid = $_SESSION["id"];
//----------display cart items
//create array to store cart contents
$wisharray = array();
//get cart contents from the database by joining products and cart tables
//so we can get images and description
$query = "SELECT 
          wishlist.id AS id,
          wishlist.productid AS productid,
          wishlist.time AS time,
          product.image AS image,
          product.name AS name,
          product.description AS description,
          product.price AS price
          FROM wishlist 
          INNER JOIN product 
          ON product.id = wishlist.productid
          WHERE wishlist.userid = '$userid'";
$result = $dbconnection->query($query);
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    array_push($wisharray,$row);
  }
}
?>
<!doctype html>
<html>
  <?php include("includes/head.php");?>
  <body>
    <?php include("includes/navigation.php");?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Your Favourite Items</h3>
        </div>
      </div>
      <div class="row">
        <?php
        foreach($wisharray as $wish){
        $id = $wish["id"];
        $name = $wish["name"];
        $price = $wish["price"];
        $time = $wish["time"];
        $productid = $wish["productid"];
        $image = $wish["image"];
        $arimage = ( explode( ',', $image ) );
        $description = $wish["description"];
        //work out how long ago the product was added
        $now = new DateTime("now");
        $storedtime = new DateTime($time);
        $ago = $now->diff($storedtime);
        $diff = $ago->format('%a days %h hours %i minutes');
        echo "<div class=\"col-md-12\">
        <div class=\"row\">
          <div class=\"col-md-2\">
            <img class=\"img-responsive\" src=\"images/$arimage[0]\">
          </div>
          <div class=\"col-md-4\">
            <h4>$name</h4>
            <p class=\"price\">$price</p>
            <p><small>Added $diff ago</small></p>
            <a class=\"btn btn-default\" href=\"detail.php?id=$productid\">detail</a>
          </div>
          <div class=\"col-md-4 text-right\">
            <form id=\"wishlist-form\">
              <input name=\"wishid\" type=\"hidden\" value=\"$id\">
              <input name=\"productid\" type=\"hidden\" value=\"$productid\">
              <button type=\"submit\" class=\"btn btn-default\" value=\"buy\">Buy this item</button>
              <button type=\"submit\" class=\"btn btn-default\" value=\"remove\">X</button>
            </form>
          </div>
          </div>
        </div>";
        }
        ?>
      </div>
    </div>
    <?php include("includes/scripts.php");?>
  </body>
</html>