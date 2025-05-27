<?php
include('include/connection.php');

$pidd=$_POST['datapost'];

$query="SELECT * from truck_driver where driver_id='$pidd'";
$smtp=$conn->prepare($query);
$smtp->execute();
$result=$smtp->fetch();
 $number=$result['driver_mobile']; 

 echo ("$number");
 

?>
