<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
?>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'CareCircle';

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set up filtering variables
$dateFilter = isset($_GET['date']) ? $_GET['date'] : '';
$jobFilter = isset($_GET['job']) ? $_GET['job'] : '';

// Modify the SQL query to filter by date and job type
$sql = "SELECT * FROM posts WHERE 1";

if ($dateFilter) {
    $sql .= " AND date = '$dateFilter'";
}

if ($jobFilter) {
    $sql .= " AND job = '$jobFilter'";
}

$result = $conn->query($sql);
if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}

// Fetch distinct job types and dates for the dropdowns
$jobQuery = "SELECT DISTINCT job FROM posts";
$jobResult = $conn->query($jobQuery);

$dateQuery = "SELECT DISTINCT date FROM posts";
$dateResult = $conn->query($dateQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Care Circle - View Posts</title>
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
    /* Container for posts */
    .posts-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px 0;
    }
    /* Post Card Style */
    .post-card {
      background: #8b5c43;
      color: white;
      padding: 15px;
      border-radius: 8px;
      text-align: left;
      width: 280px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .post-card h2 {
      margin: 0 0 10px;
      font-size: 20px;
    }
    .post-card p {
      margin: 5px 0;
      font-size: 14px;
    }
    .message-btn, .contact-btn {
      background: #5b3d32;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
      font-size: 14px;
    }
    .message-btn:hover, .contact-btn:hover {
      background: #70452b;
    }
    /* Filters Container */
    .filters {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }
    select {
      padding: 10px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    /* Bottom Navigation Bar */
    .navbar {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: #fff;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      border-top: 1px solid #d6d6d6;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .navbar a {
      text-align: center;
      font-size: 16px;
      color: #333;
      text-decoration: none;
    }
    .navbar a:hover {
      color: #007bff;
    }
    .icon {
      font-size: 24px;
      margin-bottom: 5px;
    }
    .navbar .active {
      color: #007bff;
    }
  </style>
</head>
<body>
  <h1>Available Job Posts</h1>
  
  <!-- Filters Section -->
  <div class="filters">
    <form method="GET" action="">
      <select name="date">
        <option value="">Select Date</option>
        <?php while ($row = $dateResult->fetch_assoc()): ?>
          <option value="<?php echo $row['date']; ?>" <?php echo $dateFilter == $row['date'] ? 'selected' : ''; ?>><?php echo $row['date']; ?></option>
        <?php endwhile; ?>
      </select>

      <select name="job">
        <option value="">Select Job Type</option>
        <?php while ($row = $jobResult->fetch_assoc()): ?>
          <option value="<?php echo $row['job']; ?>" <?php echo $jobFilter == $row['job'] ? 'selected' : ''; ?>><?php echo $row['job']; ?></option>
        <?php endwhile; ?>
      </select>

      <button type="submit">Filter</button>
    </form>
  </div>

  <!-- Posts Container -->
  <div class="posts-container">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="post-card">
          <h2>
            <?php echo isset($row['name']) ? htmlspecialchars($row['name']) : 'Unknown'; ?>
          </h2>
          <p><strong>Time:</strong> 
  <?php 
    // Convert start time to 12-hour format
    $starttime = isset($row['starttime']) ? $row['starttime'] : 'N/A';
    $endtime = isset($row['endtime']) ? $row['endtime'] : 'N/A';
    
    if ($starttime != 'N/A') {
        $starttime = date("g:i a", strtotime($starttime)); 
    }

    if ($endtime != 'N/A') {
        $endtime = date("g:i a", strtotime($endtime)); 
    }
    
    echo $starttime . " - " . $endtime;
  ?>
</p>

          <p><strong>Job:</strong> <?php echo isset($row['job']) ? htmlspecialchars($row['job']) : 'Not provided'; ?></p>
          <p><strong>Date:</strong> <?php echo isset($row['date']) ? htmlspecialchars($row['date']) : 'Not provided'; ?></p>
          <p><strong>Kids:</strong> <?php echo isset($row['num_kids']) ? htmlspecialchars($row['num_kids']) : 'None'; ?></p>
          <p><strong>Pets:</strong> <?php echo isset($row['num_pets']) ? htmlspecialchars($row['num_pets']) : 'None'; ?> (<?php echo isset($row['pet_type']) ? htmlspecialchars($row['pet_type']) : 'Unknown'; ?>)</p>
          <p><strong>Additional Details:</strong> <?php echo isset($row['description']) ? htmlspecialchars($row['description']) : 'None'; ?></p>
          
          <!-- Remove direct phone number display -->
          <button class="contact-btn" onclick="contactUser('<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>')">Contact</button>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <!-- No posts are displayed if the result set is empty -->
    <?php endif; ?>
  </div>

  <script>
    function contactUser(phoneNumber) {
      if (phoneNumber === "") {
        alert("No phone number available.");
      } else {
        // Display phone number and options to call or text
        const message = "You can contact this person at:" + "\n\nPhone Number: " + phoneNumber;
        if (confirm(message + "\n\nClick OK to send a text.")) {
          // Open the phone dialer to call
          window.location.href = "sms:" + phoneNumber;
        } else {
          ""
        }
      }
    }
  </script>

<?php include 'navbar.php';?>
</body>
</html>
