<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

$error = "";

// select doctors form database
$doctors_query = "SELECT * FROM doctors";
$doctors_result = mysqli_query($conn,$doctors_query);

// select tests from database
$tests_sql = 'SELECT * FROM tests WHERE deleted = 0';
$test_results=mysqli_query($conn,$tests_sql);



if(isset($_POST['add_patient'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $doctor = $_POST['doctor'];
    $tests = $_POST['tests'];
    $discount = $_POST['discount'];
    $total = 0;

    if (isset($_POST['add_patient'])) {
        foreach ($tests as $testId) {
            // Find the corresponding test in $test_results using the ID
            foreach ($test_results as $test) {
                if ($test['test_id'] == $testId) {
                    // Add the test price to the total
                    $total += $test['price'];
                    break; // Exit the inner loop once the test is found
                }
            }
        }
    }
    $query = "INSERT INTO patients (name, gender, age, address, contact) 
    VALUES ('$name', '$gender', '$age', '$address', '$contact')";
    $result = mysqli_query($conn, $query);
    if($result){
        // Get the ID of the newly inserted patient
        $patient_id = mysqli_insert_id($conn);

        // Query to add data to tests_record
        $tests_record_query = "INSERT INTO tests_records (patient_id, total, discount, doctor_id) 
                                VALUES('$patient_id', '$total', '$discount', '$doctor')";
        $test_record_result = mysqli_query($conn, $tests_record_query);

        if($test_record_result){
            $test_record_id = mysqli_insert_id($conn);

            // Insert data to test list
            foreach ($tests as $test){
                $test_query = "INSERT INTO patient_tests_list (test_id, tests_record_id) 
                VALUES('$test', '$test_record_id')";
                $test_result = mysqli_query($conn, $test_query);
                if(!$test_result){
                    $error =  'Error adding test record'; 
                }
            }
            header("location: /patients");
            exit();
        }else{
            $error =  'Error adding test record'; 
        }
        
    }else{
        // display error while running my sqli query
        echo $query;
        echo mysqli_error($conn);
        $error = "Unable to add patient, try again.";
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/patients" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Add New Patient</h1>
    </div>

    <!-- Content Row -->
    <div class="row justify-content-center align-items-center">
        <div class="card w-100 p-4">
            <form method="POST" class="patient-add-form">
                <div class="row">
                    <?php if($error): ?>
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-12 col-md-4 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-6 col-md-4 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                            <option value="shemale">Shemale</option>
                        </select>
                    </div>

                     <div class="col-6 col-md-4 mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="number" class="form-control" id="contact" name="contact" required>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="doctor" class="form-label">Reffered By</label>
                        <select class="form-select" id="doctor" name="doctor">
                            <?php while($doctor = mysqli_fetch_assoc($doctors_result)):?>
                                <option value="<?php echo $doctor['doctor_id']?>">
                                    <?php echo $doctor['doctor_name'];?>
                                </option>
                            <?php endwhile;?>
                        </select>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="tests" class="form-label">Tests</label>
                        <select class="form-select" id="tests" name="tests[]" multiple>
                            <?php while($test = mysqli_fetch_assoc($test_results)):?>
                                <option 
                                value="<?php echo $test['test_id']?>"
                                data-price="<?php echo $test['price']?>"
                                >
                                    <?php echo $test['test_name']. " - ". $test['price'];?>
                                </option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" value="0" id="discount" name="discount" min="0" required>
                        
                        <div class="mt-3">
                            <h5>Total: Rs. <b id="totalAmount">0</b>/- </h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <button type="submit" name="add_patient" class="btn btn-primary w-100">Add Patient Record</button>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include('../includes/footer.php');