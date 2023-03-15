<?php
include 'db_connection.php';


$nameErr="";
$emailErr="";
$contactErr="";
$AddressErr="";
$photoErr="";
$passwordErr="";

//login code
if(isset($_POST['login'])) 
{
  // echo "clicked";

   $email =mysqli_real_escape_string ($conn,$_POST['email']);
  //RemoveSpecialChar
   $password=mysqli_real_escape_string ($conn,$_POST['password']);

    $sql2="SELECT * FROM persons WHERE email='$email' AND password='$password'";


     //3.execute the query 
 $res2=mysqli_query($conn,$sql2) ;
 
 //4.count rows wheather the user exist or not 
 $count2=mysqli_num_rows($res2) ;
 if($count2 > 0) 
 {
  // echo "welcome ";

  while($rows=mysqli_fetch_assoc($res2))
{
  $id=$rows['id'];
 session_start();
 $_SESSION["user"] = $id;

}

header("location:http://localhost/LaundryManagementFINALphp/LaundryManagementFINAL/LaundryManagementFINAL/Laundry-managment/User/Main_page.php");


 }
 else{
?>
<h2 class="lead fw-bold
 text-danger">
 <?php echo "Invalid User name Or Password.";?>
</h2> 
<?php


  // echo "not available  ";
 }












}else{
  // echo " not mmmmmclicked";
}






//registration code 
if(isset($_POST['register'])) 
{

 //name validaton 
 if(empty($_POST['name'])) 
 {
$nameErr = "This field is required ";
 }
 else
 {
   $name = RemoveSpecialChar($_POST['name']);
 }


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
        // echo "not upload";
     $photoErr="Please Upload photo";
         }
  
 
}
//photo validation end here


$password=$_POST['password'];
$number = preg_match('@[0-9]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(strlen($password) < 5 || !$number  || !$lowercase || !$specialChars) 
{
  $passwordErr="Password must have 5 characters and  contain at least one number, one lower case letter and one special character.";
}
else
{
  $password=$password;
}




if(empty($nameErr) && empty($emailErr)  && empty($contactErr)     &&
empty($AddressErr)     &&
empty($userphotoErr) &&
empty($passwordErr) 
)
{
  $name;
  $email;
  $contact; 
  $address;
  $photo;
  $password;


//validation that user is already registet Or not 
$sql3="SELECT * FROM persons WHERE email='$email' AND password='$password'";

$res3=mysqli_query($conn,$sql3) ;

//4.count rows wheather the user exist or not 
$count3=mysqli_num_rows($res3) ;


if($count3 > 0) 
{
  ?>
  <h2 class="lead  fw-bold text-danger">
<?php echo "Sorry... Username Already taken ! ";?>
</h2>

<?php
  // echo "already available ";
}else{

  // echo "insert ";
$sql="INSERT INTO  persons SET
name='$name',
email='$email', 
contact='$contact', 
Address='$address',
photo='$photo', 
password='$password'
";
$res=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
if($res==true)
{
  ?>
  <h2 class="lead fw-bold text-success">
<?php echo "You are successfully registered.Thank You";?>
</h2>
  <?php
// echo "inserted ";
}
else{
  ?>
    <h2 class="lead fw-bold
 text-danger">
<?php echo "Technical Error ! Please try again later. ";?>
</h2>
  <?php
  // echo "not inserted ";
}





}

























}
else{

  ?>
   <h2 class="lead fw-bold
 text-danger">
<?php echo "Registration failed ! Please make sure that enter data is valid.";?>
</h2> 
  <?php
  // echo "registration failed";
}


















//  echo " click";
}
else{
  // echo "not click";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .loginbtn{
        background-color: #e67e22;
    }
</style>


