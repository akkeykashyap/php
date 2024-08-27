<?php
include('connect.php');

$id = $_GET['id'];
$del = "delete from employee where id = '$id'";
$ab = mysqli_query($conn,$del);
if($ab){
header("Location: http://localhost/company/view.php");
exit();
}
?>
