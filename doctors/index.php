<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

$success="";
$error="";
if(isset($_GET['doctor_delete'])){
    check_role($_SESSION['role']);
    // delete user query
    $doctor_id = $_GET['doctor_delete'];
    $query = "DELETE FROM doctors WHERE doctor_id = $doctor_id";
    $result = mysqli_query($conn, $query);
    if($result){
        $success = "Doctor deleted successfully.";
    }else{
        $error = "Something went wrong. Please try again.";
    }
}

$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Doctors</h1>
        <a href="new.php" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Doctor</a>
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
                    <?php if($_SESSION['role'] === 'admin'):?>
                    <th scope="col">Actions</th>
                    <?php endif;?>
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the result set and display users
                    while ($doctor = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td><?php echo $doctor['doctor_id']; ?></td>
                            <td><?php echo $doctor['doctor_name']; ?></td>
                            <?php if($_SESSION['role'] === 'admin'):?>
                            <td>
                                <!-- edit and delete icon -->
                                <a href="/doctors/edit.php?doctor_id=<?php echo $doctor['doctor_id']; ?>" class="">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                &nbsp;
                                &nbsp;
                                <a href="/doctors?doctor_delete=<?php echo $doctor['doctor_id']?>"
                                onclick="
                                return confirm('Are you sure to remove this doctor?')
                                ">
                                    <i class="fas fa-trash text-danger fa-lg"></i>
                                </a>
                            </td>
                            <?php endif;?>
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