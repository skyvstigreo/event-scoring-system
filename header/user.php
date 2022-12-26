<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $title; ?></title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="stylesheet" href="asset/css/style.css">
   <link rel="stylesheet" href="asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="icon" href="asset/img/Logo.ico" type="image/x-icon" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #981D2D">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
               <a class="nav-link" href="#" role="button">
                  <img src="asset/img/avatar.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
               </a>
            </li> -->
             <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li> 
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="logout.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- Main Section  -->
      <aside class="main-sidebar sidebar-light-primary" style="background-color: #981D2D;">
            <!-- Brand Logo -->
            <a href="user_dashboard.php" class="brand-link">
            <img src="asset/img/Brand.png" alt="DSMS Logo" width="200"> 
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                   <li class="nav-item">
                     <a href="user_dashboard.php" class="nav-link">
                     <i class="fa-sharp fa-solid fa-gauge"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                 
                  <li class="nav-item">
                     <a href="user_scores.php" class="nav-link">
                     <i class="fa-sharp fa-solid fa-arrow-up-1-9"></i>
                        <p>
                           Scores
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>