<?php
include "../config.php";

// Add New Record
if (isset($_POST["register"])) {
    $month = $_POST['month'];
    $fee = $_POST['fee'];

    $sql = "INSERT INTO `duration`(`month`, `fee`) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $month, $fee);

        if ($stmt->execute()) {
            header("Location: duration_fee.php");
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
    $month = $_POST['update_month'];
    $fee = $_POST['update_fee'];

    $sql = "UPDATE `duration` SET `month`=?, `fee`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssi", $month, $fee, $id);

        if ($stmt->execute()) {
            header("Location: duration_fee.php");
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

    $sql = "DELETE FROM `duration` WHERE `id`=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: duration_fee.php");
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
