<?php
// echo "acepted";
include 'db_connection.php';
session_start();
$Accpted=$_GET['order'];
$Reject=$_GET['order'];
$completed=$_GET['order'];
  $userid=$_GET['userid'];


  $order_id=$_GET['orde_id'];
  $worker_id=$_SESSION["worker"];
  

  if($completed=="completed")
  {
        // echo "accept";
        $sql2="UPDATE order_table SET 
        order_status='$completed',
        notification_U='1'
        WHERE U_id='$userid' AND W_id='$worker_id' AND order_id=' $order_id';
        ";
        $res=mysqli_query($conn,$sql2)or die(mysqli_error());
  }


// for accept 

if($Accpted=="Accpted")
{
      // echo "accept";
      $sql2="UPDATE order_table SET 
      order_status='$Accpted',
      notification_U='1'
      WHERE U_id='$userid' AND W_id='$worker_id' AND order_id=' $order_id';
      ";
      $res=mysqli_query($conn,$sql2)or die(mysqli_error());
}



//for rejection
if($Reject=="Reject")
{
      // echo "accept";


      $sql2="UPDATE order_table SET 
      order_status='$Reject',
      notification_U='1'
      WHERE U_id='$userid' AND W_id='$worker_id' AND order_id=' $order_id';
      ";
      $res=mysqli_query($conn,$sql2)or die(mysqli_error());
}

?>
<script>
      window.location.href = "http://localhost/LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/Worker/Main_page.php";
   
</script>