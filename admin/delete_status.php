<?php
include "../config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ids = isset($_POST['id']) ? [$_POST['id']] : explode(',', $_POST['ids']);
    
    foreach ($ids as $id) {
        $id = intval($id);
        $sql = "UPDATE customer SET status = 0 WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    echo json_encode(['success' => true]);
}
?>
