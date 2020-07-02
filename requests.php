<?php
//Define Page Title
$page_title =  "Dashboard - LetsMeet";

include('includes/header.php');
$get_all_req_sender = $frnd_obj->request_notification($_SESSION['user_id'], true);

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


<div class="container">
    <div class="p"></div>
    <div class="box-bg">
        <h4 class="text-center font-bold pb">
            Friend Requests
        </h4>
        
        <div class="row">
        

        <?php
            
            if($get_req_num > 0) {
                
                foreach ($get_all_req_sender as $row) {
            
         ?>

            <div class="col-md-3">
                <div class="friend-box mt-4">
                    <div class="push-center">
                    <?php echo '<img src="storage/profiles/'.$row->user_image.'" alt="Profile image">' ; ?>
                    </div>
                    
                    <div class="text-center font-bold">
                    <?php echo $row->username ?>
                </div>
                
                <div class="pb"></div>

                <div class="break-line mt-2"></div>

                <div class="text-center">
                    FUll name Here Later
                </div>
                
                <div class="pt-2 d-flex justify-content-center">
                    <?php 
                        echo  '<div><a href="./user_profile.php?id='  . $row->sender . '"' . 'class="btn btn-secondary  btn-sm">See Profile</a></div>';

                    ?>
                </div>
            </div>
        </div>

         <?php
                }

             }
             
             
             else {
                 echo '<div class="d-flex justify-content-center" style="width:100%;"><div class="alert alert-danger">You have no friend request!</div>';
             }
             
             echo "</div>";
          ?>
      </div>
</div>