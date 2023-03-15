<?php
session_start();
$user_id=$_SESSION["user"];

include 'db_connection.php';
  $workerid= $_GET['worker_id'];
  $serviceErr="";



     $sql="SELECT * FROM  worker_table_reg where id=".$workerid;
     $res=mysqli_query($conn,$sql) ;
     $count=mysqli_num_rows($res) ;
     if($count>0)
     {
       while($rows=mysqli_fetch_assoc($res))
       {
         $name=$rows['name'];
          $contact=$rows['contact'];
         $addresslon_lat=$rows['addresslon_lat'];
         $photo=$rows['photo'];
     
    //  print_r(explode(",", $rows['services']));
         $services=explode(",", $rows['services']); 
       }
     }
     
?>




<?php
//PLACING ORDER
 if(isset($_POST['hire'])) 
 {

 

if(!empty($_POST['ca'])){
 $service_list= $_POST['ca']; 
 $checked=""; 

 foreach($service_list as $chk1)  
     {  
        $checked .= $chk1.",";  
     } 
    //  echo $checked;

    $sql="INSERT INTO  order_table SET
    U_id='$user_id',
    W_id='$workerid', 
    Service='$checked', 
    order_status='Placed',
    notification_W='1', 
    notification_U='0'
    ";
 $res=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
 if($res==true)
 {
?>
<h2 class="lead fw-bold text-success">
<?php echo "Your Order Placed successfully. Thank You ! ";?>
</h2>
<?php


 }
 else{
  ?>
    <h2 class="lead fw-bold
 text-danger">
<?php echo "Technical Error ! Please try again later. ";?>
</h2>
  <?php
  // echo "not inserted";
 }









}
else{
  $serviceErr="To hire Servants ! Please Select Service ";
}

  








//  echo "ok";   
 }
 else{
    // echo "not click";
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">




 

   
  </head>
<body>


<nav class="navbar  navbar-light ">
      <div class="container-fluid">
        <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
       

        <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
          <form class="d-flex">
        
            
            <div class="p-3  mb-2">
  
            
            <a href="Main_page.php"><p class="mt-3 fw-bold">Dashboard</p></a>
            </div>
        

          </form>
          
       
        </div>
      </div>
    </nav>














<form method="POST">
      <div class="container mt-5">
    
            <div class="row d-flex justify-content-center">
                
                <div class="col-md-7">
                    
                    <div class="card p-3 py-4">
                        
                        <div class="text-center">

                        <img src="../worker/workerphoto/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" width="100" height="40" />
<!-- 
                            <img src="../upload_image_to_web_from_this_folder/<?php echo $photo ;?>" width="100" class="rounded-circle"> -->
                        </div>
                        
                        <div class="text-center mt-3">

                            <h5 class="mt-2 mb-0"> <span> <?php echo  $name ;?></span></h5>
                            <span>+91  <span> <?php echo  $contact ;?></span></span>
                            
                            <div class="px-4 mt-1">
                                <p class="fonts">
                                <span> <?php echo  $addresslon_lat ;?></span>  </p>
                            
                            </div>
                   
                            
                          


                          <p class="text-start ms-3 fw-bold">Select Services </p> 


                          <span class="text-danger fw-bold "> <?php echo  $serviceErr ;?></span>  </p>
                            


 <?php 

        foreach($services as $item){

?>
 <div  class="btn-group btn-group-toggle" data-toggle="buttons">
                                 <label class="btn btn-success opacity-50 m-2">
   
                                 <input type="checkbox"  name="ca[]" value="<?php echo $item ;?>"   > <?php echo $item ;?>
                                  
                                  </label>
                                   </div>    
                              <br>

<?php




         
      }
        ?>


                              

                           
  

<!-- comment section start  -->
<div class="container mt-3">
<?php
$sql5="SELECT * FROM  comments c,	persons p where p.id=c.U_id AND c.w_id=".$workerid;
$res5=mysqli_query($conn,$sql5) ;
$count5=mysqli_num_rows($res5) ;
if($count5>0)
{
  while($rows5=mysqli_fetch_assoc($res5))
  {
 $name=$rows5['name'];
 $photo=$rows5['photo'];
 $comments=$rows5['comments'];

?>


<div class="col-md-12">
                  <div class="bg-white p-2">
                      <div class="d-flex flex-row user-info">
                      <img   class="rounded-circle" src="user_photo/<?php echo $photo ;?>" width="45">
                          <div class="text-start d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $name ?></span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                      </div>
                      <div class="mt-2 text-dark lead  text-start">
                          <p class="comment-text">
                           <?php  echo $comments ?>
                            .
                          </p>
                      </div>
                  </div>
         
           </div>


<?php

  }
}
 


?>









                            <div class="buttons">
                                

<button value="hire" name="hire" class="btn btn-outline-primary px-4">Hire</button>

                              </div>
                            
                            
                        </div>
                        
                       
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
  

        </form> 



                    
                            
</body>
</html>
