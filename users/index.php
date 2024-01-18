<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');
check_role($_SESSION['role']);
$success="";
$error="";
if(isset($_GET['user_delete'])){
    // delete user query
    $user_id = $_GET['user_delete'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    if($result){
        $success = "User deleted successfully.";
    }else{
        $error = "Something went wrong. Please try again.";
    }
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="new.php" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php if($success): ?>
            <div class="col-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?php echo $success; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>
            <?php if($error): ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <?php endif; ?>
            <div class="card w-100 overflow-x-scroll">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the result set and display users
                    while ($user = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td>
                                <!-- edit and delete icon -->
                                <a href="/users/edit.php?user_id=<?php echo $user['user_id']; ?>" class="">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                &nbsp;
                                &nbsp;
                                <a href="/users?user_delete=<?php echo $user['user_id']?>"
                                onclick="
                                return confirm('Are you sure to remove this user?')
                                ">
                                    <i class="fas fa-trash text-danger fa-lg"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../includes/footer.php');
?>