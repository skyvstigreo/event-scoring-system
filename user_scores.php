<?php
$title = "DESS - Score";
include 'pdo-connection.php';
include 'header/user.php';
if (empty($_SESSION['user_id'])) {
   $info = "You are not Logged in Yet";
   $_SESSION['info'] = $info;
   header("Location: index.php");
} else ($uid = $_SESSION['user_id']);

?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/score.png" width="40"> Scores</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Scores</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <?php
   $query = "SELECT * FROM table_schedule
   INNER JOIN table_event on table_schedule.event_id = table_event.event_id
   INNER JOIN table_category on table_schedule.category_id = table_category.category_id
   INNER JOIN table_user on table_schedule.event_id = table_user.event_id
   WHERE user_id = '$uid'";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $count = 0;
   foreach ($result as $row) {
      $event = $row['event_id'];
      echo '
   <section class="content">
      <div class="container-fluid">
         <div class="card card-info elevation-2">
            <br>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="info-box">
                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Event Name: <span>' . $row['event_name'] . '</span></h5>
                              <h5>Date of Contest <span>' . date("M d Y", strtotime($row['event_date'])) . '</span></h5>
                              <h5>Start Time <span>' .  date("h:i: A", strtotime($row['event_time'])) . '</span></h5>
                              <h5>End Time <span> ' .  date("h:i: A", strtotime($row['end_time'])) . '</span></h5>
                              <h5>Venue: <span>' . $row['event_venue'] . '</span></h5>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="info-box">
                        <table class="table">
                           <thead class="btn-cancel" style="background-color: rgb(240,158,65)">
                              <tr>
                                 <th>Contestant Name</th>
                                 <th>Action</th>
                                 <th>Score</th>
                              </tr>
                           </thead>
                           <tbody>';
      $query = "SELECT * FROM table_contestant WHERE event_id = '$event'";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach ($result as $row) {
         $cid = $row['contestant_id'];
         echo '
                           
                              <tr>
                                 <td>' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] .  '</td>
                                 
                                 <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <a class="btn btn-sm btn-success score" id=' . $row['contestant_id'] . ' data-judge=' . $uid . ' data-event=' . $event . ' data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>View</a>

                                       </tr>
                                    </table>
                                 </td>';
         $query = "SELECT * FROM table_score WHERE event_id = '$event' and contestant_id = '$cid' and judge_id ='$uid'";
         $statement = $connect->prepare($query);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach ($result as $row) {
            echo '
                                 <td>' . $row["total_score"] . '</td>
                                    
                                 </td>
                              </tr>
                              
                              ';
         }
      }
      echo '
      
                           </tbody>
                        </table>
                     </div>
                  </div>
                  ';
   }

   ?>
   <div class="col-lg-6" id="scoring">
      <div class="info-box content-header">
         <h5>Select Contestant</h5>
      </div>
      <div class="info-box">
         <div class="content-header bg-warning">
         </div>
         <table class="table">
            <thead class="btn-cancel">
               <tr>
                  <th>Criteria</th>
                  <th>Score</th>
               </tr>
            </thead>
            <tr style="border-collapse: collapse;">
               <td>
                  <p>Q and A (50%)</p>
               </td>
               <td>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Score">
                     </div>
                  </div>
               </td>
            </tr>
            <tr style="border-collapse: collapse;">
               <td>
                  <p>Swimsuit (50%)</p>
               </td>
               <td>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Score">
                     </div>
                  </div>
               </td>
            </tr>
            <tr style="border-collapse: collapse;">
               <td>
                  <p>Total Score</p>
               </td>
               <td>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="100" readonly="">
                     </div>
                  </div>
               </td>
            </tr>
         </table>
      </div>
      <div class="col-md-12">
         <div class="form-group">

            <!-- <button type="submit" class="btn btn-info">Submit Score</button>
            <button type="submit" class="btn">Edit Score</button> -->
         </div>
      </div>
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
<script src="asset/js/bootstrap.bundle.min.js"></script>
<script src="asset/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
<script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script>
   // $(function() {
   //    $("#example1").DataTable();
   // });

   $(document).ready(function() {


      $(document).on('click', '.score', function() {
         var contestant_id = $(this).attr("id");
         var judge_id = $(this).data("judge");
         var event_id = $(this).data("event");
         // alert("hi")
         $.ajax({
            url: "fetch/scoring_fetch.php",
            method: "POST",
            data: {
               contestant_id: contestant_id,
               judge_id: judge_id,
               event_id: event_id,
               // btn_action: btn_action
            },
            dataType: "html",
            success: function(data) {
               $("#scoring").html(data);
               // $('#btn_action').val("edit");
               // $('#criteria_modal').modal('show');
               // $('#event').val(data.event_id);
               // $('#criteria').val(data.criteria_name);
               // $('#percent').val(data.criteria_percent);
               // // $('#category_description').val(data.category_description);
               // $('#criteria_id').val(criteria_id);

            }
         })
      });


      $(document).on('submit', '#score_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/score_action.php",
            method: "POST",
            data: form_data,
            success: function(data) {
               // $('#user_form')[0].reset();
               // $('#user_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               // userdataTable.ajax.reload();
               location.reload();
               // $("#refresh").load(location.href + " #refresh");
            }
         })
      });


   });
</script>
</body>

</html>