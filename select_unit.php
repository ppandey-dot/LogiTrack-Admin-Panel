<?php
include('include/connection.php');

$booking_weight=$_POST['datapost'];
$query="SELECT * from truck_unit where unit_id='2'";
$smtp=$conn->prepare($query);
$smtp->execute();
$result=$smtp->fetch();
 $unit_cost=$result['unit_cost']; 
 $unit_name=$result ['unit_name'] ;

 
 $price= $booking_weight * $unit_cost/ $unit_name ;
     echo ("$price");


?>