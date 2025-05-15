<?php
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $starttime = isset($_POST['starttime']) ? $_POST['starttime'] : '';
    $endtime = isset($_POST['endtime']) ? $_POST['endtime'] : '';
    $job = isset($_POST['job']) ? $_POST['job'] : '';
    $num_kids = isset($_POST['num_kids']) ? $_POST['num_kids'] : '';
    $kid_age = isset($_POST['kid_age']) ? implode(", ", $_POST['kid_age']) : ''; // Handling the array of kid ages
    $has_pets = isset($_POST['has_pets']) ? $_POST['has_pets'] : '';
    $num_pets = isset($_POST['num_pets']) ? $_POST['num_pets'] : '';
    $pet_type = isset($_POST['pet_type']) ? $_POST['pet_type'] : '';
    $pet_breed = isset($_POST['pet_breed']) ? $_POST['pet_breed'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'CareCircle';
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert query
    $sql = "INSERT INTO posts (name, phone, date, starttime, endtime, job, num_kids, kid_age, has_pets, num_pets, pet_type, pet_breed, description) 
            VALUES ('$name','$phone','$date', '$starttime', '$endtime', '$job', '$num_kids', '$kid_age', '$has_pets', '$num_pets', '$pet_type', '$pet_breed', '$description')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Your post has been created!";
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
      background-color: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
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
