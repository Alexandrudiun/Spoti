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
    $phone = $usr['phone'];
    $availability = $usr['availability'];
    $date =$usr['date'];
    $availability=$usr['$availability']+($date-date("Y-m-d"));
    // echo $id;
    // echo $name;
    // echo $phone;
    // echo $availability;
    echo $date;
    echo "<br>";
    echo date("Y-m-d");
    echo "<br>";
  
$presentDate = date('Y-m-d'); // Get the present date
$daysBetween = floor((strtotime($presentDate) - strtotime($date)) / (60 * 60 * 24));
$availability = $availability - $daysBetween;


} else {
    header("Location: index.php");
}
?>