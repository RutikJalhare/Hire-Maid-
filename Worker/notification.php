<?php
session_start();
$WORKER_ID= $_SESSION["worker"] ;
include 'db_connection.php';

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


     #title{
     color: #e67e22;
    }
    .order{
      text-decoration-line: none; 
    }
</style>
    </style>

</head>
<body>


    <nav class="navbar  navbar-light ">
        <div class="container-fluid">
          <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
         
          <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
            <form class="d-flex">
              <a href="../myindex.php" class=" me-3 order mt-3 text-danger fw-bold">Home</a>
            
                <a href="Main_page.php" class=" me-3 order mt-3 text-danger fw-bold">Dashboard</a>
              <a href="order.php" class=" order mt-3 text-danger fw-bold">Order's</a>
             
  
          
            </form>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked />
              <label class="form-check-label fw-bold text-danger" for="flexSwitchCheckChecked">Manage Active status</label>
            <br/>
            <label class="form-check-label fw-bold text-info" >Active</label>
            
            </div>
         
          </div>
        </div>
      </nav>




    <!-- Navbar -->
  
	<div class="container py-5">
        <div class="py-3 fw-bold ">
            <h4  style="color:#e67e22">Cleanit</h4>
          </div>


<?php

$sql="SELECT * FROM   order_table O,persons p where notification_W='1' AND (order_status='Placed' or order_status='Cancel') AND O.U_id=p.id AND W_id=".$WORKER_ID ;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;


if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {
     $ord_id=$rows['email'];   
     $name=$rows['name'];
     $photo=$rows['photo'];
     $order_status=$rows['order_status'];

  ?>
 <div id="note"  class="alert alert-warning">
          
            <h6><?php echo $name ;?> </h6>
            <img  height="50px" width="50px"  src="../User/user_photo/<?php echo $photo ;?>" class="rounded-circle"   alt="100x100" 
            data-holder-rendered="true">
            <strong>Message !</strong>
           <span class="text-dark fw-bold"> <?php echo $name ;?><?php echo $order_status ;?></span> the order .
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
 notification_W='0'
 WHERE W_id='$WORKER_ID'
 ";
 $res=mysqli_query($conn,$sql2)or die(mysqli_error());
?>