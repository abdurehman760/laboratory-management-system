<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');
check_role($_SESSION['role']);
if(!$_GET['test_id']){
    header('location: /tests');
    exit();
}

$error = "";
$test_id = $_GET['test_id'];
$query = "SELECT * FROM tests WHERE test_id = '$test_id'";
$result = mysqli_query($conn, $query);
$test = mysqli_fetch_assoc($result);

if($test === null){
    header('location: /tests');
    exit();
}

if(isset($_POST['update_test'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
   
    $query = "UPDATE tests SET test_name = '$name', price = '$price' WHERE test_id = '$test_id'";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location:/tests");
        exit();
    }else{
        $error = "Unable to update test, try again.";
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/tests" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Edit Test - <small>ID = <?php echo $_GET['test_id'];?></small></h1>
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
                                <label for="name" class="form-label">Test Name</label>
                                <input type="text" value="<?php echo $test['test_name']?>" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" value="<?php echo $test['price']?>" class="form-control" id="price"  name="price" required>
                            </div>
                            <button type="submit" name="update_test" class="btn btn-primary w-100">Update Test</button>
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