<?php
if(!isset($_SESSION))
  {
      session_start();
  }

if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" ){
  echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}
else{

  include("compare_controller.php");

  if(!empty($_GET['id'])){
     $user = $_GET['id'];

     $show_photo = true;
     $show_soft = true;
     $show_hard = true;

     ?>

    <div class="row">
       <div class="col-sm-3">
         <div class="profile-modal" name="photo-div"><?php echo showPhoto($user, $show_photo); ?></div>
       </div>
       <div class="col-sm-9">
         <div class="profile-modal" name="name-div"><?php echo showUserInfo($user); ?></div>
       </div>
     </div>

     <hr>
     <div class = "row">
		     <?php echo showExtendedSoft($user);?>
     </div>
	   <hr>
	   <div class = "row">
        <?php echo showExtendedHard($user);?>
     </div>

  <?php
  } else{
    echo 'Error: Content not found';
  }
}
?>
