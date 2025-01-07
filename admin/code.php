<?php
include "../config.php";

// Add New Record
if (isset($_POST["submit"])) {
    $resiprocal_club = $_POST['resiprocal_club'];
    $country = $_POST['country'];

    $sql = "INSERT INTO `res`(`resiprocal_club`, `country`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $resiprocal_club, $country);

        if ($stmt->execute()) {
            header("Location: resiprocal.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}

// Update Existing Record
if (isset($_POST["update"])) {
    $id = $_POST['update_id'];
    $resiprocal_club = $_POST['update_resiprocal_club'];
    $country = $_POST['update_country'];

    $sql = "UPDATE `res` SET `resiprocal_club`=?, `country`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssi", $resiprocal_club, $country, $id);

        if ($stmt->execute()) {
            header("Location: resiprocal.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}

// Delete Record
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `res` WHERE `id`=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: resiprocal.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
