<?php
session_start();
include 'db_connection.php';
$sql="SELECT * FROM admin WHERE id=".$_SESSION['workeadmin'];
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;

if($count>0)
{
while($rows=mysqli_fetch_assoc($res))
{
 $Admin_name=$rows['email'];
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/70ebe3073f.js" crossorigin="anonymous"></script>
  </head>
<body>

    <nav class="navbar  navbar-light ">
      <div class="container-fluid">
        <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1><br/>
      

        <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
          <form class="d-flex">
           
       <p class="fw-bold">welcome <?php echo $Admin_name ?></p>
        
         </form>
      
        </div>
      </div>
    </nav>


<div class="container-fluid">
<div class="row">






<?php
$sql="SELECT * FROM  worker_table_reg";
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
  $crendential=$rows['crendential'];
  $contoarr =explode(",", $rows['services']);
  //  $services=$rows['services'];
  $approve_status=$rows['approve_status'];

  
//show from here 
?>

 
<div class=" p-3 col-lg-4 col-sm-6">
        <!-- Card -->
        <div class="card">
        <div class="comment ms-4 mt-4 text-justify float-left">

        <img src="../worker/workerphoto/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" width="40" height="40" />
<!-- 
        <img  src="../upload_image_to_web_from_this_folder/<?php echo $photo ;?>" alt="" class="rounded-circle" width="40" height="40"> -->
        <p class="fw-bold lead"><?php echo   $name ;?></p>
        <span>+91 <?php echo  $contact ;?></span>
        <br>
        <p class="text-secondary lead">
        <?php echo    $addresslon_lat ;?>
        </p> 
        <div class="bg-white">
        <ol class="list-group list-group-numbered">
            
        <?php 
        foreach($contoarr as $item){

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
             
        </div>
        </div>
            <!-- Card content -->
            <div class="card-body">
   
                  <button type="button" class="btn btn-info " data-toggle="modal" data-target="#<?php echo $id ;?>">View </button>
              
           </div>
         
           <div class="card-body">
          
<select id="select1" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="getOption(this.options[this.selectedIndex].value,'<?php echo $id ?>', '<?php echo $Admin_name ?>')">
<option selected>Update status</option>
<option value="Accept">Accept</option>
<option value="Reject">Reject</option>
</select>
<!-- <select id="select1" onchange="getOption()">
<option value="free" selected>select</option>
            <option value="free">Free</option>
            <option value="basic">Basic</option>
            <option value="premium">Premium</option>
        </select> -->

            <p class="fs-3">status : <span class="text-success"><?php echo  $approve_status; ?></span></p>         
             </div>     


          </div>
        
          <!-- Card -->
 </div>




 <!-- Modal -->
 <div class="modal fade" id="<?php echo $id ;?>" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
       <?php echo $name ;?>
          </div>
          <div class="modal-body">

        <img  src="../upload_doc_to_web_from_this_folder/<?php echo $crendential ;?>"  frameborder="0" width="100%" height="400px">
    

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>







<?php


// show end here
  }
  

 






}








?>





<script type="text/javascript">
    function getOption(status,Worker_id,Admin_id) {
        // selectElement = document.querySelector('#select1');
        // status = selectElement.value;
  //  alert(a + status)
  window.location.href = "http://localhost/LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/Admin/update_worker_request_status.php?status="+status+"&workerid="+Worker_id+"&Admin_id="+Admin_id
    
    
    //  window.location.href = "http://0.0.0.0:8080/Main_project
    //  /Service/order__placed__in__company.php?status="+
    //  status+"&shopname="+shopname+
    //  "&userid="+userid+"&req="+requirment; 
    
    
    
    
    }
    </script>







</body>
</html>