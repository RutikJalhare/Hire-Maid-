
<?php
session_start();
include 'db_connection.php';
 $user_id=$_SESSION["user"];

 $nameErr="";
 $emailErr="";
 $contactErr="";
 $AddressErr="";
 $photoErr="";


//  updating profile  
if(isset($_POST['update'])) 
{
  

  //name validation 
 if(empty($_POST['name'])) 
 {
 $nameErr = "This field is required ";
 }
 else
 {
   $name = RemoveSpecialChar($_POST['name']);
 }

    //email validation 
 if(empty($_POST['email'])) 
 {
   $emailErr = "This field is required";
 }
 else
 {
 //echo $email=$_POST['email'];
     $email = test_input($_POST['email']);
 }
  
  
  //validation for contact 
if(empty($_POST['contact'])) 
{
  $contactErr = "Please Enter valid contact.";
}
else
{
  $contact = test_input($_POST['contact']);
  $contactErr=validating($contact);
}

//validation for address
if(empty($_POST['address'])) 
{
  $AddressErr = "This field is required";
}
else
{
   $address = Address($_POST['address']);
}


if(isset($_FILES['photo']['name'])) 
{
   $image_name=$_FILES['photo']['name'];

  //upload image only when image is selected
  $source_path=$_FILES['photo']['tmp_name'];
  $destination_path="user_photo/".$image_name;
  $upload=move_uploaded_file($source_path,$destination_path) ;
         if($upload==true) 
         {
        $photo = $image_name;
  //  echo " upload";
         }
         else
         {
        //  echo "not upload";
     $photoErr="Please Upload photo";
         }
}




//if all error filed are empty then get the original data

if(empty($nameErr) && empty($emailErr)  && empty($contactErr)     &&
empty($AddressErr)     &&
empty($photoErr)  
){
// correct data 
  $name;
  $email;
  $contact; 
  $address;
  $photo;

  $sql2="UPDATE  persons SET 
  name= '$name',
  email= '$email',
  contact= '$contact',
  Address= '$address',
  photo= '$photo'
  WHERE id='$user_id'";


  $res=mysqli_query($conn,$sql2)or die(mysqli_error());

if($res)
{
  // echo " updated";
  ?>
    <h2 class="lead fw-bold text-success">
<?php echo "Your Profile  successfully Updated. ";?>
</h2>
  <?php
}
else{
  // echo "not updated";
  ?>
   <h2 class="lead fw-bold
 text-danger">
<?php echo "Technical Error ! Please try again later. ";?>
</h2>
  <?php
}



}else{
  ?>
 <h2 class="lead fw-bold
 text-danger">
<?php echo "Registration failed ! Please make sure that enter data is valid.";?>
</h2> 
  <?php


}










  
  
  
  // echo "ok";

}




else{
  // echo "not ";
}




















//vlidation code 
function validating($phone)
{ if(preg_match('/^[0-9]{10}+$/', $phone)) 
{
//means no error everything is true
}
else
{
$invalid="invalid contact";
return $invalid;
}
} 

function test_input($data) 
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

function RemoveSpecialChar($str) 
{
$res = str_replace( array('=','1','2','3',   
'4', '5', '6', '7', '8', '9', '0', 
',','.','!','? ',"'",'"', ':','*','/', '&','-','+','(','#','₹','_' ,'@','\'', '"',
	',' , ')' ,';', '<', '>' ), ' ',$str);
return $res;
}

function Address($str) 
{
$res = str_replace( array(
',','.','!','? ',"'",'"', ':','*','/', '&','-','+','(','#','₹','_' ,'@','\'', '"',
	',' , ')' ,';', '<', '>' ), ' ', $str);
	return $res;
}



















?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/70ebe3073f.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >

 
<div class="container">
  <nav class="navbar  navbar-light ">
    <div class="container-fluid">
      <h1 id="title" class="navbar-brand fs-2 lead fw-bold">Cleanit</h1>
     
      <div class="justify-content-end offset-8  p-1" id="navbarSupportedContent">
        <form class="d-flex">
          <a href="../myindex.php" class="ms-3 order mt-3  fw-bold">Home</a>
          <a href="Main_page.php" class="ms-3 order mt-3  fw-bold">Dashboard</a>
          <a href="order.php" class=" ms-3 order mt-3  fw-bold">Order's</a>
          <div class="p-3  mb-2">

</a>
        </div>

      

        </form>
      
     
      </div>
    </div>
  </nav>
  
<?php

$sql="SELECT * FROM  persons where id=".$user_id;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

    $name=$rows['name'];
   $email=$rows['email'];
   $contact=$rows['contact'];
   $Address=$rows['Address'];
   $photo=$rows['photo'];
?>
<section id="profile" class="vh-100" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-6">
      
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-4"> 
                    <img src="user_photo/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" style="width: 100px;" />
                  </div>
                  <h4 class="mb-2"><?php echo $name ;?></h4>
                  <p class="text-muted mb-4"><?php echo $email ;?> <br>+91 <?php echo $contact ;?></br><span class="mx-2 text-primary">|</span> 
                  <?php echo $Address ;?></p>
                 
                  <button id="show-update" onclick="show_update()"   type="button" class="btn btn-info text-white btn-rounded">Update Profile</button>
                </div>
              </div>
      
            </div>
          </div>
        </div>

<script>
    function show_update()
{
   let update=document.getElementById("update")
   let profile=document.getElementById("profile")
profile.style.display="none";
update.style.display="block";

}
</script>





       







      </section>
</div>
<?php







  }
}





?>














<section  id="update" style="display:none;"  class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                  <div class="d-flex align-items-center mb-3 pb-1">
                
                      <span class="h1 fw-bold mb-0" style="color: #e67e22;">Cleanit</span>
                    </div>
  
                    <h5 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Update Profile </h5>
  
                  
                <form method="POST"  enctype="multipart/form-data">
  
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg" name="name" placeholder="Enter  Name Here" class="form-control form-control-lg" />
                    <span  class="lead error text-danger">*<?php echo $nameErr ?></span>
                  </div>
  
                  <div class="form-outline mb-4">
                      <input type="text" id="form3Example1cg" name="email" placeholder="Enter Email Here" class="form-control form-control-lg" />
                      <span  class="lead error text-danger">*<?php echo $emailErr ?></span>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="text" id="form3Example1cg"  name="contact" placeholder="Enter Contact Here" class="form-control form-control-lg" />
                      <span  class="lead error text-danger">*<?php echo $contactErr ?></span>
                    </div>
  
  
                  <div class="form-outline mb-4">
           
                      <textarea placeholder="Enter Address Here"  name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      <span  class="lead error text-danger">*<?php echo $AddressErr ?></span>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input class="form-control" name="photo" type="file" id="formFileMultiple" required />
                   <label for="formFileMultiple" class="form-label">Upload Photo Here</label>
                  </div>
  
                 
  
  
                  <div class="d-flex justify-content-center">
                    <button value="update" name="update" 
                      class="btn btn-success btn-block btn-lg gradient-custom-4 fw-bold lead text-white">Update</button>
                
                   
                
                
                    </div>
  
          
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>
</html>
