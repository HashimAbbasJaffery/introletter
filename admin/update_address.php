<?php 

require "../config.php";
if(!$_POST['membership_id'] || !$_POST['address']) {
    echo 0;
    return; 
}
if (isset($_POST['membership_id']) && isset($_POST['address'])) {
    $membership_id = $_POST['membership_id'];
    $address = $_POST['address'];

    // Prepare the SQL query
    $query = "UPDATE customer SET residential_address = ? WHERE membership_no = ?";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Bind parameters: "si" (string, integer) — adjust this if your membership_id is a string
    $stmt->bind_param("ss", $address, $membership_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo 1;  // Successfully updated
    } else {
        echo 0;  // Provide error message
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    echo 0;
}

?>
