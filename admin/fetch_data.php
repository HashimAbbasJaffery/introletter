<?php
include "../config.php";

// Fetch countries
if (isset($_GET['fetch_countries'])) {
    // Fetch all countries from the international_countries table
    $result = $conn->query("SELECT id, country_name FROM international_countries");
    $countries = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($countries);
}

// Fetch cities based on the selected country
if (isset($_GET['country_id'])) {
    $country_id = $_GET['country_id'];
    // Fetch cities from international_cities table based on the country_id
    $result = $conn->query("SELECT id, city_name FROM international_cities WHERE country_id = $country_id");
    $cities = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($cities);
}

$conn->close();
?>
