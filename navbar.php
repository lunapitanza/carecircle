<html>
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

      /* Main content area */
      .content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        background-color: #f5f5f5; /* Light gray background for content */
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
        border-top: 1px solid #d6d6d6; /* Line above the icons */
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
        font-size: 24px; /* Smaller icons */
        margin-bottom: 5px;
      }

      .navbar .active {
        color: #007bff;
      }

      h1 {
        color: #5b3d32;
        margin-bottom: 20px;
      }

      /* Additional Styling for Select Options */
      select {
        padding: 12px;
        background-color: #f8f1e5;
        border: 1px solid #d6d6d6;
      }

    </style>
  </head>
  <body>     
    <div>   
        </div>
          <!-- Bottom Navigation Bar -->
          <div class="navbar">
        <a href="home.php" class="active">
          <div class="icon">🏠</div>
          <div>Home</div>
        </a>
        <a href="viewposts.php">
          <div class="icon">🔍</div>
          <div>Search</div>
        </a>
        <a href="createposts.php">
          <div class="icon">➕</div>
          <div>Create Post</div>
        </a>
        <a href="personalprofile.php">
          <div class="icon">👤</div>
          <div>Profile</div>
        </a>
      </div>
    </div>
  </body>
</html>
