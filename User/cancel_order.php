<?php
include 'db_connection.php';
session_start();
 $user_id=$_SESSION["user"];
 $ord_id=$_GET['ord_id'];
 $worker_id=$_GET['worker_id'];


 $sql2="UPDATE order_table SET 
 order_status='Cancel',
 notification_W='1'
 WHERE U_id='$user_id' AND W_id='$worker_id' AND order_id=' $ord_id';
 ";
 $res=mysqli_query($conn,$sql2)or die(mysqli_error());




?>
<script>
      window.location.href = "http://localhost/LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/User/order.php";
   
</script>