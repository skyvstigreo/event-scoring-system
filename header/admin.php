<?php
// include "pdo-connection.php";
if (isset($_SESSION['type'])) {
   if ($_SESSION['type'] == '1') {
      header('location: index.php');
      die();
   }
} else {
   header('location: index.php');
   die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $title; ?></title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="stylesheet" href="asset/css/style.css">
   <link rel="stylesheet" href="asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="icon" href="asset/img/Logo.ico" type="image/x-icon" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />



   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }

      td a.btn {
         font-size: 0.7rem;
      }
   </style>

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
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="logout.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary" style="background-color: #981D2D"> <!-- Change Color-->

         <!-- Brand Logo -->
         <a href="admin_dashboard.php" class="brand-link">
            <img src="asset/img/Brand.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="admin_dashboard.php" class="nav-link">
                        <i class="fa-sharp fa-solid fa-gauge"></i>
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="admin_criteriaArchive.php" class="nav-link">
                        <i class="fa-sharp fa-solid fa-box-archive"></i>
                        <p>
                           Archive
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa-sharp fa-solid fa-calendar-days"></i>
                        <p>
                           Events
                        </p>
                        <i class="right fas fa-angle-left"></i>

                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="admin_category.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Event Category</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="admin_createEvent.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Event Name</p>
                           </a>
                        </li>

                        <li class="nav-item">
                           <a href="admin_eventCriteria.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Event Criteria</p>
                           </a>
                        </li>

                     </ul>
                  </li>


                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa-sharp fa-solid fa-user-plus"></i>

                        <p>
                           Contestants
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="admin_contestantProfile.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Add Contestant Profile</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="admin_contestantEvent.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Setup Contestant</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa-sharp fa-solid fa-users"></i>
                        <p>
                           Judges
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="admin_judgeProfile.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Profile</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="admin_judgeEvent.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Assign Event</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="admin_scores.php" class="nav-link">
                        <i class="fa-sharp fa-solid fa-arrow-up-1-9"></i>
                        <p>
                           Scores
                        </p>
                     </a>
                  </li>
                  <!-- <li class="nav-item">
                     <a href="admin-print-schedule.php" class="nav-link">
                        <img src="asset/img/print.png" width="30">
                        <p>
                           Print Schedules
                        </p>
                     </a>
                  </li> -->
               </ul>
            </nav>
         </div>
      </aside>