<?php
include 'conn.php';
session_start();
if(isset($_SESSION['password'])&&isset($_SESSION['email'])){
    if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            //$photo = $_FILES['photo']['name'];
            $query = mysqli_query($conn,"update users set name='$name' where email='$_SESSION[email]'");
            header("location:home.php");    
                }}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/login.css">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="/assets/img/1.jpg">
    <link rel="shortcut icon" href="assets/img/1.jpg" type="image/x-icon">
    
</head>
<body>
    <div class="LoginBox">
        <h1>Login</h1>
        <form method="POST" action="">
            <p>Name:</p>
            <input type="text" name="name" required>
            <input type="submit" name="submit" value="Update" class="buton">
        </form>
    </div>
</body>
</html>
