<?php
  function performLogin($conn, $username, $password) {
      // Your login logic using $conn
      $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
      $sendsql = mysqli_query($conn, $sql);
      // ... rest of your login logic using $sendsql
  }
?>