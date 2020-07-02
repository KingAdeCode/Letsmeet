<?php
//Define Page Title
$page_title =  "Profile - LetsMeet";

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

<div class="container">
    <div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
		
			<img src="storage/profiles/<?php echo $user_data->user_image; ?>" width="130px" class="img-circle" alt="Profile image">
			
			<div class="p-1"><a href="./update_avatar.php" class="btn btn-light">Change Display Picture</a></div>
			<h6 class="mt-4"><b><?php echo  $user_data->username;?></b></h1>
			<h3 class=""><b><?php echo  $user_data->user_fullname;?></b></h1>
			
		</div>
    </div>


    <ul class="nav justify-content-center box-bg">
    <li class="nav-item">
        <a class="nav-link active" href="./friends.php">Friends <span class="badge badge-dark"> <?php echo $get_frnd_num ?></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./requests.php">Request <span class="badge badge-danger"><?php if($get_req_num > 0){echo $get_req_num;}?></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./update_info.php">Edit Profile</a>
    </li>

    </ul>
    
    
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

