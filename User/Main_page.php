<?php
session_start();
include 'db_connection.php';

$User_id=$_SESSION["user"];
$sql="SELECT * FROM  persons where id=".$_SESSION["user"];
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

   $photo=$rows['photo'];

  }
}

//total notification 

$not_sql="SELECT * FROM   order_table where notification_U='1'AND U_id=".$User_id;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
<body>

    <nav class="navbar  navbar-light ">
      <div class="container-fluid">
        <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
       

        <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
          <form class="d-flex" method="POST">
            <a href="../myindex.php"><p class="m-3 fw-bold">Home</p></a>
            <a href="order.php"><p class="mt-3 fw-bold">Order's</p></a>
            
            <div class="p-3  mb-2">
  
             <a href="notification.php">  <i class="fa-solid fa-bell  text-danger"><span class="text-success"><?php echo $not_count;?></span></i>
             </a> 
           
            </div>
        <a href="profile.php">
          <img class="rounded-circle " height="50px" width="50px"
          src="user_photo/<?php echo $photo ;?>" data-holder-rendered="true">
    
        
       
     
        </a>
              

        
          
       
        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row ">
        <div class="col-3">


<!-- sselect country-->
<div 
class=" p-3">
<select name="city" onchange="random_function()" id="input" class="form-select"  aria-label="multiple select example"> 
<option selected>Choose City </option>
 <option value="Aurangabad">Aurangabad</option> 
 <option value="Nanded">Nanded</option> 
 <option value="Mumbai">Mumbai</option>
 </select>
</div>


<!-- select area -->
<script>
function random_function()
{
var a=document.getElementById("input").value;
if(a==="Aurangabad")
{
var arr=["Kranti chowk","Croma Multiplex","Aurangpura","J Tower"];

}
else if(a==="Nanded")
{
var arr=["Ambedkar nagar","Colleage Line","Shivaji Chowk","Siddhart Nagar"];
}

else if(a==="Mumbai")
{
var arr=["Jay Prakash Nagar","Goregaon west","Rajiv Nagar ","kamble chawl"];
}
var string="";
for(i=0;i<arr.length;i++)
{
string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
document.getElementById("output").innerHTML=string;
}
}
</script>
</div>

        <div class="col-3">
          <div class="p-3">
          <select name="area" id="output" class="form-select"  aria-label="multiple select example">  </select></div>
        </div>
        
        <div class="col-3">
     <div class="p-3">
        <button  value="Register"   name="filter"
                    class="button-18">Apply Filter </button>
        </div>
        </div>
        </form>

      </div>
    </div>





<!-- filtter code  -->

<?php
if(isset($_POST['filter']))
{
  // echo "click";

   $city=$_POST['city'];
  $area=$_POST['area'];
  
 $sql="SELECT * FROM  worker_table_reg WHERE  addresslon_lat LIKE '%$city%' AND approve_status='Accept' ";
 $res=mysqli_query($conn,$sql) ;
 $count=mysqli_num_rows($res) ;
 if($count>0)
 {
  while($rows=mysqli_fetch_assoc($res))
  {
   $id=$rows['id'];
   $email=$rows['email'];
   $name=$rows['name'];
    $contact=$rows['contact'];
    $addresslon_lat=$rows['addresslon_lat'];
   $photo=$rows['photo'];
  $services =explode(",", $rows['services']);
   $approve_status=$rows['approve_status'];
?>
  <div class="p-3 col-lg-4 col-sm-6">
  <!-- Card -->
  <div class="card">
  <div class="comment ms-4 mt-4 text-justify float-left">
  <img src="../worker/workerphoto/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" width="40" height="40" />
        <p class="fw-bold lead"><?php echo $name ;?></p>
  <span>+91 <?php echo $contact ;?></span>
  <br>
  <p class="text-secondary lead">
  <?php echo $addresslon_lat ;?>
  </p> 

  <div class="bg-white">
  <ol class="list-group list-group-numbered">
  <?php 
  foreach($services as $item){
    ?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-info"><?php  echo $item ; ?></div>
                 
                  </div>
              
                </li>
<?php

  }

  ?>

        <!-- <div class="m-1">
          <span class="fw-bold lrad text-dark">Distance :</span><p class="text-danger fw-bold lead">1.2 KM</p>
  
        </div> -->
  </div>
  </div>
      <!-- Card content -->
      <div class="card-body">
          <a href="worker_info.php?worker_id=<?php echo $id?>"  style="background-color: rgb(245, 7, 102); " class="button-18">View </a>
      </div>
    
    </div>
  
    <!-- Card -->
</div>




<?php


  }
}




}
else{
  ?>
    
    <div class="container-fluid">
<div class="row">

<?php
$sql="SELECT * FROM  worker_table_reg where approve_status='Accept'";
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;

if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {
   $id=$rows['id'];
   $email=$rows['email'];
   $name=$rows['name'];
    $contact=$rows['contact'];
    $addresslon_lat=$rows['addresslon_lat'];
   $photo=$rows['photo'];
  $services =explode(",", $rows['services']);
   $approve_status=$rows['approve_status'];
?>
  <div class="p-3 col-lg-4 col-sm-6">
  <!-- Card -->
  <div class="card">
  <div class="comment ms-4 mt-4 text-justify float-left">
  <!-- <img  src="../upload_image_to_web_from_this_folder/<?php echo $photo ;?>" alt="" class="rounded-circle" width="40" height="40"> -->
  <img src="../worker/workerphoto/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" width="40" height="40" />

        <p class="fw-bold lead"><?php echo $name ;?></p>
  <span>+91 <?php echo $contact ;?></span>
  <br>
  <p class="text-secondary lead">
  <?php echo $addresslon_lat ;?>
  </p> 

  <div class="bg-white">
  <ol class="list-group list-group-numbered">
  <?php 
  foreach($services as $item){
    ?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-info"><?php  echo $item ; ?></div>
                 
                  </div>
              
                </li>
<?php

  }

  ?>
<!-- 
        <div class="m-1">
          <span class="fw-bold lrad text-dark">Distance :</span><p class="text-danger fw-bold lead">1.2 KM</p>
  
        </div> -->
  </div>
  </div>
      <!-- Card content -->
      <div class="card-body">
          <a href="worker_info.php?worker_id=<?php echo $id?>"  style="background-color: rgb(245, 7, 102); " class="button-18">View </a>
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




<!-- end Modal -->


<?php
  // echo "not click";
}



?>

















</body>
</html>