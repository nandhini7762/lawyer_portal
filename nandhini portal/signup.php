<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $Gender=$_POST['gender'];
    $num=$_POST['number'];
    $address=$_POST['add'];
    $gmail=$_POST['mail'];
    $password=$_POST['pass'];

    if(!empty($gmail) && !empty ($password))
    {
        $query="insert into form(fname,lname,gender,cnum,address,email,pass) values('$firstname','$lastname','$Gender','$num','$address','$gmail','$password')";
        mysqli_query($conn,$query);
        echo"<script type='text/javascript'> alert('Successfully Registered')</script>";
    }
    else{
        echo"<script type='text/javascript'> alert('Please enter some valid information')</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login and Register</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .signup {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .signup h1 {
            text-align: center;
            color: #333;
        }

        .signup h4 {
            text-align: center;
            color: #666;
        }

        .signup label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .signup input[type="text"],
        .signup input[type="email"],
        .signup input[type="tel"],
        .signup input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .signup input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .signup input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .signup p {
            text-align: center;
            margin-top: 10px;
            color: #666;
        }

        .signup a {
            color: #007bff;
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup {
                padding: 15px;
                margin: 10px;
            }

            .signup input[type="submit"] {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .signup {
                padding: 10px;
                margin: 5px;
            }

            .signup input[type="submit"] {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="signup">
        <h1 class="hex-color">Sign Up</h1>
        <h4>It's free and it only takes a minute</h4>
        <form method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required>

            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" required>

            <label for="number">Contact Number</label>
            <input type="tel" id="number" name="number" required>

            <label for="add">Address</label>
            <input type="text" id="add" name="add" required>

            <label for="mail">Email</label>
            <input type="email" id="mail" name="mail" required>

            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" required>

            <input type="submit" value="Submit">
        </form>
        <p>By clicking the sign-up button, you agree to our<br>
            <a href="terms and conditions.html">Terms and Conditions</a> and <a href="privacy and policy.html">Privacy Policy</a>
        </p>
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>

</body>
</html>
