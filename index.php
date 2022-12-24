<?php
require_once 'login_controller.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>DESS - Index</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   <!-- Theme style -->
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="icon" href="asset/img/Logo.ico" type="image/x-icon" />
</head>

<body class="hold-transition login-page">
   <div class="login-box" >
      <!-- /.login-logo -->
      <div class="card card-outline" >
         <div class="card-header text-center">
            <a href="index.html" class="brand-link">
               <img src="asset/img/Logo.ico" alt="DSMS Logo" width="200">
            </a>
         </div>
         <div class="card-body">
            <form method="post" id="login">
               <?php if (count($errors) > 0) {
               ?>
                  <div class="alert alert-danger text-center">
                     <b>
                        <?php
                        foreach ($errors as $showerror) {
                           echo $showerror;
                        }
                        ?>
                     </b>
                  </div>
                  <?php
               }
                  ?>
                  <div class="input-group mb-3">
                     <input type="text" name="email" class="form-control" placeholder="Username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                        <i class="fa-sharp fa-solid fa-lock"></i>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 offset-3">
                        <button type="submit" name="login" class="btn btn-block btn-bg" style="background-color: rgba(46,18,35);color: rgb(240,158,65)">Login</button>
                     </div>
                  </div>
            </form>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.login-box -->
</body>

</html>