<?php
session_start(); // Start the session

if (isset($_SESSION['error_message'])) {
    echo "<p>" . $_SESSION['error_message'] . "</p>"; // Display the error message
    unset($_SESSION['error_message']); // Clear the error message from session
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <title>Document</title>
</head>
<body>
  <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 m-5">
         <form class="row shadow-lg p-3" action="register.php" method="POST">
            <div class="m-2">
              <h1>Form</h1>
           

            <!-- Password -->
            <div class="col-md-12 m-2">
              <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" name="password" placeholder="Password" id="password" required />
              <div class="valid-feedback">Password validated</div>
              <div class="invalid-feedback">Please enter a valid Password</div>
            </div>
           <!-- Last Name -->
<div class="col-md-12 m-2">
  <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
  <input type="text" class="form-control" name="lastname" placeholder="Last Name" id="lastname" pattern="^[a-zA-Z\s]*$" required />
  <div class="valid-feedback">Last Name validated</div>
  <div class="invalid-feedback">Please enter a valid Last Name</div>
</div>
<!-- First Name -->
<div class="col-md-12 m-2">
  <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
  <input type="text" class="form-control" name="firstname" placeholder="First Name" id="firstname" pattern="^[a-zA-Z\s]*$" required />
  <div class="valid-feedback">First Name validated</div>
  <div class="invalid-feedback">Please enter a valid First Name</div>
</div>
<!-- Middle Name -->
<div class="col-md-12 m-2">
  <label for="middlename" class="form-label">Middle Name</label>
  <input type="text" class="form-control" name="middlename" placeholder="Middle Name" id="middlename" pattern="^[a-zA-Z\s]*$" />
</div>
            <!-- Email -->
            <div class="col-md-12 m-2">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="email" placeholder="Email" id="email" required />
              <div class="valid-feedback">Email validated</div>
              <div class="invalid-feedback">Please enter a valid Email</div>
              <div class="invalid-feedback" id="email-exists">Email already exists</div>
            </div>

            <div class="col-md-12 m-2">
  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
  <input type="text" class="form-control" name="username" placeholder="Username" id="username" pattern="^[a-zA-Z0-9]{8,30}$" required />
  <div class="valid-feedback">Username validated</div>
  <div class="invalid-feedback">Please enter a valid Username (only letters and numbers, between 8 and 30 characters)</div>
</div>

            <!-- checkbox -->
            <div class="col-md-12 m-2">
              <div class="form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="checkbox"
                  required
                />
                <label for="checkbox" class="form-check-label"
                  >Agree to the terms and conditions</label
                >
                <div class="valid-feedback">
                  Thanks for accepting the terms and conditions
                </div>
                <div class="invalid-feedback">
                  Please agree to the terms and conditions
                </div>
              </div>
            </div>

            <!-- submit button -->
            <div class="col-md-12 m-2">
              <button id="submitBtn" class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>



