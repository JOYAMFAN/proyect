<?php
session_start();
 if(!empty($_SESSION))
 {
 header("location: registros.php");
    exit;
 }
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="./valuelogin.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" required>
            <label for="password">Password</label>
            <input type="password"  name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>