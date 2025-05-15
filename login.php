<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form method="POST" action="">
      <h1>Login</h1>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>
  </body>

<?php
// Connection settings
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'CareCircle';
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the login if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $conn->real_escape_string($_POST['email']);
    $entered_password = $conn->real_escape_string($_POST['password']);  // The entered password

    // Query to fetch user data based on email
    $sql = "SELECT * FROM profiles WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Directly compare the entered password with the stored password (plain text comparison)
        if ($entered_password === $user['password']) {
            // Password matches, redirect to home.php
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            //$_SESSION["username"] = $username;
            header('Location: home.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No profile found with that email.";
    }

    // Close the connection
    $conn->close();
}
?>
</html>
