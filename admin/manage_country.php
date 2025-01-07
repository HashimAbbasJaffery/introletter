<?php

session_start();

include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";

// Handle Delete Request for international_countries
if (isset($_GET['delete_country_id'])) {
    $delete_country_id = $_GET['delete_country_id'];

    // Delete query for international_countries table
    $deleteQuery = "DELETE FROM international_countries WHERE id = $delete_country_id";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Country deleted successfully!'); window.location.href = 'manage_country.php';</script>";
    } else {
        echo "<script>alert('Error deleting country: " . mysqli_error($conn) . "'); window.location.href = 'manage_country.php';</script>";
    }
}

// Fetch all countries
$fetchAllCountries = mysqli_query($conn, "SELECT * FROM international_countries");
$Sno = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Countries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Countries</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            International Countries
        </div>
        <div class="card-body">
            <!-- Data Table -->
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Country Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($fetchAllCountries)) {
                        ?>
                        <tr>
                            <td><?php echo $Sno++; ?></td>
                            <td><?php echo $row['country_name']; ?></td>
                            <td>
                                <a href="?delete_country_id=<?= $row['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this country?');" 
                                   class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include "footer.php"; ?>
