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
    
    <script>
        function displaySelectedPhoto(input) {
            var selectedPhoto = document.getElementById('selected-photo');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    selectedPhoto.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                selectedPhoto.src = "no-photo.jpg"; // Display "No photo" image
            }
        }
    </script>
</head>
<body>
    <style>
     .LoginBox input[type="file"] {
            display: none;
        }
    </style>
    <div class="LoginBox">
        <h1>Login</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <p>Name:</p>
            <input type="text" name="name" value="<?php echo $_SESSION['name'];?>">

            <label class="buton" style="text-align: center;">
                Click here to change your profile photo          
                <input type="file" accept="image/*" name="image" id="image" onchange="displaySelectedPhoto(this)">
            </label>
            <label class="buton" type="submit" name="submit" value="Update" class="buton">
                Update profile photo
            </label>
        </form>
        <div style="display: flex; justify-content:center;">
            <img id="selected-photo" src="" alt="No photo selected" style="width: 120px; height: 120px; border-radius: 12px; margin-left: 35px;">
        </div>
    </div>
</body>
</html>
