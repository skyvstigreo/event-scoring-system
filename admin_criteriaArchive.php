<?php
$title = "DESS - Criteria Archive";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/criteria.png" width="40"> Event Archive</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Event Archive</li>
               </ol>
            </div>
            <!-- <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#add"
                     style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i
                        class="fa fa-plus-square"></i>
                     Add New</a> -->
         </div>
      </div>
   </div>
   <?php
   $query = "SELECT * FROM table_schedule
    INNER JOIN table_event on table_schedule.event_id = table_event.event_id
    INNER JOIN table_category on table_schedule.category_id = table_category.category_id
    WHERE table_event.archive != '0'";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $count = 0;
   foreach ($result as $row) {
      $count += 1;
      $event = $row['event_id'];
      echo '
    <section class="content">

        <div class="container-fluid">

            <div class="card card-info elevation-2">
                <div>
                    <br>
                    <a class="btn btn-sm elevation-4" onClick="window.print();" style="margin-left: 8px;background-color: #981D2D; color:white"><i class="fa fa-print" aria-hidden="true"></i>
                        Print</a>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Contest Name: ' . $row['event_name'] . '<span></span></h5>
                                        <h6>Date of Contest: ' . $row['event_date'] . ' <span> </span></h6>
                                        <h6>Venue: <span>' . $row['event_venue'] . '</span></h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5>Score Event Rank <span></span></h5>

                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Contestant Name</th>
                                <th>Event Name</th>
                                <th>Total Scores</th>
                                <th>Rank</th>

                            </tr>
                        </thead>
                        <tbody>';
      $query = "SELECT *, SUM(total_score)/Count(total_score) as total FROM table_contestant 
      LEFT JOIN table_score on table_contestant.contestant_id = table_score.contestant_id
      LEFT JOIN table_event on table_score.event_id = table_event.event_id
      WHERE table_score.event_id = '$event' and total_score != ''
      GROUP BY table_score.contestant_id
      ORDER BY total_score DESC";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      $order = 0;
      foreach ($result as $row) {
         $order += 1;
         echo '
                            <tr>
                                <td>' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . '</td>
                                <td>' . $row["event_name"] . '</td>
                                <td>' . (number_format($row['total'], 2)), '%' . '</td>
                                <td>' . $order . '</td>

                            </tr>';
      };

      echo '
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            <h5>Tally Sheets <span></span></h5>

                            <table id="tally' . $count . '" class="table table-striped table-bordered " data-paging="false" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judge</th>
                                <th>Contestant Name</th>
                                <th>Event Name</th>
                                <th>View Criteria Score</th>
                                <th>Overall Score</th>

                            </tr>
                        </thead>
                        <tbody>';
      $query = "SELECT * FROM table_score
        INNER JOIN table_user on table_score.judge_id = table_user.user_id
        INNER JOIN table_contestant on table_score.contestant_id = table_contestant.contestant_id
        INNER JOIN table_event on table_score.event_id = table_event.event_id
        WHERE table_score.event_id = '$event'";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      $order = 0;
      foreach ($result as $row) {


         echo '
                            <tr>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . '</td>
                                <td>' . $row['event_name'] . '</td>
                                <td><center><button type="button" name="view_score" id="' . $row["score_id"] . '" data-contestant="' . $row['contestant_id'] . '" data-judge="' . $row['judge_id'] . '" data-event="' . $row['event_id'] . '" class="btn btn-primary btn-xs view_score" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="fa fa-list"></i></button></center></td>
                                <td>' . $row['total_score'] . '</td>
                            </tr>';
      };
      echo '
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                            
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>';
   }
   ?>
</div>
</div>
<div id="view" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card-header">
                        <h5><img src="asset/img/event.png" width="40"> List of Criteria Scores</h5>
                     </div>
                     <span id="alert"></span>

                     <div class="text-left">
                        <table class="table table-hover" id="all_event">
                           <thead>
                              <tr class="text-center">
                                 <th>Criteria</th>
                                 <th>Score</th>
                              </tr>
                           </thead>
                           <tbody id="table_view">

                           </tbody>
                        </table>

                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                  <!-- <input type="hidden" name="cid" id="cid" /> -->
               </div>
            </div>
         </div>
      </div>
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
   $(function() {
      for (let i = 0; i < 1000; i++) {
         $("#tally" + i).DataTable();
      }

      $(document).on('click', '.view_score', function() {
         var score_id = $(this).attr("id");
         var contestant_id = $(this).data("contestant");
         var judge_id = $(this).data("judge");
         var event_id = $(this).data("event");
         $('#view').modal('show');
         $.ajax({
            url: "fetch/fetch_criteria_score.php",
            method: "POST",
            data: {
               contestant_id: contestant_id,
               judge_id: judge_id,
               event_id: event_id,
            },
            dataType: "html",
            success: function(data) {

               $("#table_view").html(data);
               // $("#cid").val(category_id);



            }
         })

      });



   });
</script>
</body>

</html>