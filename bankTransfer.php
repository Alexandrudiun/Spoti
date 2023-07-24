<?php
include "conn.php";
session_start(); // Start the session
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email']; 
    $email_search = "select * from users where email='$email'";
    $query = mysqli_query($conn,$email_search);
    $usr = mysqli_fetch_assoc($query);
    $clientNumber = $usr['id']; 
    
}
else {
    header("Location: index.php");
}
?>



?><!DOCTYPE html>
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
        <h1>Pay</h1>
        <h4 style="color:antiquewhite; font-weight: lighter; font-size: 12px; text-align: justify; margin-left: 10px; margin-right: -12px;">*Please include in your payment details the reference number: <?php echo $id; ?> so that we can identify your payment.</h4>
        <div style="margin-left: 7px; margin-right: -30px;">
        <h2>Bank transfer</h2>
        <h3>IBAN: <span style="color: aliceblue;">RO70BRDE140SV75980461400</span></h3>
        <h3>REFERENCE/DETAILS:<span style="color: aliceblue;"> <?php echo $id; ?></span></h3>
        </div>  
    </div>
</body>
</html> 