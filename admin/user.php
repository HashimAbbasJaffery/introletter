<?php
session_start();
include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}

include('header.php');
?>

<!-- Load Required CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    body {
        background-color: <?php echo isset($background_color) ? $background_color : "#ffffff"; ?>;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Alert if Error Occurs -->
                <?php
                if (isset($_GET['error'])) {
                    $error_message = $_GET['error'];
                    $background_color = ($error_message === "Account Has Been Created Successfully") ? "green" : "red";
                    echo "<div class='alert alert-danger' style='background-color: $background_color; color: #fff;'>$error_message</div>";
                }
                ?>

                <div class="card">
                    <div class="card-body">
                        <!-- Button to trigger Add User Modal -->
                        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#addUserModal">
                            Add User
                        </button>

                        <!-- Add User Modal -->
                        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalTitle">Add User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="register_code.php">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">User Role</label>
                                                <select name="role" class="form-control">
                                                    <option value="User">User</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="retypePassword">Confirm Password</label>
                                                <input type="password" name="retypePassword" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="register" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Update User Modal -->
                       <!-- Update User Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalTitle">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="$('#updateUserModal').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="update_code.php">
                <div class="modal-body">
                    <input type="hidden" name="id" id="updateUserId">
                    <div class="form-group">
                        <label for="updateName">Name</label>
                        <input type="text" name="name" id="updateName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="updateEmail">Email</label>
                        <input type="email" name="email" id="updateEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="updateRole">User Role</label>
                        <select name="role" id="updateRole" class="form-control">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="updatePassword">Password (Leave blank to keep unchanged)</label>
                        <input type="password" name="password" id="updatePassword" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="$('#updateUserModal').modal('hide')">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

                        <!-- User Data Table -->
                        <table class="table table-striped table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selectQuery = "SELECT * FROM users";
                                $result = $conn->query($selectQuery);
                                $counter = 1;

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$counter}</td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['role']}</td>";
                                    echo "<td>
                                        <button class='btn btn-primary' onclick='openUpdateModal({$row['id']}, \"{$row['name']}\", \"{$row['email']}\", \"{$row['role']}\", \"{$row['password']}\")'>Edit</button>
                                        <button class='btn btn-danger' onclick='deleteUser({$row['id']})'>Delete</button>
                                    </td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openUpdateModal(id, name, email, role, password) {
    document.getElementById('updateUserId').value = id;
    document.getElementById('updateName').value = name;
    document.getElementById('updateEmail').value = email;
    document.getElementById('updateRole').value = role;
    document.getElementById('updatePassword').value = password; // Display current password (hashed)
    $('#updateUserModal').modal('show');
}


function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        window.location.href = 'delete_user.php?id=' + id;
    }
}
</script>

<?php include "footer.php"; ?>
