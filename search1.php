<?php
include ("includes/dbconnection.php");
    $q=$_GET["q"];
    
    $arsearch = array();
    $query = "SELECT * FROM product WHERE shortname LIKE '%".$q."%'";
    $result = $dbconnection->query($query);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc())
        {
           echo $row['shortname']."\n";
        }
        
    }
?>