<?php
include('../config.php'); 



$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE `users` SET 
                    `name`='$name', 
                    `password`='$password', 
                    `email`='$email', 
                    `password`='$password', 
                    `role`='$role'
                    WHERE id = $memberId";

    if ($conn->query($updateQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = 'User updated successfully!';
        header("Location: user.php");
        exit();
    } else {
        $response['message'] = 'Error: ' . $conn->error;
    }
}

?>