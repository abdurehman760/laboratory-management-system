<?php 
include('includes/connection.php');
// $host = 'localhost';
// $dbname = 'lab';
// $username = 'root';
// $password = 'root'; //change this to ''

// $conn = mysqli_connect($host, $username, $password, $dbname);

if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
    header("Location: /");
    exit();
}


$error = "";
if(isset($_POST['attempt_login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email = '$email'";

  // Execute the query
  $result =  mysqli_query($conn, $query);
  $user = mysqli_fetch_array($result);
  if($user){
    // verify the hased password
   $passwordMatched =  password_verify($password, $user['password']);
   if($passwordMatched){
    // * Success Login
    // store user data in session
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['loggedIn'] = true;
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    header("Location: /");
    exit();
   }else {
    //  Password is incorrect
    $error ="Email or Password is incorrect.";

   }
  }else{
    $error ="Email or Password is incorrect.";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Laboratory Management - Login</title>

    <!-- Custom fonts for this template-->
    <link
      href="/assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <?php if($error){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php echo $error; ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    <form class="user" method="POST">
                      <div class="form-group">
                        <input
                          type="email"
                          name="email"
                          class="form-control form-control-user"
                          id="exampleInputEmail"
                          aria-describedby="emailHelp"
                          placeholder="Enter Email Address..."
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          name="password"
                          class="form-control form-control-user"
                          id="exampleInputPassword"
                          placeholder="Password"
                          required
                        />
                      </div>
                      <input type="submit" name="attempt_login" value="Login" class="btn btn-primary btn-user btn-block">
                    </form>
                    <hr />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
  </body>
</html>
