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


      /* Additional Styling for Select Options */
      select {
        padding: 12px;
        background-color: #f8f1e5;
        border: 1px solid #d6d6d6;
      }

    </style>
    </head>
    <body>
    
    <form method="get" action="profileprocessed.php">
        <h1>Profile Sign Up Form</h1>

        <div class="form-group">
            <label for="Fname">First Name:</label>
            <input type="text" id="Fname" name="Fname" placeholder="Enter your First Name">
        </div>
        <br>
        <div class="form-group">
            <label for="Lname">Last Name:</label>
            <input type="text" id="Lname" name="Lname" placeholder="Enter your Last Name">
        </div>
        <br>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number">
        </div>
        <br>
        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" placeholder="Enter your email">
        </div>
        <br>
        <div class="form-group">
            <br>
            <h2>Job Type</h2>
            <label>Please select the job position(s) you can assist with!</label>
            <br>
            <br>

            <input type="checkbox" id="babysitter" name="jobs[]" value="babysitter">
            <label for="babysitter" class="checkbox-label">Babysitter</label><br>

            <input type="checkbox" id="dog_walker" name="jobs[]" value="dog_walker">
            <label for="dog_walker" class="checkbox-label">Dog Walker</label><br>

            <input type="checkbox" id="house_sitter" name="jobs[]" value="house_sitter">
            <label for="house_sitter" class="checkbox-label">House/Pet Sitter</label><br>

        </div>

        <div class="form-group">
            <br>
            <h2>Personal Info:</h2>
            <label>Note! This information will only be used for posts/availability</label>
            <br>
            <br>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age"><br>
            <br>
            <label for="town">Town:</label>
            <input type="text" id="town" name="town"><br>
            <br>
            <label for="state">State:</label>
            <input type="text" id="state" name="state"><br>
            <br>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
        </div>


        <div class="form-group">
            <input type="submit" value="Submit">
        </div>

    </form>
    
    </body>
</html>