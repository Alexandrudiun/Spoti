<?php
include 'conn.php';
$query = mysqli_query($conn, "SELECT * FROM users");
while ($usr = mysqli_fetch_assoc($query)) {
    $id = $usr['id'];
    $availability = $usr['availability'];
    $availability = $availability - 1;
    // Update the "availability" column
    $update_query = "UPDATE users SET availability = '$availability' WHERE id = '$id'";
    $update_user_query = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if (!$update_user_query) {
        die("Error updating record: " . mysqli_error($conn));
    }
    echo "Record updated successfully";
}
?>