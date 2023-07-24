<?php
include "conn.php";
$id = $_GET['id'];
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
        <h1>Payment methods</h1>
        <h3>Pay <?php if($id==0) echo '60 '; else echo '120 ';?>RON for <?php if($id==0) echo '6 months'; else { echo'12 months';}?></h3>
        <h4 style="color:antiquewhite; font-weight: lighter; font-size: 12px; text-align: justify; margin-left: 10px; margin-right: -12px;">*Please include in your payment details the reference number: <?php echo $clientNumber; ?> so that we can identify your payment.</h4>
        <div style="margin-left: 7px; margin-right: -30px;">
            <a href="bankTransfer.php?id=<?php echo $id?>"><button class="buton" style="margin-bottom: 15px; margin-top: 10px;"><h3> BANK TRANSFER</h3></button></a>
            <a href="Paypal.php?id=<?php echo $id?>"><button class="buton"><h3>PAYPAL</h3></button></a>
       </div>  
    </div>
</body>
</html> 