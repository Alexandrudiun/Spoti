<?php
include 'conn.php';
session_start(); 
    if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    $email = $_SESSION['email']; 
    $email_search = "select * from users where email='$email'";
    $query = mysqli_query($conn,$email_search);
    $usr = mysqli_fetch_assoc($query);
    $id = $usr['id'];
    $name = $usr['name'];
    $_SESSION['name'] = $name;
    $phone = $usr['phone'];
    $availability = $usr['availability'];
    $date =$usr['date'];
    $image = $usr['photo'];

    $presentDate = date('Y-m-d'); // Get the present date
    $daysBetween = floor((strtotime($presentDate) - strtotime($date)) / (60 * 60 * 24));
    $availability = $availability - $daysBetween;
    $query = "UPDATE users SET availability = '$availability' WHERE email = '$email'";
    $update_user_query = mysqli_query($conn, $query);

} else {
    header("Location: index.php");
}
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
            
                <style>
                    .profile-img{
                        width: 120px;
                        height: 120px;
                        border-radius: 12px;
                    }
                </style>
                <img src="data:image/jpeg;base64,<?=base64_encode($image)?>" alt="profile picture of <?=$name?>" class="profile-img">
            </div>
            <div style="display:flex; flex-direction:column;">
            <h1 style="text-align: left; margin-top: 10px;">Hello,</h1>
    <?php
    if ($name) {
        if (strlen($name) <= 5) {
            echo $name . "!";
        } else {
            echo "<name style='font-size: 30px; text-align: left; margin: 10px;'>" .$name . "!</name>";
        
        }
    }
    ?>
            </div>
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
