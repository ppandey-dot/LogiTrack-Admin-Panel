<?php
 include('include/connection.php');
 
$pidd=$_POST['datapost'];
$query="SELECT * from truck_unload_point where truck_route_id='$pidd'";
$smtp=$conn->prepare($query);
$smtp->execute();?>
<option value="">--Select unload Point--</option>
<?php while ($result=$smtp->fetch()){?>

 <option value="<?php echo $result['unload_id'];?>"><?php echo $result['truck_unload_point']; ?></option>
<?php }

?>