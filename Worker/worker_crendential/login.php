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
<body  style="background-color: #9A616D;>



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
      
                      <form>
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0" style="color: #e67e22;">Cleanit</span>
                        </div>
      
                        <h5 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      
                        <div class="form-outline mb-3">
                          <input type="email" id="form2Example17" placeholder="Enter Email Here" class="form-control form-control-lg" />
                      
                        </div>
      
                        <div class="form-outline mb-3">
                            <input type="email" id="form2Example17" placeholder="Enter Password Here" class="form-control form-control-lg" />
                        
                          </div>
                        <div class="pt-1 mb-4">
                          <a href="Mainpage.html"><button class="btn fw-bold btn-primary btn-lg btn-block " type="button">Login</button></a>
                        </div>
      
                    
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
  <!-- <section  id="register" style="display: none;" class="vh-100 bg-image">
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

                
              <form>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" placeholder="Enter  Name Here" class="form-control form-control-lg" />
          
                </div>

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg" placeholder="Enter Email Here" class="form-control form-control-lg" />
            
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example1cg" placeholder="Enter Contact Here" class="form-control form-control-lg" />
            
                  </div>


                <div class="form-outline mb-4">
         
                    <textarea placeholder="Enter Address Here"   class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                  <div class="form-outline mb-4">
                    <input class="form-control" type="file" id="formFileMultiple" />
                 <label for="formFileMultiple" class="form-label">Upload Photo Here</label>
                </div>

               <div class="form-outline mb-4">
               <input class="form-control" type="file" id="formFileMultiple" />
               <label for="formFileMultiple" class="form-label">Upload  Addhar/Pan Card Here</label>
               </div>

           
               <div class="form-outline fs-2 mb-4">
                <input type="password" id="myInput" placeholder="Enter Password Here" class="form-control form-control-lg" />
    
              </div>

             <input type="checkbox" onclick="myFunction()" /> <span class="fw-bold">show Password</span>
             




                <div class="d-flex justify-content-center">
                  <button type="button"
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
</section>  -->

<!-- 
<!-- forgot password -->
<!-- <section id="pass-recovery"  style="display: none;">
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
  </section> -->



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
 
