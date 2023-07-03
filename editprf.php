<?php  
include "conn.php";
session_start(); // Start the session
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $query="SELECT * FROM users WHERE email = '{$_SESSION['email']}'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    if(!$result)
    {
      die('Query Failed'). mysqli_error($conn);
    }
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $query = "UPDATE users SET name = '$name' WHERE email = '$email'";
        $update_user_query = mysqli_query($conn, $query);

        if(!$update_user_query) {
            die("Query Failed" . mysqli_error($conn));
        }

        header("Location: home.php");
    }
}
else {
    header("Location: index.php");
}
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
