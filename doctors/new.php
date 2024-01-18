<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

$error = "";

if(isset($_POST['add_doctor'])){
    $name = $_POST['name'];
   
    $query = "INSERT INTO doctors (doctor_name) VALUES ('$name')";
    $result = mysqli_query($conn, $query);
    if($result){
        header("location: /doctors");
        exit();
    }else{
        $error = "Unable to add doctor, try again.";
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/doctors" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Add New Doctor</h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center align-items-center">
        <div class="card w-100 p-4">
            <form method="POST">  
                <?php if($error): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="">
                            <button type="submit" name="add_doctor" class="btn btn-primary w-100">Add User</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include('../includes/footer.php');