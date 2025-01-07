<?php
session_start();

include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: dashboard.php");
    exit();
}
include "header.php";

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
    <h1 class="mt-4">Members Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Members Dashboard</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Members DataTable
        </div>
        <div class="card-body">
            <button class="btn btn-outline-success mb-3" onclick="exportToExcel()">Export to Excel</button>
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>S.No</th>
                        <th>File No</th>
                        <th>Membership Number</th>
                        <th>Member's Name</th>
                        <th>CNIC & Passport No</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$fetchAllData = mysqli_query($conn, "SELECT * FROM members_2 ORDER BY id DESC;");
$Sno = 1;

while ($row = mysqli_fetch_assoc($fetchAllData)) {
    $dateOfBirth = $row['date_of_birth'];

    // Validate and format the date of birth
    if (strtotime($dateOfBirth)) {
        $dob = new DateTime($dateOfBirth);
        $formattedDOB = $dob->format('d M Y'); // e.g., 05 Nov 2024
    } else {
        $formattedDOB = 'Invalid Date';
    }
?>
    <tr id="row-<?php echo $row['id']; ?>" class="">
        <td><input type="checkbox" class="select-row" value="<?php echo $row['id']; ?>"></td>
        <td><?php echo $Sno; $Sno++; ?></td>
        <td><?php echo $row['file_no']; ?></td>
        <td><?php echo $row['membership_no']; ?></td>
        <td><?php echo $row['members_name']; ?></td>
        <td><?php echo $row['cnic_passport']; ?></td>
        <td><?php echo $formattedDOB; ?></td>
        <td>
    <div class="d-flex">
        <a href="member_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info mx-2">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </a>
        <a href="update_member_form.php?id=<?php echo $row['id']; ?>    " class="btn btn-outline-primary mx-2">
            <i class="fa-solid fa-pen"></i>
        </a>
        <button class="btn btn-outline-danger mx-2" onclick="deleteRow(<?php echo $row['id']; ?>)">
            <i class="fa-solid fa-trash"></i>
        </button>
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
// Single row delete
function deleteRow(id) {
    if (confirm('Are you sure you want to delete this member?')) {
        fetch('delete_member.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Member deleted successfully!');
                document.getElementById('row-' + id).remove();
            } else {
                alert('Failed to delete member. Please try again.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

// Multiple rows delete
function deleteMultiple() {
    const selectedRows = Array.from(document.querySelectorAll('.select-row:checked')).map(cb => cb.value);
    if (selectedRows.length === 0) {
        alert('Please select at least one member to delete.');
        return;
    }

    if (confirm('Are you sure you want to delete the selected members?')) {
        fetch('delete_member.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ ids: selectedRows })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Selected members deleted successfully!');
                selectedRows.forEach(id => document.getElementById('row-' + id).remove());
            } else {
                alert('Failed to delete members. Please try again.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
function exportToExcel() {
    window.location.href = 'export.php';
}

    // JavaScript functions for updateStatus, deleteStatus, deleteRow, etc. remain the same
</script>

<?php

include "footer.php";

?>