</head>
<body  >
  <!-- style="background-color: #9A616D;" -->


  <div  class="row">
    <section id="login" class="vh-100" ">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div> -->
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                    <form method="POST" >
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0" style="color: #e67e22;">Cleanit</span>
                        </div>
      
                        <h5 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      
                        <div class="form-outline mb-3">
                          <input type="email" id="form2Example17" name="email" placeholder="Enter Email Here" class="form-control form-control-lg" />
                      
                        </div>
      
                        <div class="form-outline mb-3">
                            <input type="password" id="form2Example17" name="password" placeholder="Enter Password Here" class="form-control form-control-lg" />
                        
                          </div>
                        <div class="pt-1 mb-4">
                       <button  value="Register"  name="login" class="btn fw-bold btn-primary btn-lg btn-block " >Login</button>

                 
                     
                     
                     
                     
                      </div>
      
                        <a class="small text-muted" onclick="show_pass()">Forgot password?</a>
                        <p id="show-reg" onclick="show_reg()" class="mb-5 pb-lg-2 fw-bold" style="color: #393f81;">Don't have an account? <a 
                            style="color: #393f81;">Register here</a></p>
                       
                            <!-- <p onclick="changeStyle()">Click Me</p>
                            <p id="myPara">Hide Paragraph in JavaScript</p> -->
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


  </div>




  <!-- registration form start -->
  <section  id="register" style="display: none;" class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0" style="color: #e67e22;">Cleanit</span>
                  </div>

                  <h5 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Create an account</h5>

                
              <form method="POST"  enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg"    name="name" placeholder="Enter  Name Here" class="form-control form-control-lg" />
                  <span  class="lead error text-danger">*<?php echo $nameErr ?></span>
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg"   name="email"   placeholder="Enter Email Here" class="form-control form-control-lg" />
                    <span  class="lead error text-danger">*<?php echo $emailErr ?></span>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg"  name="contact" placeholder="Enter Contact Here" class="form-control form-control-lg" />
                    <span  class="lead error text-danger">*<?php echo $contactErr ?></span>
                  </div>


                <div class="form-outline mb-4">
         
                    <textarea placeholder="Enter Address Here"   name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                   <span  class="lead error text-danger">*<?php echo $AddressErr ?></span>
                  </div>

<!-- 
                  <div class="form-outline mb-4">
         
                  <input type="text" id="form3Example1cg"  name="pincode" placeholder="Enter pincode Here" class="form-control form-control-lg" />
                  </div> -->




                  <div class="form-outline mb-4">
                    <input class="form-control"   name="photo" type="file" id="formFileMultiple" />
                 <label for="formFileMultiple" class="form-label">Upload Photo Here</label>
                 <br><span  class="lead error text-danger">*<?php echo $photoErr ?></span>
                </div>

              

           
               <div class="form-outline fs-2 mb-4">
                <input type="password" id="myInput"  name="password" placeholder="Enter Password Here" class="form-control form-control-lg" />
              <span  class="lead error text-danger">*<?php echo $passwordErr ?></span>
           
              </div>

             <input type="checkbox" onclick="myFunction()" /> <span class="fw-bold">show Password</span>
             




                <div class="d-flex justify-content-center">
                  <button value="Register" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                
                </div>

                <p onclick="show_login()" class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- forgot password -->
<section id="pass-recovery"  style="display: none;">
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="mb-4">
              <h5>Forgot Password?</h5>
              <p class="mb-2 text-danger">Enter your registered email ID to reset the password
              </p>
            </div>
            <form>
              <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email"
                  required="">
              </div>

              <div class="mb-3">
               
                <input type="password" id="myInput1" class="form-control" name="email" placeholder="Create New Password"
                  required="">
              </div>

              <input type="checkbox" onclick="myFunction1()" /> <span class="fw-bold">show Password</span>
            


       
              <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">
                  Reset Password
                </button>
              </div>
              <span> <p onclick="hidepass_showlogin()" class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                class="fw-bold text-body"><u>Login here</u></a></p></span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>



<script>
//   function changeStyle(){
//         var element = document.getElementById("myPara");
//         element.style.display = "none";
//     }
 function show_reg()
 {

    var element = document.getElementById("register");
       element.style.display = "block";

    var element1 = document.getElementById("login");
       element1.style.display = "none";

 }

 function show_pass()
 {

    var element = document.getElementById("login");
       element.style.display = "none";

    var element1 = document.getElementById("pass-recovery");
       element1.style.display = "block";

 }

 function hidepass_showlogin()
 {

    var element = document.getElementById("pass-recovery");
       element.style.display = "none";

    var element1 = document.getElementById("login");
       element1.style.display = "block";

 }




 function show_login()
 {

    var element = document.getElementById("register");
       element.style.display = "none";

    var element1 = document.getElementById("login");
       element1.style.display = "block";

 }
 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
</body>
</html> 
 
