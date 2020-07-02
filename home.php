<?php
//Define Page Title
$page_title =  "Dashboard - LetsMeet";

include('includes/header.php');

$checkUser = $user_obj->find_user_by_id($_SESSION['user_id']);

	if(
		empty($checkUser->user_fullname) || 
		empty($checkUser->user_phone) || 
		empty($checkUser->user_address) ||
		empty($checkUser->user_gender) ||
		empty($checkUser->user_age)
	){
		
		header("Location: ./update_info.php");
		
	}

?>

<div class="home-banner">
  <div class="home-banner-overlay">
      <div class="home-banner-content ">
        <div>
            <h3></h3>
        </div>
      
      </div>
      
  </div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-5 ">Welcome, <b><?php echo  $user_data->username;?></b></h1>
    <p class="lead">Meet new friends, chat and have fun on this platform</p>
  </div>
</div>


<div class="container">
    <div class="p"></div>
    <div class="box-bg">
        <h4 class="text-center font-bold pb">
            People on Letsmeet
        </h4>
        <div class="break-line mt-2"></div>
        
        <div class="row">
        

        <?php
            
            if($all_users) {
                
                foreach ($all_users as $row) {
            
         ?>

            <div class="col-md-3">
                <div class="friend-box mt-4">
                    <div class="push-center">
                    <?php echo '<img src="storage/profiles/'.$row->user_image.'" width="100px" alt="Profile image">' ; ?>
                    </div>
                    
                    <div class="text-center font-bold">
                    <?php echo $row->username ?>
                </div>
                
                <div class="pb"></div>

                <div class="break-line mt-2"></div>

                <div class="text-center">
                     <?php echo $row->user_fullname ?>
                </div>
                
                <div class="pt-2 d-flex justify-content-center">
                    <?php 
                    
                        echo  '<div><a href="./user_profile.php?id='  . $row->id . '"' . 'class="btn btn-success btn-sm">See Profile</a></div>';

                    ?>
                </div>
            </div>
        </div>

         <?php
                }

             }
             
             else {
                echo '<div class="d-flex justify-content-center" style="width:100%;"><div class="alert alert-danger">There is no user!</div>';
                
             }

             echo "</div>";
        
          ?>


      </div>
</div>


<div class="p-4">

</div>