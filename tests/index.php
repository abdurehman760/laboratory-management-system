<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

$success="";
$error="";
if(isset($_GET['test_delete'])){
    check_role($_SESSION['role']);
    // delete user query
    $test_id = $_GET['test_delete'];
    $query = "UPDATE tests SET deleted = '1' WHERE test_id = '$test_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        $success = "Test deleted successfully.";
    }else{
        $error = "Something went wrong. Please try again.";
    }
}

$query = "SELECT * FROM tests WHERE deleted = 0";
$result = mysqli_query($conn, $query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tests</h1>
        <a href="new.php" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Test</a>
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
                    <th scope="col">Price</th>
                    <?php if($_SESSION['role'] === 'admin'):?>
                    <th scope="col">Actions</th>
                    <?php endif ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the result set and display users
                    while ($test = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td><?php echo $test['test_id']; ?></td>
                            <td><?php echo $test['test_name']; ?></td>
                            <td><?php echo $test['price']; ?></td>
                            <?php if($_SESSION['role'] === 'admin'):?>
                            <td>
                                <!-- edit and delete icon -->
                                <a href="/tests/edit.php?test_id=<?php echo $test['test_id']; ?>" class="">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                &nbsp;
                                &nbsp;
                                <a href="/tests?test_delete=<?php echo $test['test_id']?>"
                                onclick="
                                return confirm('Are you sure to remove this test?')
                                ">
                                    <i class="fas fa-trash text-danger fa-lg"></i>
                                </a>
                            </td>
                            <?php endif; ?>
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