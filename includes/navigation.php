<nav class="navbar nav1 navbar-default navbar-fixed-top">
    <div class="container-fluid nav1">
        <div class="navbar-header nav1">
            <a class="navbar-brand" href="#"><img alt="Brand" src="logoimage/logo1.ico"></a>
        </div> <!--navbar-header-->  
        <div class="navbar-text pull-right" style = "font color:black;">
            <ul class="nav navbar-nav navbar-right">
                <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-lg fa-facebook-square fa-1.5x"></i></a>
                <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa fa-lg fa-twitter fa-1.5x"></i></a>
                <a href="#"><i class="fa fa-lg fa-pinterest fa-1.5x"></i></a>
                <a href="#"><i class="fa fa-lg fa-instagram fa-1.5x"></i></a>
            </ul> <!-- refering from this website https://bootstrapbay.com/blog/font-awesome/  and this http://www.kodingmadesimple.com/2014/11/create-stylish-bootstrap-3-social-media-icons.html -->
        </div><!--navbar-text pull-right-->
    </div><!--Container-flued nav1-->
    <div class="container-fluid nav2 " style="background-color:black;">
        <div class="navbar-header nav2" style="display:none;">
            <!--<a class="navbar-brand" href="#" style="padding-top: 5px;"><img alt="Brand" class = "sizeLogo" src="logoimage/logo1.ico"></a>-->
        </div><!--navbar-header-->
        
        <!--Navbar Home, Store, Login, Search-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--List of Navbar Left-->
            <ul class="nav  navbar-nav navbar-left " >
                <li><a href="index.php"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Home</a></li>
                <li><a href="store.php"><span class='glyphicon glyphicon-inbox' aria-hidden='true'></span> Store</a></li>
                <?php
                //if user is not logged in
                if(!$_SESSION["email"]){
                    echo "<li><a href=\"login.php\"><span class='glyphicon glyphicon-log-in' aria-hidden='true'></span></span> Login</a></li>";
                }
                //get user id
                $userid = $_SESSION["id"];
                //count cart items in database
                $cartquery = "SELECT productid,quantity FROM cart WHERE userid='$userid'";
                $result = $dbconnection->query($cartquery);
                //count items in shopping cart
                $carttotal = 0;
                //if there are items in the cart
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $carttotal+=$row["quantity"];
                    }
                }
                //count items in the wishlist
                $wishtotal = 0;
                $wishquery = "SELECT productid FROM wishlist WHERE userid='$userid'";
                $result = $dbconnection->query($wishquery);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $wishtotal++;
                    }
                }
                ?>
            </ul><!--List of Navbar Left-->
            <!--List of Navbar Right-->
            <ul class="nav  navbar-nav navbar-right">
                <li><div class="input-group"> 
                        <form class="navbar-form navbar-left" action="search.php" method="get">
                            <div class="form-group">
                                <input id="search" type="text" name="search" class="form-control" placeholder="Search">
                                <span class="input-group-btn"><button type="submit" role="search" class="btn btn-default">Search</button></span>
                            </div>
                        </form>
                    </div>
                </li>
                <li>
                <?php
                //if the user is logged in
                if($_SESSION["email"]){
                    //if the user is an admin, show the dashboard
                    if($_SESSION["admin"]){
                        echo "<li><a href=\"dashboard.php\">Dashboard</a></li>";
                    }
                    echo "
                    <li class='dropdown' style = 'background-color:#808080; color:#000000'><a href='#' class='btn btn-default dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span></a>
                        <ul class='dropdown-menu'>
                            <li><a href='#'>".$_SESSION["email"]."</a></li>
                            <li><a href='user-dashboard.php'>My Account</a></li>
                            <li role='separator' class='divider'></li>
                            <li><a href='logout.php'>Logout</a></li>
                        </ul>
                    </li>";
                }
                ?>
                </li>
                <li>
                    <a href="shopping-cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>
                    <!--keep the line below as a single line to allow empty badge when there is no-->
                    <!--item in the cart-->
                    <span class="badge cart-total"><?php if($carttotal>0){echo $carttotal;}?></span></a>
                </li>
                <li>
                    <a href="wishlist.php"><span class="glyphicon glyphicon-star"></span>
                    <!--keep the line below as a single line to allow empty badge when there is no-->
                    <!--item in the cart-->
                    <span class="badge wish-total"><?php if($wishtotal>0){echo $wishtotal;}?></span></a>
                </li>
            </ul><!--List of Navbar Right-->
        </div><!--<!--Navbar Home, Store, Login, Search-->
    </div><!--container-fluid nav2-->
</nav>
