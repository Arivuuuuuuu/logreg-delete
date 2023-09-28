<?php
require 'config.php';

if(!empty($_SESSION["id"])){
    header("location:welcome.php");
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="card">
        <form name="" id="show"  method="post"  action="config.php" >
            <h1>Registration Form</h1>

           

            <div class="input-group">
                <label>Username</label>
                <input type="text" id="username" name="username" placeholder="Alphabets only" pattern="[A-Za-z]+">
                <div class="error"></div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <div class="error"></div>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm your password">
                <div class="error"></div>
            </div>

            <div class="input-group">
                <label>E-mail</label>
                <input type="text" id="mail" name="mail" placeholder="email@gmail.com">
                <div class="error"></div>
            </div>

            <div class="input-group">
                <label>Contact-number</label>
                <input type="text" id="number" name="number" placeholder="Enter up to 10 numbers" pattern="[0-9]+">
                <div class="error"></div>
            </div>

            <input class="design" type="submit" value="submit">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
    

    <script src="script.js"></script>
</body>
</html>


