<?php
session_start();
include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";


// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM clubs WHERE id = $delete_id");
    echo "<script>alert('Club deleted successfully!'); window.location.href = 'resiprocal.php';</script>";
}

// Handle Filter Logic
$typeFilter = isset($_GET['type']) ? $_GET['type'] : 'all';
$whereClause = "";
if ($typeFilter === 'local') {
    $whereClause = "WHERE clubs.type = 'local'";
} elseif ($typeFilter === 'international') {
    $whereClause = "WHERE clubs.type = 'international'";
}

// Query to fetch data with correct table names
$fetchAllData = mysqli_query($conn, "
    SELECT 
        clubs.id AS club_id, 
        clubs.club_name, 
        international_cities.city_name AS international_city, 
        international_countries.country_name,
        clubs.international_city_id,
        clubs.country_id
    FROM clubs
    LEFT JOIN international_cities ON clubs.international_city_id = international_cities.id
    LEFT JOIN international_countries ON clubs.country_id = international_countries.id
    $whereClause
");

$Sno = 1;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Resiprocal</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> DataTable Example
        </div>

        <div class="card-body">
            <!-- Data Table -->
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Resiprocal Club</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($fetchAllData)) {
                        ?>
                        <tr>
                            <td><?php echo $Sno++; ?></td>
                            <td><?php echo $row['club_name']; ?></td>
                            <td><?php echo $row['international_city'] ?? "N/A"; ?></td>
                            <td><?php echo $row['country_name'] ?? "N/A"; ?></td>
                            <td>
                                <a href="?delete_id=<?= $row['club_id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger">Delete</a>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>
