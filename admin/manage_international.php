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
        echo "<script>alert('Country deleted successfully!'); window.location.href = 'manage_international.php';</script>";
    } else {
        echo "<script>alert('Error deleting country: " . mysqli_error($conn) . "'); window.location.href = 'manage_international.php';</script>";
    }
}

// Handle Delete Request for international_cities
if (isset($_GET['delete_city_id'])) {
    $delete_city_id = $_GET['delete_city_id'];

    // Delete query for international_cities table
    $deleteQuery = "DELETE FROM international_cities WHERE id = $delete_city_id";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('City deleted successfully!'); window.location.href = 'manage_international.php';</script>";
    } else {
        echo "<script>alert('Error deleting city: " . mysqli_error($conn) . "'); window.location.href = 'manage_international.php';</script>";
    }
}

// Fetch all countries
$fetchAllCountries = mysqli_query($conn, "SELECT * FROM international_countries");

// Fetch all cities with country_name
$fetchAllCities = mysqli_query($conn, "
    SELECT 
        international_cities.id, 
        international_cities.city_name, 
        international_countries.country_name 
    FROM international_cities
    LEFT JOIN international_countries ON international_cities.country_id = international_countries.id
");

$Sno = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Countries & Cities</title>
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
            <!-- Data Table for Countries -->
            <table id="countriesTable" class="table table-bordered">
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

    <h1 class="mt-4">Manage Cities</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            International Cities
        </div>
        <div class="card-body">
            <!-- Data Table for Cities -->
            <table id="citiesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>City Name</th>
                        <th>Country Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Sno = 1; // Reset serial number for cities
                    while ($row = mysqli_fetch_assoc($fetchAllCities)) {
                        ?>
                        <tr>
                            <td><?php echo $Sno++; ?></td>
                            <td><?php echo $row['city_name']; ?></td>
                            <td><?php echo $row['country_name'] ?? 'N/A'; ?></td>
                            <td>
                                <a href="?delete_city_id=<?= $row['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this city?');" 
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
