<?php
    require_once "core/base.php";
    require_once "core/functions.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"></meta>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/bootstrap/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/vendor/feather_icon/feather.css">
    <link rel="stylesheet" href="<?php echo $url;?>/assets/css/style.css">
</head>
<body style="background-color: var(--primary-soft)">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-7 col-xl-5">
           <div class="card">
               <div class="card-body">
                   <h4 class="text-center text-primary">
                       <i class="text-primary feather-users"></i>
                       User Register
                   </h4>
                   <hr>
                   <?php
                   if (isset($_POST['reg-btn'])){
                        echo register();
                   }
                   ?>
                   <form method="post">
                       <div class="mb-3">
                           <label for="name"><i class="text-primary feather-user"></i>Your Name</label>
                           <input type="text" id="name" name="name" class="form-control mb-0" value="<?php echo old('name') ?>" >
                           <?php if (getError('name')){ ?>
                               <small class="text-danger font-weight-bold d-block"><?php echo getError("name"); ?></small>
                           <?php } ?>
                       </div>

                       <div class="mb-3">
                           <label for="email"><i class="text-primary feather-mail"></i>Your Email</label>
                           <input type="text" id="email" name="email" class="form-control mb-0" value="<?php echo old('email') ?>">
                           <?php if (getError('email')){ ?>
                               <small class="text-danger font-weight-bold d-block"><?php echo getError("email"); ?></small>
                           <?php } ?>
                       </div>
                       <div class="mb-3">
                           <label for=""><i class="text-primary feather-lock"></i>Password</label>
                           <input type="text" id="password" name="password" class="form-control mb-0" value="<?php echo old('password') ?>">
                           <?php if (getError('password')){ ?>
                               <small class="text-danger font-weight-bold d-block"><?php echo getError("password"); ?></small>
                           <?php } ?>
                       </div>
                       <div class="mb-3">
                           <label for=""><i class="text-primary feather-lock"></i>Comfirm Password</label>
                           <input type="password" name="cpassword" class="form-control" value="<?php echo old('cpassword') ?>">
                           <?php if (getError('cpassword')){ ?>
                               <small class="text-danger font-weight-bold d-block"><?php echo getError("cpassword"); ?></small>
                           <?php } ?>
                       </div>
                       <div class="d-flex justify-content-evenly">
                           <button class="btn btn-primary" name="reg-btn">Register</button>
                           <a href="login.php" class="btn btn-outline-primary">Sign In</a>
                       </div>
                   </form>
               </div>
           </div>
        </div>
        <?php clearError(); ?>
    </div>
</div>

<script src="<?php echo $url; ?>/assets/vendor/jQuery/jquery3.6.0.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
