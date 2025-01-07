<?php
include "config.php";

if ($_GET['type'] === 'country') {
    $query = "SELECT id, country_name FROM international_countries";
    echo json_encode($conn->query($query)->fetch_all(MYSQLI_ASSOC));
}

if ($_GET['type'] === 'city' && isset($_GET['country_id'])) {
    $countryId = intval($_GET['country_id']);
    $query = "SELECT id, city_name FROM international_cities WHERE country_id = $countryId";
    echo json_encode($conn->query($query)->fetch_all(MYSQLI_ASSOC));
}

if ($_GET['type'] === 'club' && isset($_GET['city_id'])) {
    $cityId = intval($_GET['city_id']);
    $query = "SELECT id, club_name FROM clubs WHERE international_city_id = $cityId";
    echo json_encode($conn->query($query)->fetch_all(MYSQLI_ASSOC));
}
?>
