<?php  
include "conn.php";
session_start(); // Start the session
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $query = "UPDATE users SET name = '$name' WHERE email = '$email'";
        $update_user_query = mysqli_query($conn, $query);
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        // if($image_size == false) {
        //     die("Invalid image.");
        // }

        $query = "UPDATE users SET photo = '$image' WHERE email = '$email'";
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
    <style>.LoginBox input[type="file"] {
            display: none;
        }</style>
    <div class="LoginBox">
        <h1>Login</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <p>Name:</p>
            <input type="text" name="name" value="<?php echo $_SESSION['name'];?>">

        <button  class="buton" value="Click here to change your profile photo">
        <p>1</p>            
        <input type="file" accept="image/*" name="image" id="image">
        </button>
            <input type="submit" name="submit" value="Update" class="buton">

        </form>
    </div>
</body>
</html>