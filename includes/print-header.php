<?php 
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] === false){
    header("Location: /login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lab Management</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">


    <style>
        body{
            color: #000;
        }
        .dashed-border-bottom {
        border-bottom: 1px dashed #999;
        }
        .table td, .table th {
            padding: .3em !important;
        }
        @media print {
            /* Hide elements not to be printed */
            .non-printable{
                display: none;
            }
            
        }
        @page {
            /* Set the size of the printed page */
            size: A4; /* You can use 'A4', 'Letter', or specific dimensions like '8.5in 11in' */  
            margin: .5cm 1cm;

        }

    </style>
</head>
<body>
