<?php
include('include/connection.php');

 $gst=$_POST['datapost3'];
 $booking_price=$_POST['datapost'];

$booking_weight=$_POST['datapost4'];
 $query="SELECT * from truck_unit where unit_id='2'";
$smtp=$conn->prepare($query);
$smtp->execute();
$result=$smtp->fetch();
 $unit_cost=$result['unit_cost']; 
 $unit_name=$result ['unit_name'] ;

$price= $booking_weight * $unit_cost/ $unit_name ;
     
     $price1=$price*$gst/100;
     echo("$price1");
   

  




?>