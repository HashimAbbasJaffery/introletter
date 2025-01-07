<?php
include "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $club_name = $_POST['club_name'];
    $city_id = $_POST['city_id'];
    $country_id = $_POST['country_id'];
    $city_type = $_POST['city_type'];

    $query = "UPDATE clubs SET club_name = '$club_name', city_id = $city_id, country_id = $country_id, type = '$city_type' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record updated successfully!'); window.location.href = 'your_page.php';</script>";
    } else {
        echo "<script>alert('Error updating record!'); window.location.href = 'update_form.php?id=$id';</script>";
    }
}
?>
