<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $title; ?></title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="asset/css/adminlte.min.css">
   <link rel="stylesheet" href="asset/css/style.css">
   <link rel="stylesheet" href="asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="icon" href="asset/img/Logo.ico" type="image/x-icon" />



   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
      }
      td a.btn{
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
               <a class="nav-link" data-widget="fullscreen" href="index.php">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary" style="background-color: #981D2D">   <!-- Change Color-->
            <!-- Brand Logo -->
            <a href="admin_dashboard.php" class="brand-link">
         <img src="asset/img/Brand.png" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="admin_dashboard.php" class="nav-link">
                        <img src="asset/img/dashboard.png" width="30">
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>

                  

                  <li class="nav-item">
                     <a href="admin_criteriaArchive.php" class="nav-link">
                        <img src="asset/img/dashboard.png" width="30">
                        <p>
                           Archive
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="asset/img/event.png" width="30">
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
                        <img src="asset/img/contestant.png" width="30">
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
                        <img src="asset/img/judges.png" width="30">
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
                     <a href="score.php" class="nav-link">
                        <img src="asset/img/score.png" width="30">
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