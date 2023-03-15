<?php
session_start();
include 'db_connection.php';
 $user_id=$_SESSION["user"];






//total notification 

$not_sql="SELECT * FROM   order_table where notification_U='1'AND U_id=".$user_id;
$not_res=mysqli_query($conn,$not_sql) ;
$not_count=mysqli_num_rows($not_res) ;



$sql="SELECT * FROM  persons where id=".$user_id;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

   $photo=$rows['photo'];

  }
}






?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/70ebe3073f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
     #title{
     color: #e67e22;
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
          <a href="Main_page.php"><p class="mt-3 fw-bold">Dashboard</p></a>
          
          <div class="p-3  mb-2">

           <a href="notification.php">  <i class="fa-solid fa-bell  text-danger"><span class="text-success"><?php echo $not_count; ?></span></i>
           </a> 
         
          </div>
      <a href="profile.php">
        <img class="rounded-circle " height="50px" width="50px"
        src="user_photo/<?php echo $photo ;?>" data-holder-rendered="true">
  
      
     
   
      </a>
            

        </form>
        
     
      </div>
    </div>
  </nav>

    <!-- <nav class="navbar  navbar-light ">
      <div class="container-fluid">
        <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
       
       
      </div>
    </nav> -->
    <div class="text-center">
        <h1  class="navbar-brand fs-2 lead text-secondary fw-bold">Manage order's</h1>
    </div>

<div class="container-fluid">
<div class="row">

<?php

$sql="SELECT * FROM   order_table o,worker_table_reg W where o.W_id=W.id AND o.U_id=".$user_id;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {
    
$order_id=$rows['order_id'];
$W_id=$rows['W_id'];
$photo=$rows['photo'];
$name=$rows['name'];
$contact=$rows['contact'];
$address=$rows['addresslon_lat'];
$order_status=$rows['order_status'];
$order_service =explode(",", $rows['Service']);

?>


<div class=" p-3 col-lg-4 col-sm-6">
                       
                       <div class="card">
                       <div class="comment ms-4 mt-4 text-justify float-left">
                  
                       <img src="../worker/workerphoto/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" width="40" height="40" />

                      <p class="fw-bold lead"><?php echo $name; ?></p>
                       <span>+91 <?php echo $contact; ?></span>
                       <br>
                       <p class="text-secondary lead">
                       <?php echo $address; ?>
                       </p> 
                       <div class="bg-white">
                       <ol class="list-group list-group-numbered">




                       <?php 
        foreach($order_service as $item){

?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-info"><?php  echo $item ; ?></div>
                 
                  </div>
              
                </li>
<?php




         
      }
        ?>














                             <div class="m-1">
                               <!-- <span class="fw-bold lrad text-dark">Booking Time :</span><p class="text-danger fw-bold lead">12:00 AM</p> -->
                               <span class="fw-bold lrad text-dark">Status : </span> <span class="fw-bold lrad text-danger"> <?php echo $order_status; ?></span>

                             </div>
                       </div>
                       </div>
                   
                         <?php
                         if($order_status=="completed"){
                          ?>
                          <form method="POST">
                    
            

       <a href="comment.php?wid=<?php echo $W_id?>">     <button type="button" class="btn btn-primary m-3" >
 Write A Comment
</button>  </a> 
                         <?php

                         }
                         else{
                          ?>
                             <div class="card-body">
                            <a href="cancel_order.php?ord_id=<?php echo $order_id ; ?>&worker_id=<?php echo $W_id ; ?>"><button type="button" class="btn btn-danger"> Cancel Order</button> </a>  
                           </div>


                         <?php

                         }

                         ?>

                        </form>
                     
                        
                         
                         </div>
                       
                        
                           </div> 






<?php

  }
}
?>


       


    </div>
    </div>



    



</body>
</html>