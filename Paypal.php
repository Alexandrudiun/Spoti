<?php
include "conn.php";
session_start(); // Start the session
$id = $_GET['id'];
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
        <h1>Pay<?php if($id==0) echo '60 '; else echo '120';?>RON </h1>
        <h4 style="color:antiquewhite; font-weight: lighter; font-size: 12px; text-align: justify; margin-left: 10px; margin-right: -12px;">*Please include in your payment details the reference number: <?php echo $clientNumber; ?> so that we can identify your payment.</h4>
        <div style="margin-left: 7px; margin-right: -30px;">
            <h2>Paypal</h2>
            <h3 style="margin-top: -20px;">Paypal account: <span style="color: aliceblue;">
            <h3 style="margin-top: 10px;">@Spoti10</h3>    </span>
            <h3 style="margin-top: -10px;">Payment details: <span style="color: aliceblue;"><?php echo $clientNumber; ?></span></h3>
             </div>  
    </div>
</body>
</html> 