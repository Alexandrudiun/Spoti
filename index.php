<?php
include 'conn.php';
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_search = "select * from users where email='$email'";
    $query = mysqli_query($conn,$email_search);
    $email_count = mysqli_num_rows($query);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['email'] = $email_pass['email'];
        $pass_decode = password_verify($password, $db_pass);
        if($pass_decode){
            echo "login successful";
            ?>
            <script>
                location.replace("home.php");
            </script>
            <?php
        }else{
            echo "password incorrect";
        }
    }else{
        echo "invalid email";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="/assets/img/1.jpg">
    <link rel="shortcut icon" href="assets/img/1.jpg" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="LoginBox">
        <h1>Sign in</h1>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="   Enter Email">
            <input type="password" name="password" placeholder="   Enter Password">
            <div style="display: flex; justify-content: center;">
                <button type="submit" class="buton" name="submit">
                    <h2>login</h2>
                    <svg class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                </button>
                  
            </div>
            <div style="display: flex; justify-content: center; flex-direction: column;">
                <p style="font-size:12px; margin-top:15px; text-align: center;">You don't have an account? </p>
                <p style="font-size:12px; margin-top:15px; text-align: center; text-decoration: #15f4f5;"> <a href="register.php">Create an account now</a></p>
        </form>
    </div>
</body>
</html>
