<?php
session_start();

include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";

?>
            
<div class="modal fade" id="ProductModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Month - Fee</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="fee_code.php">
                <div class="modal-body"> 
                    <!-- Form -->
                    <div class="mb-3">
                        <input type="text" name="month" class="form-control" id="exampleFormControlInput1" placeholder="1 - 2 - 6" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="fee" class="form-control" id="exampleFormControlInput1" placeholder="1000 - 2000 - 6000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="UpdateProductModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Update Month - Fee</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="fee_code.php">
                <div class="modal-body"> 
                    <!-- Form -->
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="mb-3">
                        <input type="text" name="update_month" class="form-control" id="update_month" placeholder="1 - 2 - 6" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="update_fee" class="form-control" id="update_fee" placeholder="1000 - 2000 - 6000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    div.dataTables_wrapper div.dataTables_length select {
        width: 80px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Duration & Fee</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="ml-auto pr-3 pt-3">
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ProductModel">Add Duration & Fee</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Month / Duration</th>
                        <th>Fee</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetchAllData = mysqli_query($conn, "SELECT * FROM duration");
                    $Sno = 1;
                    while ($row = mysqli_fetch_assoc($fetchAllData)) {
                    ?>
                        <tr>
                            <td><?php echo $Sno; $Sno++; ?></td>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['fee']; ?></td>
                            <td>
                                <button class="btn btn-outline-primary" onclick="editModal(<?php echo $row['id']; ?>, '<?php echo $row['month']; ?>', '<?php echo $row['fee']; ?>')">Edit</button>
                                <a href="fee_code.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-outline-danger text-left">Delete</a>
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
    function editModal(id, month, fee) {
        document.getElementById('update_id').value = id;
        document.getElementById('update_month').value = month;
        document.getElementById('update_fee').value = fee;
        var updateModal = new bootstrap.Modal(document.getElementById('UpdateProductModel'));
        updateModal.show();
    }
</script>

<?php
include "footer.php";
?>
