<?php
include "../config.php";

if (isset($_POST['membership_no'])) {
    $membership_no = $_POST['membership_no'];

    // Query to get member name from members_2 table
    $query = "SELECT members_name FROM members_2 WHERE membership_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $membership_no);
    $stmt->execute();
    $stmt->bind_result($members_name);
    $stmt->fetch();

    if ($members_name) {
        // If member found, return success response
        echo json_encode(['status' => 'success', 'members_name' => $members_name]);
    } else {
        // If no member found, return error response
        echo json_encode(['status' => 'error']);
    }

    $stmt->close();
    $conn->close();
}
?>
