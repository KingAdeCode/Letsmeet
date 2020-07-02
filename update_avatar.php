<?php

//Define Page Title
$page_title =  "Update Information - LetsMeet";

include('includes/header.php');

$loggedUser = $_SESSION['user_id'];

if(isset($_POST["submit"]) && isset($_FILES['avatar']['name'])){
	$result = $user_obj->changeAvatar($_FILES['avatar']['name'], $loggedUser);
	}
?>


<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">

    <h3 class=""> Change your face <b><?php echo  $user_data->username;?></b></h1>
    <div class="alert alert-danger">Upload your desire profile display image</div>
    
  </div>
</div>

<div class="container">
    <div class="box-bg">

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
            
            <form method="post" action="" enctype="multipart/form-data">
                <div class="text-center">
                    Select Image File to Upload
                </div>
                
                <div style="max-width:500px; margin:auto;">
                    <input class="form-control" type="file" name="avatar">
                </div>
            
                <div class="d-flex justify-content-center pt-4">
                    <button type="submit" name="submit" class="btn btn-success">Change Image</button>
                </div>
            </form>
        

            <div class="p"></div>
    </div>

</div>


