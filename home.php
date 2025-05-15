<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Screen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      /* Global Styles */
      body {
        margin: 0;
        font-family: 'Gill Sans', sans-serif;
        background-color:rgb(250, 241, 225); /* Beige background */
        color: #5b3d32; /* Dark brown text */
        text-align: center;
        padding: 30px;
      }

      h1 {
        color: #5b3d32;
        margin-bottom: 20px;
      }

      /* Main content area */
      .content {
        color:rgb(250, 241, 225);
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Main content area -->
      <div class="content">
        <img src="carecirclelogo.png" alt="Logo">
        <h1 style="font-size: 50px">Welcome to Care Circle!</h1>
      </div>
    </div>
    <?php include 'navbar.php';?>
  </body>
</html>
