<?php 
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/topbar.php');

    $id =$_SESSION['user_id'];
    $name =$_SESSION['name'];
    $email =$_SESSION['email'];
    $role =$_SESSION['role'] ;

$error = "";
$success = "";


if(isset($_POST['update_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

     if($password === ""){

        $query = "UPDATE users SET name = '$name', email = '$email', role = '$role' WHERE user_id = '$id'";
        $result = mysqli_query($conn, $query);
        if($result){
            $success="
            Profile updated successfully!
            ";
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
        }else{
            $error = "Email already exist.";
        }
        
     }else{
        if($password!= $cpassword){
            $error = "Password and confirm password not match";
        }else{
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            // add data to database.
            $query = "UPDATE users SET name = '$name', email = '$email', role = '$role', password = '$hashed_password' WHERE user_id = '$id'";
            $result = mysqli_query($conn, $query);
            if($result){
                $success="Profile updated successfully!";
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
            }else{
                $error = "Email already exist.";
            }
        }
     }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-start mb-4">
        <a href="/" class="btn btn-sm btn-primary shadow-sm mr-2">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        <h1 class="h3 mb-0 text-gray-800">Edit Profile - <small>ID = <?php echo $id;?></small></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card w-100 p-4">
            <form method="POST">
                
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
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="<?php echo $name?>" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="<?php echo $email?>" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-12 col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div id="passwordHelp" class="form-text">Leave password field empty if you don't want to change password.</div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <button type="submit" name="update_user" class="btn btn-primary w-100">Update Profile</button>
                    </div>
                </div>
                </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../includes/footer.php');