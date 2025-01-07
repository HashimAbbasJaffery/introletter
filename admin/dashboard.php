<?php
session_start();

include "../config.php";
if (!isset($_SESSION['name'])) {
    // Redirect if the session is not set
    header("Location: logout.php");
    exit();
}

include 'header.php';
?>
            

<style>
    div.dataTables_wrapper div.dataTables_length select {
        width: 80px;
    }
    .highlighted-row {
        background-color: #98FB98;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <button class="btn btn-outline-primary mb-3 me-2" onclick="updateStatusMultiple()">Update Status</button>
            <button class="btn btn-outline-danger mb-3 mx-2" onclick="deleteMultiple()">Delete</button>
            <button class="btn btn-outline-success mb-3" onclick="exportCustomerData()">Export Customer Data</button>
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>Membership Number</th>
                        <th>Include Spouse</th>
                        <th>Include Children</th>
                        <th>Reciprocal Clubs</th>
                        <th>Duration</th>
                        <th>Issue Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetchAllData = mysqli_query($conn, "SELECT * FROM customer ORDER BY id DESC;");
                    $Sno = 1;

                    while ($row = mysqli_fetch_assoc($fetchAllData)) {
                        $dateString = $row['issue']; // Assuming $row['issue'] contains the date string

                        // Create a DateTime object from the date string
                        $date = new DateTime($dateString);

                        // Format the date to "d M Y"
                        $formattedDate = $date->format('d M Y');
                    ?>
                        <tr id="row-<?php echo $row['id']; ?>" class="<?php echo $row['status'] == 1 ? 'highlighted-row' : ''; ?>">
                            <td><input type="checkbox" class="select-row" value="<?php echo $row['id']; ?>"></td>
                            <td><?php echo $Sno; $Sno++; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['membership_no']; ?></td>
                            <td><?php echo $row['spouse']; ?></td>
                            <td><?php echo $row['children']; ?></td>
                            <td><?php echo $row['clubs']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $formattedDate; ?></td>
                            <td>
                                <div class="d-flex">
                                <a href="letter_invoice.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info mx-2">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-outline-primary mx-2" onclick="updateStatus(<?php echo $row['id']; ?>)"><i class="fa-solid fa-highlighter"></i></button>
                                <button class="btn btn-outline-danger mx-2" onclick="deleteRow(<?php echo $row['id']; ?>)"><i class="fa-solid fa-trash"></i></button>
                                </div>
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

<script>
    document.getElementById('select-all').addEventListener('click', function(event) {
        const checkboxes = document.querySelectorAll('.select-row');
        checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
    });

    function updateStatus(id) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    var row = document.getElementById('row-' + id);
                    if (row.classList.contains('highlighted-row')) {
                        row.classList.remove('highlighted-row');
                    } else {
                        row.classList.add('highlighted-row');
                    }
                } else {
                    alert("Error updating status.");
                }
            }
        };
        xhr.send("id=" + id);
    }

    function updateStatusMultiple() {
        const selectedIds = Array.from(document.querySelectorAll('.select-row:checked')).map(cb => cb.value);
        if (selectedIds.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        selectedIds.forEach(id => {
                            var row = document.getElementById('row-' + id);
                            if (row.classList.contains('highlighted-row')) {
                                row.classList.remove('highlighted-row');
                            } else {
                                row.classList.add('highlighted-row');
                            }
                        });
                    } else {
                        alert("Error updating status.");
                    }
                }
            };
            xhr.send("ids=" + selectedIds.join(","));
        } else {
            alert("Please select at least one row.");
        }
    }

    function deleteRow(id) {
        if (confirm('Are you sure you want to delete this item?')) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_row.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        var row = document.getElementById('row-' + id);
                        row.remove();
                    } else {
                        alert("Error deleting row.");
                    }
                }
            };
            xhr.send("id=" + id);
        }
    }

    function deleteMultiple() {
        const selectedIds = Array.from(document.querySelectorAll('.select-row:checked')).map(cb => cb.value);
        if (selectedIds.length > 0) {
            if (confirm('Are you sure you want to delete these items?')) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_multiple.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            selectedIds.forEach(id => {
                                var row = document.getElementById('row-' + id);
                                row.remove();
                            });
                        } else {
                            alert("Error deleting items.");
                        }
                    }
                };
                xhr.send("ids=" + selectedIds.join(","));
            }
        } else {
            alert("Please select at least one row.");
        }
    }

    function deleteStatus(id) {
        if (confirm('Are you sure you want to remove the highlight status from this item?')) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        var row = document.getElementById('row-' + id);
                        row.classList.remove('highlighted-row');
                    } else {
                        alert("Error removing status.");
                    }
                }
            };
            xhr.send("id=" + id);
        }
    }

    function deleteStatusMultiple() {
        const selectedIds = Array.from(document.querySelectorAll('.select-row:checked')).map(cb => cb.value);
        if (selectedIds.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        selectedIds.forEach(id => {
                            var row = document.getElementById('row-' + id);
                            row.classList.remove('highlighted-row');
                        });
                    } else {
                        alert("Error removing status.");
                    }
                }
            };
            xhr.send("ids=" + selectedIds.join(","));
        } else {
            alert("Please select at least one row.");
        }
    }
    function exportCustomerData() {
    window.location.href = 'export_customer.php';
}

</script>

<?php

include "footer.php";

?>
