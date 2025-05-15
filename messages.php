<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messaging System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="chat-container">
    <div id="messages" class="message-container">
      <!-- Messages will be displayed here -->
    </div>
    <textarea id="message-input" placeholder="Type a message..."></textarea>
    <button id="send-message">Send</button>
  </div>
  <?php include 'navbar.php';?>


</body>
</html>
<?php
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password (empty)
$dbname = "CareCircle"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'message' is set in the POST request
if (isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    // Log the request to help debug
    error_log("POST data: " . print_r($_POST, true)); // Log POST data to the error log for debugging
    die("Error: Message not set.");
}

// Assuming you have the sender and receiver information from the user
$sender_id = 1;  // Replace with the logged-in user's ID
$receiver_id = 2; // Replace with the receiver's ID

// Insert the message into the database
$sql = "INSERT INTO messages (sender_id, receiver_id, message, created_at) 
        VALUES ('$sender_id', '$receiver_id', '$message', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

