<?php
$title = "DESS - Judge Dashboard";
include 'pdo-connection.php';
include 'header/user.php';
// $uids = $_SESSION['name'];

if (empty($_SESSION['user_id'])) {
   $info = "You are not Logged in Yet";
   $_SESSION['info'] = $info;
   header("Location: index.php");
} else ($uid = $_SESSION['user_id']);


?>

<!-- Main -->
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">

               <h1 class="m-0"><i class="fa-sharp fa-solid fa-users"></i> Judge Dashboard</small></h1>

            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
               <div class="info-box">
                  <span class="info-box-icon text-success elevation-4"><i class="fa-sharp fa-solid fa-calendar-days"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">
                        <h5>Events</h5>
                     </span>
                     <span class="info-box-number">
                        <h2>4</h2>
                     </span>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
               <div class="info-box">
                  <span class="info-box-icon text-info elevation-4"><i class="fa-sharp fa-solid fa-user"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">
                        <h5>Contestants</h5>
                     </span>
                     <span class="info-box-number">
                        <h2>10</h2>
                     </span>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
</div>
</div>
<!-- jQuery -->
<script src="asset/jquery/jquery.min.js"></script>
<script src="asset/js/adminlte.js"></script>
</body>

</html>