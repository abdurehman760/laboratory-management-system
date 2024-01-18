<?php 
include('../includes/print-header.php');

if (!isset($_POST['print'])) {
    header('location: /patients');
    exit();
}
$tests_records = json_decode($_POST['tests'], true);
?>

    
<div class="non-printable text-center py-2">
    <a class="btn btn-primary" href="/patients">Back to Home</a>
    <button class="btn btn-primary" onclick="printPage()">Print</button>
</div>
    
<div class="printable-content container-fluid">
    <div class="row align-items-center">
        <div class="col-3">
            <img width="240px" src="/assets/img/logos.png" alt="Laboratory Management">
        </div>
        <div class="col-9 text-right">
            <p class="mb-0">Address: Deolai Main bazar</p>
            <p class="mb-0">Contact: 0333 1231231</p>
            <strong>Date: <?php echo $_POST['time']?></strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <h4>Patient Info</h4>
            <p class="mb-0">Name: <?php echo $_POST['p_name']?></p>
            <p class="mb-0">Gender: <?php echo $_POST['gender']?></p>
            <p class="mb-0">Age: <?php echo $_POST['age']?></p>
            <p class="mb-0">Contact: <?php echo $_POST['contact']?></p>
            <p class="mb-0">Address: <?php echo $_POST['address']?></p>
        </div>
        <div class="col-6">
            <h4>&nbsp</h4>
            <p class="mb-0">Reffered By: <?php echo $_POST['doctor']?></p>
            <p class="mb-0">Sub Total Rs:<?php echo $_POST['total']?>/-</p>
            <p class="mb-0">Discount Rs: <?php echo $_POST['discount']?>/-</p>
            <p class="mb-0 fs-4">Total Rs: <?php echo $_POST['total'] - $_POST['discount']?>/-</p>
        </div>
    </div>

    <hr class="mb-3">
    <div class="row">
        <div class="col-12">
            <h4 class="card-title">Tests Record</h4>
            <?php if (isset($tests_records) && is_array($tests_records) && count($tests_records) > 0) {?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tests_records as $row) {?>
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
<div class="dashed-border-bottom my-4"></div>


<script>
    function printPage() {      
        window.print();
    }
    printPage();
</script>
</body>
</html>