<?php 
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

$adminCount = 0;
$operatorCount = 0;
$patientsCount = 0;
$doctorsCount = 0;
$testsCount = 0;

$query = "SELECT COUNT(*) as admin_count FROM users WHERE role = 'admin'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $adminCount = $row['admin_count'];
}

$query = "SELECT COUNT(*) as operatorCount FROM users WHERE role = 'operator'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $operatorCount = $row['operatorCount'];
}

$query = "SELECT COUNT(*) as patient_count FROM patients";
$result = mysqli_query($conn, $query);
if ($result) {
     $row = mysqli_fetch_assoc($result);
    $patientsCount = $row['patient_count'];
}

$query = "SELECT COUNT(*) as doctors_count FROM doctors";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $doctorsCount = $row['doctors_count'];
}
$query = "SELECT COUNT(*) as tests_count FROM tests WHERE deleted = 0";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $testsCount = $row['tests_count'];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Admins</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $adminCount?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Operators</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $operatorCount?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Patients
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php echo $patientsCount?>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-procedures fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Doctors
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $doctorsCount?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Tests
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $testsCount?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-vial fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?>
            