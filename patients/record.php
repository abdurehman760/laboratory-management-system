<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');
include('../includes/helper.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: /patients');
    exit();
}

$patient_id = $_GET['id'];

$query = "SELECT p.*, tr.*, tl.*, t.*, d.*
          FROM patients p
          LEFT JOIN tests_records tr ON p.patient_id = tr.patient_id
          LEFT JOIN patient_tests_list tl ON tr.tests_record_id = tl.tests_record_id
          LEFT JOIN tests t ON tl.test_id = t.test_id
          LEFT JOIN doctors d ON tr.doctor_id = d.doctor_id
          WHERE p.patient_id = $patient_id";

$result = mysqli_query($conn, $query);

// Fetch the patient details
$patient = mysqli_fetch_assoc($result);

if ($patient === null) {
    header("location: /patients");
    exit();
}

mysqli_data_seek($result, 0);

// Fetch the tests records
$tests_records = array();
while ($row = mysqli_fetch_assoc($result)) {
    $tests_records[] = $row;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/patients" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Patient Tests Record</h1>
    </div>

    <!-- Content Row -->
    <div class="m-4">
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Personal Info</h3>
                        <form action="/patients/print.php" method="POST">
                            <input type="hidden" name="p_name" value="<?php echo $patient['name']?>">
                            <input type="hidden" name="gender" value="<?php echo $patient['gender']?>">
                            <input type="hidden" name="age" value="<?php echo $patient['age']?>">
                            <input type="hidden" name="contact" value="<?php echo $patient['contact']?>">
                            <input type="hidden" name="address" value="<?php echo $patient['address']?>">
                            <input type="hidden" name="time" value="<?php echo dateFormat( $patient['created_at'])?>">
                            <input type="hidden" name="doctor" value="<?php echo $patient['doctor_name']?>">
                            <input type="hidden" name="total" value="<?php echo $patient['total']?>">
                            <input type="hidden" name="discount" value="<?php echo $patient['discount']?>">
                            <input type="hidden" name="tests" value="<?php echo htmlspecialchars(json_encode($tests_records)); ?>">
                            <button type="submit" name="print" class="btn btn-success"><i class="fas fa-print"></i></button>
                        </form>
                    </div>
                    <hr>
                    <h3>Name: <b><?php echo $patient['name']?></b></h3>
                    <h5>Gender: <b><?php echo $patient['gender']?></b></h5>
                    <h5>Age: <b><?php echo $patient['age']?></b></h5>
                    <h5>Contact: <b><?php echo $patient['contact']?></b></h5>
                    <h5>Address: <b><?php echo $patient['address']?></b></h5>
                </div>
            </div>
            
            <div class="col-12 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Lab Info</h3>
                    <hr>
                    <h5>Time: <b><?php echo dateFormat($patient['created_at'])?></b></h5>
                    <h5>Doctor: <b><?php echo $patient['doctor_name']?></b></h5>
                    <h5>Sub total : <b><?php echo $patient['total']?></b></h5>
                    <h5>Discount: <b><?php echo $patient['discount']?></b></h5>
                    <h3>Total Payable: <b><?php echo $patient['total'] - $patient['discount']?></b></h3>

                </div>
            </div>

            <div class="col-12">
                <div class="card p-3">
                    <h3 class="card-title">Tests Record</h3>
                    <hr>
                    <?php if (count($tests_records) > 0) { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Test Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tests_records as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['test_name']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No tests found for this patient.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../includes/footer.php');
?>
