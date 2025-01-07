<?php
    include "../config.php";
// Prepare SQL query
$sql = "INSERT INTO members_2 (
    file_no, date_of_applying, membership_no, members_name, date_of_birth,
    membership_type, gender, cnic_passport, martial_status, city_country,
    phone_number, email_address, spouse_name, second_spouse_name,
    third_spouse_name, fourth_spouse_name, first_child_name, first_child_dob,
    second_child_name, second_child_dob, third_child_name, third_child_dob,
    fourth_child_name, fourth_child_dob, fifth_child_name, fifth_child_dob,
    sixth_child_name, sixth_child_dob, seventh_child_name, seventh_child_dob,
    eight_child_name, eight_child_dob, nineth_child_name, nineth_child_dob,
    tenth_child_name, tenth_child_dob
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param(
    'ssssssssssssssssssssssssssssssssssss', // 36 placeholders
    $_POST['file_no'],
    $_POST['date_of_applying'],
    $_POST['membership_no'],
    $_POST['members_name'],
    $_POST['date_of_birth'],
    $_POST['membership_type'],
    $_POST['gender'],
    $_POST['cnic_passport'],
    $_POST['martial_status'],
    $_POST['city_country'],
    $_POST['phone_number'],
    $_POST['email_address'],
    $_POST['spouse_name'],
    $_POST['second_spouse_name'],
    $_POST['third_spouse_name'],
    $_POST['fourth_spouse_name'],
    $_POST['first_child_name'],
    $_POST['first_child_dob'],
    $_POST['second_child_name'],
    $_POST['second_child_dob'],
    $_POST['third_child_name'],
    $_POST['third_child_dob'],
    $_POST['fourth_child_name'],
    $_POST['fourth_child_dob'],
    $_POST['fifth_child_name'],
    $_POST['fifth_child_dob'],
    $_POST['sixth_child_name'],
    $_POST['sixth_child_dob'],
    $_POST['seventh_child_name'],
    $_POST['seventh_child_dob'],
    $_POST['eight_child_name'],
    $_POST['eight_child_dob'],
    $_POST['nineth_child_name'],
    $_POST['nineth_child_dob'],
    $_POST['tenth_child_name'],
    $_POST['tenth_child_dob']
);

// Execute the query
if ($stmt->execute()) {
    echo "Data inserted successfully!";
    header("Location: add-members.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
