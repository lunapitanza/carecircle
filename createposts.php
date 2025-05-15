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
      select,
      textarea {
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

      .time-container {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .time-container input {
        margin: 0 10px;
        width: 40%;
      }

      .time-separator {
        font-size: 20px;
        margin: 0 10px;
        color: #5b3d32;
      }

      .hidden {
        display: none;
      }

      h2 {
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
    <form method="post" action="postprocessed.php">
      <h1>Post Creation</h1>

      <!-- Full Name Section -->
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
      </div>

      <!-- Phone Number Section -->
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>

      <div class="form-group">
        <label for="date">Date needed:</label>
        <input type="date" id="date" name="date" placeholder="Enter the intended date">
      </div>

      <div class="form-group">
        <label for="time">Times needed:</label>
        <div class="time-container">
            <!-- Start Time -->
            <input type="time" id="starttime" name="starttime" placeholder="Start Time">
            <!-- Dash Separator -->
            <span class="time-separator">–</span>
            <!-- End Time -->
            <input type="time" id="endtime" name="endtime" placeholder="End Time">
        </div>
      </div>

      <div class="form-group">
        <label for="job">Choose Job:</label>
        <select id="job" name="job" onchange="showAdditionalFields()">
          <option value="other">Select</option>
          <option value="babysitting">Babysitting</option>
          <option value="petsitting">Pet Sitting</option>
        </select>
      </div>

      <!-- Babysitting Specific Fields -->
      <div id="babysitting-fields" class="hidden">
        <h2>Babysitting Details:</h2>
        <label for="num_kids">How many kids?</label>
        <input type="number" id="num_kids" name="num_kids" min="1" onchange="addKidAgeFields()">
        
        <div id="kid_age"></div> <!-- Dynamic Kid Age Fields -->

        <label for="has_pets">Are there any pets?</label>
        <select id="has_pets" name="has_pets" onchange="showPetFields()">
          <option value="no">No</option>
          <option value="yes">Yes</option>
        </select>

        <div id="pets-fields" class="hidden">
          <label for="num_pets">How many pets?</label>
          <input type="number" id="num_pets" name="num_pets" min="1">
          
          <label for="pet_type">What type of pets?</label>
          <input type="text" id="pet_type" name="pet_type">
          
          <label for="pet_breed">Pet Breed (optional):</label>
          <input type="text" id="pet_breed" name="pet_breed">
        </div>
      </div>

      <!-- Pet Sitting Specific Fields -->
      <div id="petsitting-fields" class="hidden">
        <h2>Pet Sitting Details:</h2>
        <label for="pet_type">What type of pet?</label>
        <input type="text" id="pet_type" name="pet_type">

        <label for="num_pets">How many pets?</label>
        <input type="number" id="num_pets" name="num_pets" min="1">
        
        <label for="pet_breed">Pet Breed (optional):</label>
        <input type="text" id="pet_breed" name="pet_breed">
      </div>

      <!-- Additional Details Section -->
      <div class="form-group">
        <label for="description">Additional Details:</label>
        <input type="text" id="description" name="description" placeholder="Enter any other details you would like to include..."></input>
      </div>

      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>

    <script>
      function showAdditionalFields() {
        const job = document.getElementById("job").value;
        const babysittingFields = document.getElementById("babysitting-fields");
        const petsittingFields = document.getElementById("petsitting-fields");

        babysittingFields.classList.add("hidden");
        petsittingFields.classList.add("hidden");

        if (job === "babysitting") {
          babysittingFields.classList.remove("hidden");
        } else if (job === "petsitting") {
          petsittingFields.classList.remove("hidden");
        }
      }

      function addKidAgeFields() {
        const numKids = document.getElementById("num_kids").value;
        const kidsAgesDiv = document.getElementById("kid_age");

        kidsAgesDiv.innerHTML = ""; // Clear previous inputs

        for (let i = 1; i <= numKids; i++) {
          const label = document.createElement("label");
          label.textContent = `Age of Kid ${i}:`;

          const input = document.createElement("input");
          input.type = "number";
          input.name = `kid_age[]`; // Store values as an array
          input.min = "0";

          kidsAgesDiv.appendChild(label);
          kidsAgesDiv.appendChild(input);
          kidsAgesDiv.appendChild(document.createElement("br"));
        }
      }

      function showPetFields() {
        const hasPets = document.getElementById("has_pets").value;
        const petsFields = document.getElementById("pets-fields");

        if (hasPets === "yes") {
          petsFields.classList.remove("hidden");
        } else {
          petsFields.classList.add("hidden");
        }
      }
    </script>
    <?php include 'navbar.php';?>
  </body>
</html>
