<?php

require 'includes/isLogged.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>
    <?php
        if(isset($page_title)) {
            echo $page_title;
        }
        else {
            echo "LetsMeet";
        }
    ?>
    </title>
</head>
<body>

<header>

  <a href=".">
    <div class="logo">
        LetsMeet
    </div>
  </a>

  <div class="top-menu">
        <ul>
            <li><a href='./home.php'>Home</a></li>
            <li><a href='./profile.php'>My Profile</a></li>
            <li><a href='./friends.php'>Friends &nbsp;<span class="badge badge-danger"><?php if($get_req_num > 0){echo $get_req_num;}?></span></a></li>
            <li><a href='./logout.php'>Chats</a></li>
            <li><a href='./logout.php'>Logout</a></li>
      </ul>
  </div>


</header>


