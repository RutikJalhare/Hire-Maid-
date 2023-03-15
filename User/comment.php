<?php
// echo "acepted";
include 'db_connection.php';
session_start();
 $User_id=$_SESSION["user"];
 $w_id=$_GET['wid'];

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
  

  <section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          <div class="card-body">

<?php
$sql="SELECT * FROM  persons where id=".$User_id;
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
if($count>0)
{
  while($rows=mysqli_fetch_assoc($res))
  {

    $name=$rows['name'];
   $photo=$rows['photo'];
?>

<div class="d-flex flex-start align-items-center">
<img src="user_photo/<?php echo $photo ;?>"
                      class="rounded-circle img-fluid" style="width: 100px; height:100px" />
              <div>
                <h6 class="fw-bold text-secondary m-3"><?php echo $name  ?></h6>
              </div>
            </div>

<?php



  }
}
?>


      

          </div>
          <form method="POST">
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
             
              <div class="form-outline w-100">
                <textarea name="comment" class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">

            <button value="Register"  name="post" 
            class="btn btn-primary btn-sm">Post comment</button>
        
              
            </div>
          </div>
</form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>


<?php
if(isset($_POST['post'])) 
{

   $comment= $_POST['comment'];



//    `comments`(`id`, `w_id`, `U_id`, `comments`)
   $sql="INSERT INTO  comments SET
   w_id='$w_id',
   U_id='$User_id',
   comments='$comment'
   ";
   $res=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
   if($res){
      ?>
 <h2 class="lead fw-bold text-success">
<?php echo "Your review Saved Sucessfully.Thank You";?>
</h2>
      <?php
   }
   else{
      echo "Technical Error";
   }












}
else{
      // echo "not";
}

?>














</body>
</html>
