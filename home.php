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
    $date =$usr['date'];
    $image = $usr['photo'];
    $_SESSION['image'] = $image;
    $availability = $usr['availability'];

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
            echo "<name style='font-size: 30px; text-align: left; margin-left: 15px; margin-top: -22px;'>" .$name . "!</name>";
        
        }
    }
    ?>
            </div>
        </div> 
            <div class="valabilitateBox">
                <h2>Availability</h2>
                <p>Your subscription is available for <span style="color: red;"><?php if($availability>0)echo $availability; else echo"0";?></span> days.</p>

            </div>
        
       
        
            <div class="buyBox">
            <div style="display: flex; gap: 25px; align-items: center;">
                <h2>Buy</h2>
            
            <a href="buy.php">
                <div style="background-color: #15f4f5; border-radius: 55px; border:1px solid white; width: 67px; height: 50px; display: flex; justify-content: center; align-items: center;">
                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
     width="45px" height="45px" viewBox="0 0 979.248 979.248"
     xml:space="preserve">
    <g>
    
        <g>
            <path d="M3.595,338.069v177.646h30.971l105.602,308.414h411.397c10.078,34.305,28.629,65.74,54.615,91.729
                c40.879,40.879,95.229,63.391,153.041,63.391c57.811,0,112.162-22.512,153.041-63.391c40.877-40.879,63.391-95.229,63.391-153.039
                c0-57.812-22.514-112.162-63.391-153.041c-23.205-23.203-50.754-40.482-80.809-51.092l14.713-42.971h30.971V338.069H768.399
                l-252.932-233.71c2.652-7.906,4.113-16.355,4.113-25.144C519.581,35.536,484.044,0,440.366,0s-79.215,35.536-79.215,79.215
                c0,8.788,1.46,17.237,4.114,25.144l-252.932,233.71H3.595z M620.771,824.129c-6.08-13.676-10.188-28.414-11.969-43.85
                c-0.66-5.732-1.014-11.557-1.014-17.463c0-1.232,0.018-2.461,0.047-3.688c0.791-32.904,12.135-63.238,30.764-87.752
                c0.605-0.799,1.217-1.594,1.84-2.379c24.883-31.438,61.957-52.803,104.018-56.893c4.859-0.471,9.783-0.721,14.764-0.721
                c4.273,0,8.504,0.188,12.688,0.535c13.383,1.115,26.277,3.979,38.455,8.361c58.408,21.021,100.289,76.975,100.289,142.535
                c0,83.498-67.932,151.43-151.432,151.43C697.534,914.248,644.351,877.166,620.771,824.129z M579.935,603.998H472.866v-87.441
                h115.704L579.935,603.998z M407.866,759.129h-91.751l-8.899-90.131h100.65V759.129z M300.796,603.998l-8.635-87.441h115.704
                v87.441H300.796z M226.846,516.557l8.635,87.439H133.5l-29.94-87.439H226.846z M186.616,759.129l-30.861-90.131h86.144l8.9,90.131
                H186.616z M472.866,668.998h91.204c-13.402,27.822-20.709,58.42-21.236,90.131h-69.967V668.998L472.866,668.998z M759.222,546.385
                c-39.842,0-78.037,10.695-111.314,30.723l5.979-60.551h123.287l-10.266,29.979C764.353,546.445,761.79,546.385,759.222,546.385z
                 M812.138,450.715H68.595v-47.646h743.543V450.715z M454.582,79.215c0,4.121-1.772,7.826-4.583,10.425
                c-2.536,2.345-5.914,3.791-9.632,3.791s-7.096-1.446-9.632-3.791c-2.81-2.599-4.583-6.304-4.583-10.425
                c0-4.12,1.773-7.825,4.583-10.424c2.536-2.345,5.914-3.791,9.632-3.791s7.096,1.446,9.632,3.791
                C452.809,71.39,454.582,75.095,454.582,79.215z M409.368,152.108c9.526,4.067,20.003,6.323,30.999,6.323
                s21.472-2.256,30.999-6.323L672.62,338.069H208.112L409.368,152.108z"/>
            <polygon points="791.722,674.725 791.722,667.482 771.907,667.482 726.722,667.482 726.722,668.998 726.722,730.316 
                703.981,730.316 663.888,730.316 663.888,759.129 663.888,795.316 726.722,795.316 726.722,824.129 726.722,858.15 
                791.722,858.15 791.722,795.316 854.556,795.316 854.556,730.316 791.722,730.316 		"/>
        </g>
    </g>
</svg>
                <!-- <img src="assets/img/buy.svg" alt="buy" style="width: 45px; height: 45px;"> -->
                </div>
            </a>

            </div>
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
