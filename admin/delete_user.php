<?php
session_start();
include "../config.php";

// Ensure user is an admin
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}

// Check if ID is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize ID
    
    // Delete Query
    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: user.php?success=User+deleted+successfully");
    } else {
        header("Location: user.php?error=Failed+to+delete+user");
    }
    $stmt->close();
} else {
    header("Location: user.php?error=Invalid+request");
}
?>
