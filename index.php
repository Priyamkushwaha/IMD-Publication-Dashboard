<!-- database connection -->
<?php
  $showalert= 1 ;
  $login=false;
if(isset($_POST["singupdata"]))
 {
    include('./mainincludeofindex/dbconnection.php');
    $username=$_POST["rname"];
    $useremail=$_POST["remail"];
    $userpassword=$_POST["rpassword"];
    
    $existssql="SELECT * FROM users WHERE email='$useremail'";
    $result=mysqli_query($conn,$existssql);
    $row=mysqli_num_rows($result);
    if($row>0)
    {
      $showalert=2;  
    } 
    else 
    {
      $sql="INSERT INTO users ( name, email, password) VALUES ( '$username', '$useremail', '$userpassword')";
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        $showalert=3; 
      }
    }
  }
  if(isset($_POST["logindata"]))
  {
    include('./mainincludeofindex/dbconnection.php');
    $useremail=$_POST["lemail"];
    $userpassword=$_POST["lpassword"];

    $sql = "SELECT * FROM users WHERE email='$useremail' AND password='$userpassword'";
    $results= mysqli_query($conn,$sql);
    $num =mysqli_num_rows($results);
    if($num == 1){
      $login=true;
      $data=mysqli_fetch_assoc($results);
      session_start();
      $_SESSION["loggedin"]=true;
      $_SESSION["username"]=$data['name'];
      $_SESSION["useremail"]=$data["email"];
      header("location: admin/imdadmin.php");
    }
    else{
      $showalert=4;
    }
  }

?>
<!-- header -->
<?php
include('./mainincludeofindex/header.php');
?>


<!-- background video start -->

<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playinline autoplay muted Loop>
            <source src="video/imdfinal.mp4"> 
        </video>
        <div class="vid-overlay"></div>
    </div> 
    <div class="vid-content">
        <h1 class="my-content">Welcome to Imd</h1>
        <small class="my-content">India Meteorological Department</small><br>
        <a href="#" class="btn btn-danger mt-3 " data-bs-toggle="modal" data-bs-target="#logmodal">
        <?php 
        if($showalert==1) {
           
           echo "Get started";
         }
         elseif ($showalert == 2) {
           echo "Email exists";
         }
         elseif ($showalert==3){
           echo "Account created successfully.you can login now";
         }
         else{
           echo "Wrong email or password.try again!";
         }
         ?>
        </a>
    </div>
</div>

<!-- background video end -->

<!-- registration start -->
<?php
 include('./mainincludeofindex/singup.php');
?>
<!-- registration end -->

<!-- Login start -->
<?php
 include('./mainincludeofindex/login.php');
?>
<!-- Login end -->


<!-- Bootstrap javascript -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome JS -->
<script src="js/all.min.js"></script>

</body>
</html>