<?php
include 'pdo-connection.php';
$title = "DESS - Admin Dashboard";
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><i class="fa-sharp fa-solid fa-gauge"></i> Dashboard</h1>
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
                        <h5>Active Events</h5>
                     </span>
                     <span class="info-box-number">
                        <?php
                        function events($connect)
                        {
                           $query = "SELECT count(table_event.event_id) as event FROM table_schedule
                           INNER JOIN table_event on table_schedule.event_id = table_event.event_id
                           WHERE table_event.archive != '1'
                                       ";
                           $statement = $connect->prepare($query);
                           $statement->execute();
                           $result = $statement->fetch();
                           $event = $result['event'];
                           return $event;
                        }
                        ?>
                        <h2><?php echo events($connect); ?></h2>
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
                        <?php
                        function contestants($connect)
                        {
                           $query = "SELECT count(contestant_id) as contestant FROM table_contestant;
                                       ";
                           $statement = $connect->prepare($query);
                           $statement->execute();
                           $result = $statement->fetch();
                           $contestant = $result['contestant'];
                           return $contestant;
                        }
                        ?>

                        <h2><?php echo contestants($connect); ?></h2>
                     </span>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
               <div class="info-box">
                  <span class="info-box-icon text-warning elevation-4"><i class="fa-sharp fa-solid fa-users"></i></span>

                  <div class="info-box-content">
                     <span class="info-box-text">
                        <h5>Judges</h5>
                     </span>
                     <span class="info-box-number">
                        <?php
                        function judges($connect)
                        {
                           $query = "SELECT count(user_id) as judge FROM table_user WHERE user_type = '1'";
                           $statement = $connect->prepare($query);
                           $statement->execute();
                           $result = $statement->fetch();
                           $judge = $result['judge'];
                           return $judge;
                        }
                        ?>
                        <h2><?php echo judges($connect); ?></h2>
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