<?php 
require 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $middle_name = $_POST["middle_name"];
    $last_name = $_POST["last_name"];
    $contact_number = $_POST["contact_number"];
    $birthday = $_POST["birthday"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

   
    $duplicate = mysqli_query($conn, "SELECT * FROM user_info WHERE username='$username' OR email='$email' OR contact_number='$contact_number'");
    if (mysqli_num_rows($duplicate) > 0) {
        $row = mysqli_fetch_assoc($duplicate);
        if ($row['username'] === $username) {
            echo "<script>alert('Username is already in use.');</script>";
        } elseif ($row['email'] === $email) {
            echo "<script>alert('Email is already in use.');</script>";
        } elseif ($row['contact_number'] === $contact_number) {
            echo "<script>alert('Contact number is already in use.');</script>";
        }
    } else {
        $query = "INSERT INTO user_info (first_name, middle_name, last_name, contact_number, birthday, username, email, password, address) 
                  VALUES ('$first_name', '$middle_name', '$last_name', '$contact_number', '$birthday', '$username', '$email', '$password', '$address')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script>alert('Sign-up completed successfully!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error occurred while signing up. Please try again.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="signup_design.css">
</head>
<body>   
    <form class="" action="" method="post" autocomplete="off">
    <div id="signup-form" class="form">
        <div class="sub-form">

            <h2>REGISTER FORM</h2>

            <form id="signupfrom" action="error.php" method="POST" onsubmit="return showCompletionMessage(event)">

                <div class="column">
                    <div class="input-box">
                       <label for="first_name">First Name</label>
                       <input type="text" id="first_name" name="first_name" placeholder="First Name" required value="">
                    </div>
                    <div class="input-box">
                       <label for="middle_name">Middle Name</label>
                       <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" required value="">
                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                       <label for="last_name">Last Name</label>
                       <input type="text" id="last_name" name="last_name" placeholder="Last Name" required value="">
                    </div>
                    <div class="input-box">
                       <label for="contact_number">Contact Number</label>
                       <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number" required value="">
                    </div>
                </div>

                <div class="column">
                    <div class="input-box">
                       <label for="birthday">Birthday</label>
                       <input type="date" id="birthday" name="birthday" placeholder="Birthday" required value="">
                    </div>

                    <div class="input-box">
                       <label for="username">Username</label>
                       <input type="text" id="username" name="username" placeholder="Username"  required value="">
                    </div>
                </div>

                <div class="column">
                      <div class="input-box">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="E-mail" required value="">
                      </div>
                      <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required value="">
                      </div>
                </div>
                      <div class="txtbox">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" rows="3" placeholder="House/Blk No., Street, Barangay, Municipality, City/Province, Zip Code" required value=""></textarea>
                      </div>
                      <div class="sign-group">
                          <button name="submit" type="submit">Sign up</button>
                      </div> <br>
                         <div class="column">
                          <a href="login.php"><button type="button" class="lgn-btn">Log in</button></a>
                          <a href="index.php" onclick="showCancelMessage()"><button type="button" class="cnl-btn" onclick="showCancelMessage()">Cancel</button></a> 
                          
                         </div> 
                      </div>   
                       </div>
                      </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            
            function showCompletionMessage(event) {
                alert("You have completed signing up!");
                document.getElementById("signup-form").submit(); 
                return true;
            }
            function showCancelMessage() {
                alert("You cancelled signing up!");
            }
        </script>
    </form>
<body>
</html>