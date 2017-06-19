<?php
include("includes/session.php");
include("includes/dbconnection.php");
//if there is data being submitted via POST
if(count($_POST)>0){
  
  $email=$_POST["email1"];
  if(count($email) > 0)
      {
      $password1=$_POST["password1"];
      $password2=$_POST["password2"];
      if($password1 === $password2)
      {
          //sanitise variables, password should not be sanitised
          $email = filter_var($email,FILTER_SANITIZE_EMAIL);
          //check if email exists in database
          $query = "SELECT * FROM user WHERE email='$email'";
          $result = $dbconnection->query($query);
          if($result->num_rows!=0){
            echo 
            " <div class='alert alert-danger'>
              Email Already Used
              </div>";
          }
          else{
            //hash password
            $password = password_hash($password1,PASSWORD_DEFAULT);
            $query = "INSERT INTO user (email,password) VALUES ('$email','$password')";
            if($dbconnection->query($query)){
              //echo "success";
              $success=true;
            }
            else{
              echo " <div class='alert alert-danger'>
              Create Account Failure
              </div>";
            }
          }
      }
      else {
                echo "
                <div class='alert alert-danger'>
                  Password does not match!
                </div>";
              };
      
      }
      
  $email=$_POST["email"];
  if(count($email) > 0)
  {
      $password=$_POST["password"];
      //sanitise variables, password should not be sanitised
      $query = "SELECT * FROM user WHERE email='$email'"; // AND active='1'";
      $result = $dbconnection->query($query);
      $userdata = $result->fetch_assoc();
      if(password_verify($password,$userdata["password"])){
        //login successful
        $stored_email = $userdata["email"];
        $loggedinuserid = $userdata["id"];
        echo $loggedinuserid;
        //set success to true
        $success1=true;
        //set last login time for user
        //generateDateTime() function is in session.php file
        $lastlogin = generateDateTime();
        $logintimequery = "UPDATE users SET lastlogin='$lastlogin' WHERE id='$loggedinuserid'";
        $dbconnection->query($logintimequery);
        
        //----------assign cart items and wishlist to the logged in user
        //the id that the user has before logging in--from session id
        $currentuserid = $_SESSION["id"];
        //find cart items in the database
        $cartquery = "SELECT productid FROM cart WHERE userid='$currentuserid'";
        $cartresult = $dbconnection->query($cartquery);
        //if there are items in the cart from before login
        if($cartresult->num_rows > 0){
          //update all cart items that the user added before logging in to the current user
          $query="UPDATE cart SET userid='$loggedinuserid' WHERE userid='$currentuserid'";
          $dbconnection->query($query);
          //assign quantities from items before login to items in the cart belonging to user
          $addquery="UPDATE cart AS r JOIN
                    ( SELECT   id, productid,
                      SUM(quantity) AS totalquantity
                      FROM cart 
                      WHERE userid='$loggedinuserid'
                      GROUP BY productid
                    ) AS grp
                    ON  
                    grp.productid = r.productid
                    SET 
                    r.quantity = grp.totalquantity
                    WHERE 
                    r.userid = '$loggedinuserid'";
          $dbconnection->query($addquery);
        }
        
        $wishquery = "SELECT productid FROM wishlist WHERE userid='$currentuserid'";
        $wishresult = $dbconnection->query($wishquery);
        if($wishresult->num_rows > 0){
          //update all wish list items that the user has added and assign to current user id
          $query="UPDATE wishlist SET userid='$loggedinuserid' WHERE userid='$currentuserid'";
          $dbconnection->query($query);
          //merge duplicate products, if found
          $dedupquery="DELETE e1 FROM wishlist e1, wishlist e2 WHERE e1.productid = e2.productid AND e1.id > e2.id
          AND e1.userid='$loggedinuserid' AND e2.userid='$loggedinuserid'";
          $dbconnection->query($dedupquery);
        }
        
        //regenerate user id after logging in to prevent session fixation attack
        //see https://goo.gl/a6q56W
        session_regenerate_id();
        //create session variables using user data from database
        $_SESSION["email"]=$stored_email;
        $_SESSION["id"]=$userdata["id"];
        
        //if user is an admin
        if($userdata["admin"]==='1'){
          $_SESSION["admin"]=1;
          //redirect to admin dashboard
          header("location: dashboard.php");
        }
        //if user is not an admin
        else{
          //redirect to user dashboard
          header("location: user-dashboard.php");
        }
      }
      else{
        $success1=false;
      }
  }
}
?>
<?doctype html>
<html>
<?php include("includes/head.php");?>
<body>
  <!--navigation section-->
    <?php include("includes/navigation.php");?>
   <div class="container">
     <div class = "row sepalogobx" >
       <div class="col-md-3"></div>
    <div class="col-md-4">
    <div id="logbox">
      <form id="register" method="post" action="login.php">
        <h1>Create an Account</h1>
        <!--<input name="user[name]" type="text" placeholder="What's your username?" pattern="^[\w]{3,16}$" autofocus="autofocus" required="required" class="input pass"/>-->
        <input name="email1" id="email1" type="email" placeholder="Email address" class="input pass"/>
        <input name="password1" id="password1" type="password" placeholder="Choose a password" required="required" class="input pass"/>
        <input name="password2" id="password2" type="password" placeholder="Confirm password" required="required" class="input pass"/>
        
        <input type="submit" value="CREATE ACCOUNT" class="inputButton"/>
        <!--<div class="text-center">-->
        <!--    already have an account? <a href="#" id="login_id">login</a>-->
        <!--</div>-->
        
        <?php
          if($success==true){
           echo "
            <div class='alert alert-success'>
              Your account has been created
            </div>";
          }
          ?>
      </form>
    </div>
   </div>
    <!--col-md-6-->
    
   <div class="col-md-4">
    <div id="logbox">
      <form id="register" method="post" action="login.php">
        <h1>Account Login</h1>
        <input name="email" id="email" type="email" placeholder="Enter your email" class="input pass"/>
        <input name="password" id="password" type="password" placeholder="Enter your password" required="required" class="input pass"/>
        
        <!--<input type="submit" value="LOG IN" class="inputButton"/>-->
         <?php
            if($success1===true){
              echo "<div class=\"alert alert-success\">Welcome</div>";
            }
            elseif($success1===false){
              echo "<div class=\"alert alert-danger\">Authentication Error</div>";
            }
        ?>
        <div class="text-center">
        <a href="#" id="">Forgot Password?</a>
     
        </div>
         <hr>
         <input type="submit" value="LOG IN" class="inputButton"/>
                
                
      </form>
    </div>
    </div>
  </div>
  </div>
    <?php include("includes/scripts.php");?>
</body>
</html>