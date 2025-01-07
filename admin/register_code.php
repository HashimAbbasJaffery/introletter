<?php
include "../config.php";

// User Register
if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];
    $role = $_POST['role'];

    if($password == $retypePassword){
        // Insert Data Into Database
        mysqli_query($conn,"INSERT INTO users (name,email,password,role)VALUES('".$name."','".$email."','".$password."','".$role."')");

        // Redirect with success message
    header("Location: user.php?error=Account Has Been Created Successfully");
    exit();
} else {
    // Redirect with error message
    header("Location: user.php?error=Password Not Matched");
    exit();
}
}

// User Delete
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $delete_id = $_GET['id'] ?? null;

    $deleteQuery = "DELETE FROM users WHERE id = $delete_id";

    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: user.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
        exit();
    }
} else {
    header("Location: user.php");
    exit();
}

// User Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retypePassword = $_POST['retypePassword'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE `users` SET 
                    `name`='$name', 
                    `password`='$cnic', 
                    `email`='$email', 
                    `password`='$password', 
                    `role`='$role'
                    WHERE id = $memberId";

    if ($conn->query($updateQuery) === TRUE) {
        $response['success'] = true;
        $response['message'] = 'Member updated successfully!';
        header("Location: user.php");
        exit();
    } else {
        $response['message'] = 'Error: ' . $conn->error;
    }
}
?>