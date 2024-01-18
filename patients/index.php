<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

$success="";
$error="";
if(isset($_GET['patient_delete'])){
    // delete user query
    $patient_id = $_GET['patient_delete'];
    $query = "DELETE FROM patients WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $query);
    if($result){
        $success = "Patient deleted successfully.";
    }else{
        $error = "Something went wrong. Please try again.";
    }
}

$query = "SELECT patient_id, name, gender, contact FROM patients";
$result = mysqli_query($conn, $query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Patients</h1>
        <a href="new.php" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Patient</a>
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
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the result set and display users
                    while ($patient = mysqli_fetch_assoc($result)) :
                        ?>
                        <tr>
                            <td>
                                <a href="/patients/record.php?id=<?php echo $patient['patient_id'];?>">
                                    <?php echo $patient['patient_id']; ?>
                                </a>
                            </td>
                            <td>
                                <a  href="/patients/record.php?id=<?php echo $patient['patient_id'];?>">
                                    <?php echo $patient['name']; ?>
                                </a>
                            </td>
                            <td><?php echo $patient['gender']; ?></td>
                            <td><?php echo $patient['contact']; ?></td>
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