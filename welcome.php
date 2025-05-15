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
        background-color: #f8f1e5; /* Beige background */
        color: #5b3d32; /* Dark brown text */
        text-align: center;
        padding: 0;
      }

      h1 {
        color: #5b3d32;
        margin-bottom: 40px;
        font-size: 36px;
        letter-spacing: 2px;
      }

      /* Flex container to center content */
      .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
      }

      /* Button Container */
      .button-container {
        display: flex;
        justify-content: center;
        gap: 20px; /* Space between buttons */
      }

      .form-group {
        margin: 10px;
      }

      /* Button Styles */
      input[type="submit"] {
        background-color: #5b3d32; /* Dark brown */
        color: white;
        padding: 14px 28px;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      input[type="submit"]:hover {
        background-color: #4a2a1f; /* Slightly darker brown */
        transform: scale(1.05); /* Slightly enlarge button on hover */
      }

      /* Mobile Responsiveness */
      @media (max-width: 600px) {
        h1 {
          font-size: 28px;
        }

        .button-container {
          flex-direction: column;
        }

        input[type="submit"] {
          padding: 12px 24px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Main content area -->
      <div class="content">
        <h1>Welcome to Care Circle hi<?php echo $_SESSION['email'];?></h1>
        
      </div>
      <div class="button-container">
        <div class="form-group">
          <a href="createprofile.php">
            <input type="submit" value="Sign Up">
          </a>
        </div>
        <div class="form-group">
          <a href="login.php">
            <input type="submit" value="Log In">
          </a>
        </div>
      </div>
    </div>
  </body>
</html>
