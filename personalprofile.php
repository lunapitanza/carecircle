<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Circle - Personal Profile</title>
    <style>
      body {
          margin: 0;
          font-family: 'Gill Sans', sans-serif;
          background-color: #f8f1e5;
          color: #5b3d32;
          padding: 20px;
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
      }

      .profile-container {
          background-color: #fff;
          border-radius: 10px;
          padding: 40px;
          max-width: 600px;
          width: 100%;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
          text-align: left;
      }

      .profile-header {
          text-align: center;
          margin-bottom: 30px;
      }

      .profile-header h1 {
          margin: 0;
          font-size: 2em;
          color: #5b3d32;
      }

      .profile-info {
          text-align: center;
          display: grid;
          grid-template-columns: 1fr 2fr;
          row-gap: 15px;
          column-gap: 10px;
      }

      .profile-info div {
          font-size: 16px;
      }

      .label {
          font-weight: bold;
      }

      button {
          background-color: #5b3d32;
          color: white;
          padding: 12px 25px;
          border: none;
          border-radius: 6px;
          font-size: 16px;
          cursor: pointer;
          margin-top: 30px;
          display: block;
          width: 100%;
      }

      button:hover {
          background-color: #8b5c43;
      }

    </style>
</head>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'CareCircle';
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Not provided';

$sql = "SELECT * FROM profiles WHERE email='$email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No profile found.";
    exit;
}
?>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1><?php echo $row['Fname'] . " " . $row['Lname']; ?></h1>
        </div>
        <div class="profile-info">
            <div class="label">Phone Number:</div>
            <div><?php echo $row['phone_number']; ?></div>

            <div class="label">Email:</div>
            <div><?php echo $_SESSION['email']; ?></div>

            <div class="label">Jobs:</div>
            <div><?php echo $row['jobs']; ?></div>

            <div class="label">Age:</div>
            <div><?php echo $row['age']; ?></div>

            <div class="label">Town:</div>
            <div><?php echo $row['town']; ?></div>

            <div class="label">State:</div>
            <div><?php echo $row['state']; ?></div>
        </div>
    </div>
    <?php include 'navbar.php'; ?>
</body>