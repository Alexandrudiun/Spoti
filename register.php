<?php
include 'conn.php'; // This is the connection to the database
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    $emailquery = "select * from users where email='$email'";
    $query = mysqli_query($conn,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0){
        echo "email already exists";
    }else{
        if($password === $cpassword){
            $insertquery = "insert into users(email, phone, password, name) values('$email','$phone','$pass','$name')";
            $iquery = mysqli_query($conn, $insertquery);
            if($iquery){
                ?>
                <script>
                    location.replace("index.php");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("no connection");
                </script>
                <?php
            }
        }else{
            echo "passwords are not matching";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <link rel="stylesheet" href="login.css">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="/assets/img/1.jpg">
    <link rel="shortcut icon" href="assets/img/1.jpg" type="image/x-icon">
    
    <title>Login</title>
 </head>
<style>
    
</style>
<body>
    <div class="LoginBox">
        <h1>Sign up</h1>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="   Enter Email">
            <input type="text" name="name" placeholder="   Enter your name">
            <input type="tel" name="phone" placeholder="   Enter Phone Number" pattern="[0-9]{10}" title="Please enter a valid Romanian phone number (9 digits)">
            <input type="password" name="password" placeholder="   Enter Password">
            <input type="password" name="cpassword" placeholder="   Confirm Password">
            <div style="display: flex; justify-content: center;"> <!-- Added a container div -->
                <button type="submit" class="buton" name="submit">
                    <h2 style="text-align: center;">register</h2>
                    </button>
            </div>
        </form>
    </div>
</body>

      
    
      
</html>
