<?php

include "dbconn.php";

if(isset($_POST["Submit_Button"])) {
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $sendsql = mysqli_query($connect, $sql);

    if($sendsql) {
        if(mysqli_num_rows($sendsql) > 0) {	
            while($row = mysqli_fetch_assoc($sendsql)) {
                $_SESSION['userID'] = $row['userID'];			
            }
            echo "<script> 
                alert('You have successfully logged in, Welcome $username !!!');
                window.location.href='../CSC584/index.html';
            </script>"; 
            exit();
        } else {
            echo "<script>alert('You entered the wrong password')</script>";
            // echo "<script>window.location = 'loginV3.php'</script>";
        }
    } else {
        echo "Query failed";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('background-image1.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: rgba(189, 228, 241, 0.8);
    padding: 40px;
    border-radius: 10px;
    text-align: center;
}

.container h1 {
    margin-bottom: 30px;
    font-size: 24px;
}

.input-container {
    margin-bottom: 20px;
    margin-right: 20px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.links {
    margin-top: 20px;
}

.links a {
    margin-right: 10px;
    text-decoration: none;
    color: #007bff;
}

.links a:hover {
    color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Recipe Sharing and Meal Planning Management</h1>
        <form method="POST" action="">
            <div class="input-container">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="Submit_Button">Login</button>
        </form>
        <div class="links">
            <a href="registerAccount.php">Register Account</a>
            <a href="forgot_password.html">Forgot Password</a>
        </div>
    </div>
</body>
</html>
