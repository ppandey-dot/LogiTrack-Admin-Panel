 <?php
 include('lib/connect.php');
 if(isset($_GET['del_event'])){
$del_id=$_GET['del_event'];
$query2="DELETE  from event where id='$del_id'";
$query3="DELETE  from blog_comment where blog_id='$del_id'";
$smtp2=$conn->prepare($query2);
$smtp3=$conn->prepare($query3);
if($smtp2->execute() and $smtp3->execute()){
    echo "<script>window.location='event.php'</script>";
}
}