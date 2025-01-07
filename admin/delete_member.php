<?php
include "../config.php";

header('Content-Type: application/json');

// Get the data from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    // Single delete
    $id = intval($data['id']);
    $deleteQuery = "DELETE FROM members_2 WHERE id = $id";
    $result = mysqli_query($conn, $deleteQuery);

    echo json_encode(['success' => $result]);
} elseif (isset($data['ids'])) {
    // Multiple delete
    $ids = array_map('intval', $data['ids']);
    $idsList = implode(',', $ids);
    $deleteQuery = "DELETE FROM members_2 WHERE id IN ($idsList)";
    $result = mysqli_query($conn, $deleteQuery);

    echo json_encode(['success' => $result]);
} else {
    echo json_encode(['success' => false]);
}
?>
