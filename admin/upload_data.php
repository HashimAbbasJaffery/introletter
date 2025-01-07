<?php
include "../config.php";
// Determine the type of data to fetch
$type = $_GET['type'] ?? '';

if ($type === 'local') {
    // Fetch Local Cities
    $query = "SELECT id, city_name FROM local_cities";
    $result = $conn->query($query);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($type === 'international') {
    // Fetch Countries
    $query = "SELECT id, country_name FROM international_countries";
    $result = $conn->query($query);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} elseif ($type === 'international_cities') {
    // Fetch International Cities
    $country_id = $_GET['country_id'] ?? 0;
    $query = "SELECT id, city_name FROM international_cities WHERE country_id = $country_id";
    $result = $conn->query($query);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}

$conn->close();
?>
