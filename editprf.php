<?php  
include "conn.php";
session_start(); // Start the session
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if(isset($_POST['submit'])) {
        if(strlen($_POST['name']) > 16) {
            
            $toolong=1;
        }
        else{
        $name = $_POST['name'];
        $query = "UPDATE users SET name = '$name' WHERE email = '$email'";
        $update_user_query = mysqli_query($conn, $query);
        if($_FILES['image']['tmp_name']) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        }
        // if($image_size == false) {
        //     die("Invalid image.");
        // }
        if($image_size == false) {
            $image = $_SESSION['image'];
        }
        if($_SESSION['image']!=$image) {
            $query = "UPDATE users SET photo = '$image' WHERE email = '$email'";
            $update_user_query = mysqli_query($conn, $query);
        }
        if(!$update_user_query) {
            die("Query Failed" . mysqli_error($conn));
        }

        header("Location: home.php");
        }
    }
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
    
    <style>
        .LoginBox input[type="file"] {
            display: none;
        }
        #selected-photo {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            margin-left: 75px;
        }
    </style>
    
    <script>
        function displaySelectedPhoto(input) {
            var selectedPhoto = document.getElementById('selected-photo');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    selectedPhoto.src = e.target.result;
                    selectedPhoto.style.display = "block"; // Show the image
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                selectedPhoto.style.display = "none"; // Hide the image
            }
        }
    </script>
</head>
<body>
    <div class="LoginBox">
        <h1>Login</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <p style="margin-left: 7px;">New Name:</p>
            <input type="text" name="name" value="<?php echo $_SESSION['name'];?>">
            <br>
            <label class="buton" style="text-align: center; margin-left:9px;">
                <p>Click here to upload a photo</p>          
                <input type="file" accept="image/*" name="image" id="image" onchange="displaySelectedPhoto(this)">
            </label>
            <br>
            
        <div>
            <img id="selected-photo" style="display: none; margin-bottom:10px;" alt="Selected Photo">
        </div>
        
            <div style="text-align: center; display:flex; justify-content:center; margin-left: 1px;">
                
            <button class="buton" type="submit" name="submit" value="Update" class="buton">
                <p>Update profile</p>
            </button>
            <p style="color: red; margin-left: 10px;">
            <?php if(isset($toolong)) { 
               echo'Name too long!';} ?></p>
            </div>
        </form>
    </div>
</body>
</html>