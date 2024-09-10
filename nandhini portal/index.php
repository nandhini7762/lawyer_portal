<?php
session_start();
include('db.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = $_POST['mail'];
    $password = $_POST['pass'];
    if(!empty($gmail) && !empty($password)) {
        $query = "SELECT * FROM form WHERE email='$gmail' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['pass'] == $password) {
                    header("location:home.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'>alert('Wrong Username or Password');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Email and Password cannot be empty');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login and Register</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h1 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="email"], 
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            font-size: 14px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login {
                padding: 15px;
            }

            input[type="email"], 
            input[type="password"], 
            input[type="submit"] {
                font-size: 14px;
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }

            p {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="mail" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="pass" required>
            <input type="submit" value="Submit">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>
