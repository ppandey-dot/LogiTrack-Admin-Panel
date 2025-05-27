<?php
include('include/connection.php');

$pidd=$_POST['datapost'];
$query="SELECT * from truck_load_point where truck_route_id='$pidd'";
$smtp=$conn->prepare($query);
$smtp->execute();?>
<option value="">--Select load Point--</option>
<?php while ($result=$smtp->fetch()){?>

 <option value="<?php echo $result['load_id'];?>"><?php echo $result['truck_load_point']; ?></option>
<?php }

?>