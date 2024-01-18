<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');
if(!$_GET['doctor_id']){
    header('location: /doctors');
    exit();
}

$error = "";
$doctor_id = $_GET['doctor_id'];
$query = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";
$result = mysqli_query($conn, $query);
$doctor = mysqli_fetch_assoc($result);

if($doctor === null){
    header('location: /doctors');
    exit();
}

if(isset($_POST['update_docotr'])){
    $name = $_POST['name'];
   
    $query = "UPDATE doctors SET doctor_name = '$name' WHERE doctor_id = '$doctor_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location:/doctors");
        exit();
    }else{
        $error = "Unable to update doctor name, try again.";
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/doctors" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Edit Doctor - <small>ID = <?php echo $_GET['doctor_id'];?></small></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card w-100 p-4">
            <form method="POST">
                
                <div class="row">
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
                                <input type="text" value="<?php echo $doctor['doctor_name']?>" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_docotr" class="btn btn-primary w-100">Update Doctor</button>
                            </div>
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