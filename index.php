<?php
//Define Page Title
$page_title =  "Homepage - LetsMeet";

include('includes/headerGuest.php');


?>

<?php
	require 'includes/init.php';
	// IF USER MAKING SIGNUP REQUEST
	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
	$result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password']);
	}
	// IF USER ALREADY LOGGED IN
	if(!isset($_SESSION['email'])){
	
	}else {
		header('Location: home.php');
	}

?>

<style type="text/css">
    body {
        background: #d8e9ff;
    }
</style>

<div class="slogan">
    Meet New Friends` on this platform...
</div>

<div class="p">

</div>

<div class="container p">
    <div class="row">
        <div class="col-md-7">
        <img src="assets/images/chat.svg" alt="chat" width="400px" />

        </div>

        <Div class="col-md-5">
            <div class="box-bg">

            <div class="heading1 text-center">Sign Up on LetsMeet</div>
			
			<?php
				if(isset($result['errorMessage'])){
				echo "<div class='alert alert-danger text-center'>".$result['errorMessage']."</div>";
				}
				if(isset($result['successMessage'])){
				echo "<div class='alert alert-success text-center'>".$result['successMessage']."</div>";
				}
			?>   

                <form method="post" action="">
                    <input type="email" class="form-control form-padding" name="email" placeholder="Email Address" required />
                    <input type="text" class="form-control form-padding" name="username" placeholder="Username" required />
                    <input type="password" class="form-control form-padding" name="password" placeholder="Password" required />
                    <button type="submit" name="submit" class="btn btn-success full-btn">Signup Now</button>
                </form>

            <div class="p"></div>

            <Div class="text-center">
                Already have an account ? <a href="./login.php">Login Now</a>

            </Div>

        </Div>


    </div>
</div>


<?php
include('includes/footer.php');
?>
