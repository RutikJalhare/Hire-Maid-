<?php
session_start();
// echo "acepted";
include 'db_connection.php';
$User_id=$_SESSION["user"];



?>





<!DOCTYPE html>
<html>
<head>
	<title>Warning Alerts</title>
	<meta charset="utf-8" />
    <script src="https://kit.fontawesome.com/70ebe3073f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
     #title{
     color: #e67e22;
    }

</style>




	<link
	rel="stylesheet"
	href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	/>
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>
    <style>
#note{
    background-color:#f5f6fa;
}
    </style>

</head>
<body>

    <nav class="navbar  navbar-light ">
        <div class="container-fluid">
          <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
         
  
          <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
            <form class="d-flex">

              <a href="../myindex.php"><p class="m-3 fw-bold">Home</p></a>

              <a href="
              
              Main_page.php"><p class="mt-3 fw-bold">Dashboard</p></a>
              
    
    
        
               <a class="ms-3" href="
              
               order.php"><p class="mt-3 fw-bold">order's</p></a>
             
              </div>
          <a href="profile.php">
            <img class="rounded-circle " height="50px" width="50px"
            src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" data-holder-rendered="true">
      
          
         
       
          </a>
                
  
            </form>
            
         
          </div>
        </div>
      </nav>
  
    <!-- Navbar -->
  
	<div class="container py-5">
        <div class="py-3 fw-bold ">
            <h4  style="color:#e67e22">Cleanit</h4>
          </div>


<?php
$sql="SELECT * FROM   order_table o,worker_table_reg w where notification_U='1' AND O.W_id=w.id AND U_id=".$User_id ;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;

if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

     $name=$rows['name'];
    $photo=$rows['photo'];
    $Service=$rows['Service'];
    $order_status=$rows['order_status'];


?>


 <div id="note"  class="alert alert-warning">
            
            <h6> <?php echo $name ;?></h6>
            <img height="50px" width="50px" class="rounded-circle" alt="100x100" 
            src="../Worker/workerphoto/<?php echo $photo ;?>"
            data-holder-rendered="true">
            <strong>Message !</strong>
          <span class="text-dark fw-bold"> Your Order get  </span> <span class="text-danger fw-bold"> <?php echo $order_status ;?></span>  .
        </div>


<?php






   
  }
}


?>







       


	</div>



</body>
</html>

<?php
 $sql2="UPDATE order_table SET 
 notification_U='0'
 WHERE U_id='$User_id'
 ";
 $res=mysqli_query($conn,$sql2)or die(mysqli_error());
?>
