<?php
include 'db_connection.php';
if(
      isset($_GET['status'])  && isset($_GET['workerid']) && isset($_GET['Admin_id'])
)
{
 $status=$_GET['status'];
 $workerid=$_GET['workerid'];
 $Admin_id=$_GET['Admin_id'];


 $sql2="UPDATE worker_table_reg SET 
approve_status	='$status',
admin_name='$Admin_id'
WHERE id='$workerid'
";
$res=mysqli_query($conn,$sql2)or die(mysqli_error());
}
?>
<script>
      window.location.href = "http://localhost/LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/Admin/Mainpage.php";
//      LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/AdminMainpage.php
</script>