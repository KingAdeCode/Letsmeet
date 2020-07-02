<?php

//Define Page Title
$page_title =  "Meet Friend - LetsMeet";

include('includes/header.php');

$user_data = $user_obj->find_user_by_id($_GET['id']);


// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['user_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['user_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['user_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
  
    <img src="storage/profiles/<?php echo $user_data->user_image; ?>" width="120px" alt="Profile image">
     <h6 class="mt-4"><b><?php echo  $user_data->username;?></b></h1>
     <h3 class=""><b><?php echo  $user_data->user_fullname;?></b></h1>
    
  </div>
</div>


<div class="container">
    <div class="box-bg">
        <div class="d-flex justify-content-center">
            <?php
                if($is_already_friends){
                    
                    echo '<a href="functions.php?action=unfriend_req&id='.$user_data->id.'" class="btn btn-danger">Unfriend</a>';
                }
                elseif($check_req_sender){
                    echo '<a href="functions.php?action=cancel_req&id='.$user_data->id.'" class="btn btn-danger">Cancel Request</a>';
                }
                elseif($check_req_receiver){
                    echo '<a href="functions.php?action=ignore_req&id='.$user_data->id.'" class="btn btn-danger">Ignore</a>&nbsp;
                    <a href="functions.php?action=accept_req&id='.$user_data->id.'" class="btn btn-success">Accept</a>';
                }
                else{
                    echo '<a href="functions.php?action=send_req&id='.$user_data->id.'" class="btn btn-success">Send Request</a>';
                }
            ?>
            
            <a class="btn btn-warning ml-2">Message</a>
        
        </div>
    
    </div>
    
    <div class="box-bg mt-4">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
				
					<tbody>
						<tr>
							<th scope="row">Full Name</th>
							<td><?php echo  $user_data->user_fullname;?></td>
						</tr>
						
						<tr>
							<th scope="row">Phone</th>
							<td><?php echo  $user_data->user_phone;?></td>
						</tr>
						
						<tr>
							<th scope="row">Email</th>
							<td><?php echo  $user_data->user_email;?></td>
						</tr>
						
						<tr>
							<th scope="row">Gender</th>
							<td><?php echo  $user_data->user_gender;?></td>
						</tr>
						
					</tbody>
				</table>
			</div>
			
			<div class="col-md-6">
				<table class="table">
				
					<tbody>
						<tr>
							<th scope="row">Address</th>
							<td><?php echo  $user_data->user_address;?></td>
						</tr>
						
						<tr>
							<th scope="row">Age</th>
							<td><?php echo  $user_data->user_age;?></td>
						</tr>
					
					</tbody>
				</table>
			</div>
		
		</div>
	
	</div>

</div>
