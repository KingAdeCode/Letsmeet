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
        <li><a href='.'>Signup</a></li>
        <li><a href='./login.php'>Login</a></li>
      </ul>
  </div>


</header>


