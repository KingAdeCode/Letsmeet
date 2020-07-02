<?php

//Define Page Title
$page_title =  "Friends - LetsMeet";

include('includes/header.php');

// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTLA FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
// GET MY($_SESSION['user_id']) ALL FRIENDS
$get_all_friends = $frnd_obj->get_all_friends($_SESSION['user_id'], true);
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
            New Friend Requests
        </h4>
        <div class="break-line mt-2"></div>
        
        <div class="row">
        

        <?php
            
            if($get_req_num > 0) {
                
                foreach ($get_all_req_sender as $request) {
            
         ?>

            <div class="col-md-3">
                <div class="friend-box mt-4">
                    <div class="push-center">
                    <?php echo '<img src="storage/profiles/'.$request->user_image.'" width="100px" alt="Profile image">' ; ?>
                    </div>
                    
                    <div class="text-center font-bold">
                    <?php echo $request->username ?>
                    </div>
                    <div class="text-center">
                        <small>wants to be your friend</small>
                    </div>
                
                    <div class="pb"></div>

                
                
                    <div class="pt-2 d-flex justify-content-center">
                        <?php 
                            
                            echo  '<div><a href="./user_profile.php?id='  . $request->sender . '"' . 'class="btn btn-secondary  btn-sm">View Profile</a></div>';

                        ?>
                    </div>
                </div>
            </div>

         <?php
                }

                echo "</div>";
             }
             
             else {
                 echo '<div class="d-flex justify-content-center" style="width:100%;"><div class="alert alert-danger">You have no friend request!</div>';
             }
             
             

        
          ?>


      </div>
</div>


<div class="container mt-4">
    <div class="p"></div>
    <div class="box-bg">
        <h4 class="text-center font-bold pb">
            My Friends
        </h4>
        
        <div class="break-line mt-2"></div>
        
        <div class="row">
        

        <?php
            
            if($get_frnd_num > 0) {
                
                foreach ($get_all_friends as $row) {
            
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
                        
                        echo  '<div><a href="./user_profile.php?id='  . $row->id . '"' . 'class="btn btn-secondary  btn-sm">View Profile</a></div>';

                    ?>
                </div>
            </div>
        </div>

         <?php
                }
                echo "</div>";

             }
             
             else {
                 echo '<div class="d-flex justify-content-center" style="width:100%;"><div class="alert alert-danger">You have no friends!</div>';
                 
             }
            
        
          ?>


      </div>
</div>

