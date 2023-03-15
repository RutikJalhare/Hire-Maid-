<?php
session_start();
// echo "welcome" . $_SESSION["worker"] ;
include 'db_connection.php';
$WORKER_ID=$_SESSION["worker"] ;

//total notification 

$not_sql="SELECT * FROM   order_table where notification_W='1'AND W_id=".$WORKER_ID;
$not_res=mysqli_query($conn,$not_sql) ;
$not_count=mysqli_num_rows($not_res) ;







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
          <a href="../myindex.php" class=" order m-3 text-danger fw-bold">Home</a>
         
          <a href="Main_page.php" class=" order mt-3 text-danger fw-bold">Dashboard</a>
          <div class="p-3  mb-2">

<a href="notification.php"><i class="fa-solid fa-bell  text-danger"><span class="text-success"><?php  echo $not_count;?></span></i>
</a>
        </div>

       

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
$sql="SELECT * FROM  persons p,order_table o where p.id=o.U_id AND O.W_id=".$WORKER_ID;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;


if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

    $ord_id=$rows['order_id'];  
$U_id=$rows['U_id'];  
 $name=$rows['name'];
 $photo=$rows['photo'];
$contact=$rows['contact'];
$Address=$rows['Address'];
$order_service =explode(",", $rows['Service']);
$order_status=$rows['order_status'];

?>

<div class=" p-3 col-lg-4 col-sm-6">
        <!-- Card -->
        <div class="card">
        <div class="comment ms-4 mt-4 text-justify float-left">
    

        <img  src="../User/user_photo/<?php echo $photo ;?>" alt="" class="rounded-circle" width="40" height="40">
        <p class="fw-bold lead"><?php echo $name.$ord_id ;?></p>
        <span>+91 <?php echo $contact ;?></span>
        <br>
        <p class="text-secondary lead">
        <?php echo $Address ;?>
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
              </ol>
              <!-- <div class="m-1">
                <span class="fw-bold lrad text-dark">Booking Time :</span><p class="text-danger fw-bold lead">12:00 AM</p>
        
              </div> -->
        </div>
        </div>

        <div class="m-1">
                               <!-- <span class="fw-bold lrad text-dark">Booking Time :</span><p class="text-danger fw-bold lead">12:00 AM</p> -->
                               <span class="fw-bold lrad text-dark">Status : </span> <span class="fw-bold lrad text-danger"> <?php echo $order_status; ?></span>
                      
                            
                              </div>
          
<!--  
 <a href="Accept_order.php?order=Reject&userid=<?php echo $U_id ; ?>&orde_id=<?php echo $ord_id ; ?>">
 <button  type="button" class="btn btn-danger btn-rounded">Decline </button></a> -->
                                 
           <div>
          
 <a href="Accept_order.php?order=completed&userid=<?php echo $U_id ; ?>&orde_id=<?php echo $ord_id ; ?>">
 <button  type="button" class="btn m-3 btn-success btn-rounded">completed </button></a>
    </div>
       
       
       
                            </div>

         








          <!-- Card -->
            </div>











<?php


  }
}

?>


 

    </div>
    </div>




</body>
</html>