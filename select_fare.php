<?php
include('include/connection.php');

$booking_advance=$_POST['datapost4'];
$gst=$_POST['datapost3'];
$booking_weight=$_POST['datapost'];
$query="SELECT * from truck_unit where unit_id='2'";
$smtp=$conn->prepare($query);
$smtp->execute();
$result=$smtp->fetch();
 $unit_cost=$result['unit_cost']; 
 $unit_name=$result ['unit_name'] ;

$price= $booking_weight * $unit_cost/ $unit_name ;
     
     $price1=$price*$gst/100;
     $price2=$price+$price1;
   
if(  empty($booking_advance) ){
     echo("$price2");

}else{
     $price3= $price2-$booking_advance;
     echo ("$price3");
}



  ?>