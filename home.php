<?php
include 'conn.php';
session_start();
    $email = $_SESSION['email'];    
    $email_search = "select * from users where email='$email'";
    $query = mysqli_query($conn,$email_search);
    $usr = mysqli_fetch_assoc($query);
    $id = $usr['id'];
    $name = $usr['name'];
    $phone = $usr['phone'];
    $availability = $usr['availability'];

    echo $id;
    echo $name;
    echo $phone;
    echo $availability;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="/assets/img/1.jpg">
    <link rel="shortcut icon" href="assets/img/1.jpg" type="image/x-icon">
    <title>Profil</title>
 </head>
<style>
    .NameAndProfilePhotoBox{
        display: flex;
        justify-content: baseline;
    }
    
    .edit{
        text-decoration: none;  
        color:darkcyan;
        align-items: center;
    }
</style>
<body>
    <div class="LoginBox">
        <div class="NameAndProfilePhotoBox">
            <div style="width: 120px; position: relative; justify-content: center; height: 120px;">
            <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80" style="width: 120px; height: 120px; border-radius: 12px;" alt="Profile Picture">
        </div>
        <h1 style="text-align: left; margin-top: 10px;">Hello<?php if($name)echo", " . $name;?>!</h1>
        </div>
       
    
            <div class="valabilitateBox">
                <h2>Availability</h2>
                <p>Your subscription is available for <span style="color: red;"><?php echo $availability;?></span> days.</p>

            </div>
        
       
        
            <div class="buyBox">
                <h2>Buy</h2>
                <p>Buy more availability</p>
            </div>
            <div style="display: flex; justify-content: space-between; align-items:center; gap:10px; ">

            <a class="edit" href="contact.html"> <h2 style="font-size: 20px; border-radius:12px; text-align: center; border: 2px solid black; padding:5px;">  Contact  </h2></a>
            <a class="edit" href="editprf.php"> <h2 style="font-size: 20px; border-radius:12px; text-align: center; border: 2px solid black; padding:5px;">Edit profile  </h2></a>
            <a class="edit" href="terms.html"> <h2 style="font-size: 20px; border-radius:12px; text-align: center; border: 2px solid black; padding:5px;">Terms</h2></a>
            </div>
    </div>
</body>

      
    
      
</html>
