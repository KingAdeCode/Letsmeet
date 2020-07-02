<?php

//Define Page Title
$page_title =  "Update Information - LetsMeet";

include('includes/header.php');

$loggedUser = $_SESSION['user_id'];

if(isset($_POST['fullname']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['gender']) && isset($_POST['age'])){
	$result = $user_obj->updateUserInfo($_POST['fullname'],$_POST['phone'],$_POST['address'], $_POST['gender'], $_POST['age'], $loggedUser);
	}
?>


<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
  
    
    <h3 class=""> Hey <b><?php echo  $user_data->username;?></b></h1>
    <div class="alert alert-danger">Please update your information to have full access to all pages</div>
    
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

            <form method="post" action="">
            
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control form-padding" value="<?php echo $user_data->user_fullname; ?>" name="fullname" placeholder="Full Name"  required />
                            <input type="text" class="form-control form-padding" value="<?php echo $user_data->user_phone; ?>" name="phone" placeholder="Phone Number" required />
                            <input type="text" class="form-control form-padding" value="<?php echo $user_data->user_address;?>" name="address" placeholder="Home Address" required />
                        </div>
                        
                        <div class="col-md-6">
                            <input type="text" class="form-control form-padding" value="<?php echo $user_data->user_gender; ?>" name="gender" placeholder="Gender" required />
                            <input type="text" class="form-control form-padding" value="<?php echo $user_data->user_age;  ?>" name="age" placeholder="Age" required />           
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center pt-4">
                    <button type="submit" name="submit" class="btn btn-success">Update Profile</button>
                </div>
                
                
                
            </form>
        

            <div class="p"></div>
    </div>

</div>


