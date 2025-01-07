<?php 

require "../config.php";

$membership_number = $_GET['member_number'];

$query = "SELECT * FROM customer WHERE membership_no = '$membership_number'";




$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo json_encode($row);



?>