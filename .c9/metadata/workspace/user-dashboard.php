{"filter":false,"title":"user-dashboard.php","tooltip":"/user-dashboard.php","undoManager":{"mark":88,"position":88,"stack":[[{"start":{"row":114,"column":12},"end":{"row":115,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":115,"column":0},"end":{"row":115,"column":6},"action":"insert","lines":["      "]}],[{"start":{"row":115,"column":6},"end":{"row":116,"column":0},"action":"insert","lines":["",""],"id":3},{"start":{"row":116,"column":0},"end":{"row":116,"column":6},"action":"insert","lines":["      "]}],[{"start":{"row":115,"column":6},"end":{"row":116,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":116,"column":0},"end":{"row":116,"column":6},"action":"insert","lines":["      "]}],[{"start":{"row":116,"column":6},"end":{"row":150,"column":12},"action":"insert","lines":["      <div class=\"col-md-8\">","        <h4>Your Favourite Items</h4>","        <div class=\"btn-group\">","          <a href=\"wishlist.php\" class=\"btn btn-default\">Manage your favourites</a>","          <a href=\"shopping-cart.php\" class=\"btn btn-default\">Manage your cart</a>","        </div>","        ","        <!--list users wishlist here-->","        <?php","        $count=0;","        foreach($wisharray as $wish){","          $count++;","          $name = $wish[\"name\"];","          $productid = $wish[\"productid\"];","          $wishid = $wish[\"wishid\"];","          $price = $wish[\"price\"];","          $image = $wish[\"image\"]; ","          if($count==1){","            echo \"<div class=\\\"row\\\">\";","          }","          echo \"<div class=\\\"col-md-3\\\">","                  <h3>$name</h3>","                  <a href='detail.php?id=$productid'>","                    <img class='img-responsive product-image' src='images/$image'>","                  </a>","                  <p class='price product-price'>$price</p>","                  <a class='btn btn-default' href='detail.php?id=$productid'>detail</a>","                </div>\";","          if($count>=4){","            echo \"</div>\";","            $count = 0;","          }","        }","        ?>","      </div>"],"id":5}],[{"start":{"row":132,"column":35},"end":{"row":133,"column":0},"action":"insert","lines":["",""],"id":6},{"start":{"row":133,"column":0},"end":{"row":133,"column":10},"action":"insert","lines":["          "]}],[{"start":{"row":133,"column":10},"end":{"row":133,"column":48},"action":"insert","lines":["$arimage = ( explode( ',', $image ) );"],"id":7}],[{"start":{"row":140,"column":74},"end":{"row":140,"column":80},"action":"remove","lines":["$image"],"id":8},{"start":{"row":140,"column":74},"end":{"row":140,"column":82},"action":"insert","lines":["$arimage"]}],[{"start":{"row":140,"column":82},"end":{"row":140,"column":83},"action":"insert","lines":["["],"id":9}],[{"start":{"row":140,"column":83},"end":{"row":140,"column":84},"action":"insert","lines":["]"],"id":10}],[{"start":{"row":140,"column":83},"end":{"row":140,"column":84},"action":"insert","lines":["0"],"id":11}],[{"start":{"row":6,"column":9},"end":{"row":7,"column":0},"action":"insert","lines":["",""],"id":12},{"start":{"row":7,"column":0},"end":{"row":7,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":7,"column":2},"end":{"row":8,"column":0},"action":"insert","lines":["",""],"id":13},{"start":{"row":8,"column":0},"end":{"row":8,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":8,"column":2},"end":{"row":9,"column":0},"action":"insert","lines":["",""],"id":14},{"start":{"row":9,"column":0},"end":{"row":9,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":8,"column":0},"end":{"row":27,"column":1},"action":"insert","lines":["//get users wishlist","$query = \"SELECT ","wishlist.id as wishid,","products.id as productid,","products.name as name,","products.price as price,","products.image as image ","FROM wishlist ","INNER JOIN products ","ON wishlist.productid=products.id","WHERE wishlist.userid='$id'\";","","$wisharray = array();","","$wishresult = $dbconnection->query($query);","if($wishresult->num_rows > 0){","  while($row = $wishresult->fetch_assoc()){","    array_push($wisharray,$row);","  }","}"],"id":15}],[{"start":{"row":16,"column":18},"end":{"row":16,"column":19},"action":"remove","lines":["s"],"id":16}],[{"start":{"row":11,"column":7},"end":{"row":11,"column":8},"action":"remove","lines":["s"],"id":17}],[{"start":{"row":12,"column":7},"end":{"row":12,"column":8},"action":"remove","lines":["s"],"id":18}],[{"start":{"row":13,"column":7},"end":{"row":13,"column":8},"action":"remove","lines":["s"],"id":19}],[{"start":{"row":14,"column":7},"end":{"row":14,"column":8},"action":"remove","lines":["s"],"id":20}],[{"start":{"row":17,"column":29},"end":{"row":17,"column":30},"action":"remove","lines":["s"],"id":21}],[{"start":{"row":8,"column":0},"end":{"row":27,"column":3},"action":"remove","lines":["//get users wishlist","$query = \"SELECT ","wishlist.id as wishid,","product.id as productid,","product.name as name,","product.price as price,","product.image as image ","FROM wishlist ","INNER JOIN product ","ON wishlist.productid=product.id","WHERE wishlist.userid='$id'\";","","$wisharray = array();","","$wishresult = $dbconnection->query($query);","if($wishresult->num_rows > 0){","  while($row = $wishresult->fetch_assoc()){","    array_push($wisharray,$row);","  }","}  "],"id":22}],[{"start":{"row":7,"column":2},"end":{"row":8,"column":0},"action":"remove","lines":["",""],"id":23}],[{"start":{"row":9,"column":1},"end":{"row":10,"column":0},"action":"insert","lines":["",""],"id":24}],[{"start":{"row":56,"column":3},"end":{"row":57,"column":0},"action":"insert","lines":["",""],"id":25},{"start":{"row":57,"column":0},"end":{"row":57,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":57,"column":2},"end":{"row":58,"column":0},"action":"insert","lines":["",""],"id":26},{"start":{"row":58,"column":0},"end":{"row":58,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":27}],[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":28}],[{"start":{"row":11,"column":0},"end":{"row":30,"column":3},"action":"insert","lines":["//get users wishlist","$query = \"SELECT ","wishlist.id as wishid,","product.id as productid,","product.name as name,","product.price as price,","product.image as image ","FROM wishlist ","INNER JOIN product ","ON wishlist.productid=product.id","WHERE wishlist.userid='$id'\";","","$wisharray = array();","","$wishresult = $dbconnection->query($query);","if($wishresult->num_rows > 0){","  while($row = $wishresult->fetch_assoc()){","    array_push($wisharray,$row);","  }","}  "],"id":29}],[{"start":{"row":10,"column":0},"end":{"row":11,"column":0},"action":"insert","lines":["",""],"id":30}],[{"start":{"row":11,"column":0},"end":{"row":12,"column":0},"action":"insert","lines":["",""],"id":31}],[{"start":{"row":13,"column":0},"end":{"row":32,"column":3},"action":"remove","lines":["//get users wishlist","$query = \"SELECT ","wishlist.id as wishid,","product.id as productid,","product.name as name,","product.price as price,","product.image as image ","FROM wishlist ","INNER JOIN product ","ON wishlist.productid=product.id","WHERE wishlist.userid='$id'\";","","$wisharray = array();","","$wishresult = $dbconnection->query($query);","if($wishresult->num_rows > 0){","  while($row = $wishresult->fetch_assoc()){","    array_push($wisharray,$row);","  }","}  "],"id":33}],[{"start":{"row":75,"column":0},"end":{"row":76,"column":0},"action":"insert","lines":["",""],"id":34}],[{"start":{"row":76,"column":0},"end":{"row":77,"column":0},"action":"insert","lines":["",""],"id":35}],[{"start":{"row":76,"column":0},"end":{"row":95,"column":3},"action":"insert","lines":["//get users wishlist","$query = \"SELECT ","wishlist.id as wishid,","product.id as productid,","product.name as name,","product.price as price,","product.image as image ","FROM wishlist ","INNER JOIN product ","ON wishlist.productid=product.id","WHERE wishlist.userid='$id'\";","","$wisharray = array();","","$wishresult = $dbconnection->query($query);","if($wishresult->num_rows > 0){","  while($row = $wishresult->fetch_assoc()){","    array_push($wisharray,$row);","  }","}  "],"id":36}],[{"start":{"row":158,"column":25},"end":{"row":158,"column":26},"action":"insert","lines":["s"],"id":37}],[{"start":{"row":158,"column":26},"end":{"row":158,"column":27},"action":"insert","lines":["h"],"id":38}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"insert","lines":["o"],"id":39}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"insert","lines":["u"],"id":40}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"insert","lines":["t"],"id":41}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"remove","lines":["t"],"id":42}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"remove","lines":["u"],"id":43}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"remove","lines":["o"],"id":44}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"insert","lines":["r"],"id":45}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"insert","lines":["o"],"id":46}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"insert","lines":["u"],"id":47}],[{"start":{"row":158,"column":30},"end":{"row":158,"column":31},"action":"insert","lines":["t"],"id":48}],[{"start":{"row":158,"column":30},"end":{"row":158,"column":31},"action":"remove","lines":["t"],"id":49}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"remove","lines":["u"],"id":50}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"insert","lines":["t"],"id":51}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"remove","lines":["t"],"id":52}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"remove","lines":["o"],"id":53}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"remove","lines":["r"],"id":54}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"insert","lines":["o"],"id":55}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"insert","lines":["r"],"id":56}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"insert","lines":["t"],"id":57}],[{"start":{"row":80,"column":8},"end":{"row":80,"column":9},"action":"insert","lines":["s"],"id":58}],[{"start":{"row":80,"column":9},"end":{"row":80,"column":10},"action":"insert","lines":["h"],"id":59}],[{"start":{"row":80,"column":10},"end":{"row":80,"column":11},"action":"insert","lines":["o"],"id":60}],[{"start":{"row":80,"column":11},"end":{"row":80,"column":12},"action":"insert","lines":["r"],"id":61}],[{"start":{"row":80,"column":12},"end":{"row":80,"column":13},"action":"insert","lines":["t"],"id":62}],[{"start":{"row":158,"column":29},"end":{"row":158,"column":30},"action":"remove","lines":["t"],"id":63}],[{"start":{"row":158,"column":28},"end":{"row":158,"column":29},"action":"remove","lines":["r"],"id":64}],[{"start":{"row":158,"column":27},"end":{"row":158,"column":28},"action":"remove","lines":["o"],"id":65}],[{"start":{"row":158,"column":26},"end":{"row":158,"column":27},"action":"remove","lines":["h"],"id":66}],[{"start":{"row":158,"column":25},"end":{"row":158,"column":26},"action":"remove","lines":["s"],"id":67}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"remove","lines":["3"],"id":68}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"insert","lines":["4"],"id":69}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"remove","lines":["3"],"id":70}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"insert","lines":["4"],"id":71}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"remove","lines":["4"],"id":72}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"insert","lines":["5"],"id":73}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"remove","lines":["5"],"id":74}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"remove","lines":["4"],"id":75}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"insert","lines":["5"],"id":76}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"insert","lines":["5"],"id":77}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"remove","lines":["5"],"id":78}],[{"start":{"row":168,"column":20},"end":{"row":168,"column":21},"action":"insert","lines":["4"],"id":79}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"remove","lines":["5"],"id":80}],[{"start":{"row":168,"column":30},"end":{"row":168,"column":31},"action":"insert","lines":["4"],"id":81}],[{"start":{"row":167,"column":36},"end":{"row":167,"column":37},"action":"remove","lines":["3"],"id":82}],[{"start":{"row":167,"column":36},"end":{"row":167,"column":37},"action":"insert","lines":["4"],"id":83}],[{"start":{"row":175,"column":21},"end":{"row":175,"column":22},"action":"remove","lines":["4"],"id":84}],[{"start":{"row":175,"column":21},"end":{"row":175,"column":22},"action":"insert","lines":["3"],"id":85}],[{"start":{"row":172,"column":19},"end":{"row":172,"column":20},"action":"remove","lines":["p"],"id":86}],[{"start":{"row":172,"column":19},"end":{"row":172,"column":20},"action":"insert","lines":["h"],"id":87}],[{"start":{"row":172,"column":20},"end":{"row":172,"column":21},"action":"insert","lines":["4"],"id":88}],[{"start":{"row":172,"column":58},"end":{"row":172,"column":59},"action":"remove","lines":["p"],"id":89}],[{"start":{"row":172,"column":58},"end":{"row":172,"column":59},"action":"insert","lines":["h"],"id":90}],[{"start":{"row":172,"column":59},"end":{"row":172,"column":60},"action":"insert","lines":["4"],"id":91}]]},"ace":{"folds":[],"scrolltop":2050.5,"scrollleft":0,"selection":{"start":{"row":174,"column":24},"end":{"row":174,"column":24},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":145,"state":"start","mode":"ace/mode/php"}},"timestamp":1474884289155,"hash":"b45dd0e8b79af6e437a36c21d8da58cd9691d630"}