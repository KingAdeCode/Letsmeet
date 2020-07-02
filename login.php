<?php
require 'includes/init.php';
// IF USER MAKING LOGIN REQUEST
if(isset($_POST['email']) && isset($_POST['password'])){
  $result = $user_obj->loginUser($_POST['email'],$_POST['password']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: home.php');
  exit;
}
?>

<?php
//Define Page Title
$page_title =  "User Login -  LetsMeet";

include('includes/headerGuest.php');

?>

<style type="text/css">
    body {
        background: #d8e9ff;
    }
</style>

<div class="slogan">
    Meet New Friends` on this platform...
</div>

<div class="login-box">
    <div class="heading1 text-center">Login to LetsMeet</div>

        <div>
            <?php
				if(isset($result['errorMessage'])){
				echo "<div class='alert alert-danger text-center'>".$result['errorMessage']."</div>";
				}
				if(isset($result['successMessage'])){
				echo "<div class='alert alert-success text-center'>".$result['successMessage']."</div>";
				}
			?>   
        </div>


        <form method="post" action="">
            <input type="text" class="form-control form-padding" name="email" placeholder="Email Address" required />
            <input type="password" class="form-control form-padding" name="password" placeholder="Password" required />
            <button type="submit" name="submit" class="btn btn-success full-btn">Login</button>
        </form>
        
        <a href="signup.php"  class="mt-3 btn btn-light form-control">Sign Up</a>

        <div class="p"></div>
</div>
