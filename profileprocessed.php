<?php  
    $email = $_GET['email'];
    $password = $_GET['password'];
    $Fname = $_GET['Fname'];
    $Lname = $_GET['Lname'];
    $phone_number = $_GET['phone_number'];
    $email = $_GET['email'];
    $jobs_str = $_GET['jobs'];
    $age = $_GET['age'];
    $town = $_GET['town'];
    $state = $_GET['state'];

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'CareCircle';
    $table = 'profiles';
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM profiles";
    $result = $conn->query($sql);

    $sql = "INSERT INTO profiles (Fname, Lname, phone_number, email, jobs, age, town, state, password) 
            VALUES ('$Fname', '$Lname', '$phone_number', '$email', '$jobs_str', '$age', '$town', '$state', '$password');";

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        echo "\n \n Welcome to CareCircle!";
        echo "\n Please click on the profile button below to view your profile!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page</title>
  <style>
    /* Global Styles */
    body {
      margin: 0;
      font-family: 'Gill Sans', sans-serif;
      background-color: #f8f1e5; /* Beige background */
      color: #5b3d32; /* Dark brown text */
      text-align: center;
      padding: 30px;
    }

    h1 {
      color: #5b3d32;
      margin-bottom: 20px;
    }

    /* Form container */
    form {
      background-color: #fff; /* White background */
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto; /* Center the form */
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      display: block;
      text-align: left;
    }

    /* Input fields */
    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="time"],
    select {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #d6d6d6;
      border-radius: 6px;
      font-size: 16px;
    }

    /* Button Styles */
    input[type="submit"] {
      background-color: #5b3d32; /* Dark brown */
      color: white;
      padding: 12px 25px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #8b5c43; /* Lighter brown on hover */
    }

  </style>
</head>

<body>
  <?php include 'navbar.php';?>
</body>
</html>
