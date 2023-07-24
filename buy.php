<?php  
include "conn.php";
session_start(); // Start the session
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email']; 
    $email_search = "select * from users where email='$email'";
    $query = mysqli_query($conn,$email_search);
    $usr = mysqli_fetch_assoc($query);
    
}
else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/login.css">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="/assets/img/1.jpg">
    <link rel="shortcut icon" href="assets/img/1.jpg" type="image/x-icon">
</head>
<body>
    <div class="LoginBox">
        <h1>Buy</h1>
        <div style="margin-left: 7px; margin-right: -30px;">
        <p style="text-align: center; margin-right: 20px;">Choose a subscription</p>
        <a href="cos.php?id=0"><button class="buton" style="margin-bottom: 15px; margin-top: 10px;"><h3>6 MONTHS SUBSCRIPTION</h3></button></a>
        <a href="cos.php?id=1"><button class="buton"><h3>12 MONTHS SUBSCRIPTION</h3></button></a>
        </div>  
    </div>
</body>
</html> 