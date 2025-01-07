<?php 

require "../config.php";

$membership_number = $_GET['member_number'];

$query = "SELECT * FROM customer WHERE membership_no = $membership_number";


// echo json_encode($conn->query($query)->fetch_all(MYSQLI_ASSOC));

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo json_encode($row);



?>