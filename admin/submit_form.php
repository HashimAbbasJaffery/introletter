<?php
include "../config.php";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $club_name = $_POST['club_name'];
    $country_id = $_POST['country_id'];
    $city_id = $_POST['city_id'];
    
    $new_country = $_POST['new_country'] ?? '';
    $new_city = $_POST['new_city'] ?? '';

    // Check if new country is provided and insert it
    if (!empty($new_country)) {
        // Insert new country into the database
        $stmt = $conn->prepare("INSERT INTO international_countries (country_name) VALUES (?)");
        $stmt->bind_param('s', $new_country);
        if ($stmt->execute()) {
            // Get the last inserted country id
            $country_id = $conn->insert_id;
        } else {
            echo "Error adding new country: " . $stmt->error;
            exit;
        }
    }

    // Check if new city is provided and insert it
    if (!empty($new_city)) {
        // Insert new city into the database
        $stmt = $conn->prepare("INSERT INTO international_cities (city_name, country_id) VALUES (?, ?)");
        $stmt->bind_param('si', $new_city, $country_id);
        if ($stmt->execute()) {
            // Get the last inserted city id
            $city_id = $conn->insert_id;
        } else {
            echo "Error adding new city: " . $stmt->error;
            exit;
        }
    }

    // Insert the international city club record
    $stmt = $conn->prepare("INSERT INTO clubs (international_city_id, country_id, club_name) VALUES (?, ?, ?)");
    $stmt->bind_param('iis', $city_id, $country_id, $club_name);

    // Execute the query to insert the club
    if ($stmt->execute()) {
        header("Location: add_clubs.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
