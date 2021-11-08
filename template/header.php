<?php require_once "core/base.php"?>
<?php require_once "core/functions.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"></meta>
    <title>Music Room</title>
    <!-- <link rel="stylesheet" href="<?php echo $url;?>/customise_bootstrap\mybootstrap\mybootstrap.css"> -->
   <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/bootstrap/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/feather_icon/feather.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/animation_it/animate.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/datatable/DataTables-1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/datatable/DataTables-1.10.25/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css">
</head>
<body>
<section class="main">
    <div class="container-fluid">
        <div class="row">
            <!--sidebar start-->
            <?php include "template/sidebar.php";?>
            <!--sidebar end-->

            <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content" style="background-image:
                    linear-gradient(to bottom, rgba(255,255,0,0.5), rgba(0,0,255,0.5));">
                <section class="main">
                <!--            menu start-->
                <div class="row header mb-2">
                    <div class="col-12 ">
                        <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                            <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                                <i class="feather-menu text-light" style="font-size: 2rem;"></i>
                            </button>
                            <form action="" method="POST" class="d-none d-md-block">
                                <div class="d-flex justify-content-between">
                                    <input type="text" class="form-control mr-2">
                                    <button class="btn btn-light mx-2">
                                        <i class="feather-search text-primary"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo $url;?>/assets/img/<?php echo $_SESSION['user']['photo'] ?>" class="user-img shadow-sm" alt=""> <?php echo $_SESSION["user"]["name"] ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Lock Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--              menu end-->