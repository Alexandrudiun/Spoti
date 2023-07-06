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
    echo date("Y-m-d");
    echo $availability;
} else {
    header("Location: index.php");
}
?>