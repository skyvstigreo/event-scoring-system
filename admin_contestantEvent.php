<?php

$title = "DESS - Contestant Event";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><i class="fa-sharp fa-solid fa-user-plus"></i> Setup Event Contestant </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Setup Event Contestant</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   <span id="alert_action"></span>
   <div id="refresh">
      <?php
      $query = "SELECT * FROM table_schedule
    INNER JOIN table_event on table_schedule.event_id = table_event.event_id
    INNER JOIN table_category on table_schedule.category_id = table_category.category_id";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach ($result as $row) {
         $event = $row['event_id'];
         echo '
   
   <section class="content">

      <div class="container-fluid">
         <div class="card card-info elevation-2">
            <br>
            <div class="col-md-12">


               <h5>Event Category: <span>' . $row['category_name'] . '</span></h5>
               <h5>Event Name: <span>' . $row['event_name'] . '</span></h5>
               <h5>Venue: <span>' . $row['event_venue'] . '</span></h5>
               <h5>Date: <span>' . date("h:i: A", strtotime($row['event_time'])) . '</span></h5>


               <table  class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <tr>
                        <th>Contestant Name</th>
                        <th class="text-center"><button id="' . $row['event_id'] . '" class="btn btn btn-success btn-xs participant">Add Contestant</button>

                     </tr>
                  </thead>
                  <tbody>';
         $query = "SELECT * FROM table_contestant WHERE event_id = '$event'";
         $statement = $connect->prepare($query);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach ($result as $row) {
            echo '
                     <tr>
                        <td>' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] .  ' </td>
                        <td><center> <button type="button" name="delete" id="' . $row["contestant_id"] . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button> </center></td>
                     </tr>';
         };
         echo '
                  </tbody>
                  <tfoot>

                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </section>';
      };
      ?>
   </div>
</div>
</div>

<!-- Add Contestant Modal -->
<div id="contestant_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="contestant_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Add Contestant</h5>
                        </div>
                        <div id="fetch">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Contestant Name</label>
                                    <select class="form-control" id="contestant_id" name="contestant_id" style="cursor: pointer;" required>
                                       <option value="">--- Select Contestant---</option>
                                       <?php
                                       $query = "SELECT * FROM table_contestant WHERE status = '0'";
                                       $statement = $connect->prepare($query);
                                       $statement->execute();
                                       $result = $statement->fetchAll();
                                       foreach ($result as $row) {
                                          echo '<option value="' . $row["contestant_id"] . '">' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . '</option>';
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Card Footer-->
               <div class="card-footer">
                  <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="event_id" id="event_id" />
                  <input type="hidden" name="btn_action" id="btn_action" />
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
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
   $(document).ready(function() {
      init();

      function init() {
         $(document).on('click', '.participant', function(e) {
            var event_id = $(this).attr("id");
            $('#contestant_form')[0].reset();
            $('#contestant_modal').modal('show');
            $('#event_id').val(event_id);
            $('#btn_action').val("add_participant");
         });
         $("#refresh").load(location.href + " #refresh");

         // Add every button who needs to be reloaded.
      };


      // $('.participant').on('click', function() {

      // });

      $(document).on('submit', '#contestant_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/contestant_action.php",
            method: "POST",
            data: form_data,
            success: function(data) {
               $('#contestant_form')[0].reset();
               $('#contestant_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               $("#fetch").load(location.href + " #fetch");
               init();
            }
         })
      });

      $(document).on('click', '.delete', function() {
         var contestant_id = $(this).attr("id");
         var btn_action = 'delete_status';
         $.ajax({
            url: "action/contestant_action.php",
            method: "POST",
            data: {
               contestant_id: contestant_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               $("#fetch").load(location.href + " #fetch");
               init();
            }
         })
      });

   });
</script>
</body>

</html>