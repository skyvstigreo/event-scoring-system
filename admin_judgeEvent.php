<?php

$title = "DESS - Judge Event";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/judges.png" width="40"> Assign Judge</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Assign Event</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" id="add" data-target="#user_modal" style="margin-top: 20px;margin-left: 10px;background-color: #981D2D; color:white"><i class="fa fa-plus-square"></i>
               Add New</a>
         </div>
      </div>
   </div>
   <section class="content">
      <span id="alert_action"></span>
      <div class="container-fluid">
         <div class="card card-info elevation-2">
            <br>
            <div class="col-md-12">
               <table id="user_table" class="table">
                  <thead class="btn-cancel">
                     <tr class="text-center">
                        <th>Judge Name</th>
                        <th>Event Name</th>
                        <th>Action</th>
                     </tr>
                  </thead>

               </table>
            </div>
         </div>
      </div>
   </section>
</div>
</div>


<div id="user_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="user_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Judge Information</h5>
                        </div>
                        <div class="row" id="refresh">
                           <!-- <div id="refresh"> -->
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left lbl_judge">Judge Name</label>
                                 <select class="form-control" id="judge_id" name="judge_id" style="cursor: pointer;" required>
                                    <option value="">--- Select Judge---</option>
                                    <?php
                                    $query = "SELECT * FROM table_user WHERE event_id ='0' and user_type ='1'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach ($result as $row) {
                                       echo '<option value="' . $row["user_id"] . '">' . $row["name"] . '</option>';
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                           <!-- </div> -->
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Event Name</label>
                                 <select class="form-control" id="event_id" name="event_id" style="cursor: pointer;" required>
                                    <option value="">--- Select Event---</option>
                                    <?php
                                    $query = "SELECT * FROM table_schedule
                                    INNER JOIN table_event on table_schedule.event_id = table_event.event_id and table_event.archive != '1'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach ($result as $row) {
                                       echo '<option value="' . $row["event_id"] . '">' . $row["event_name"] . '</option>';
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="user_id" id="user_id" />
                  <input type="hidden" name="btn_action" id="btn_action" />
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


<div id="update_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="update_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Judge Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Event Name</label>
                                 <select class="form-control" id="eid" name="eid" style="cursor: pointer;" required>
                                    <option value="">--- Select Event---</option>
                                    <?php
                                    $query = "SELECT * FROM table_schedule
                                    INNER JOIN table_event on table_schedule.event_id = table_event.event_id and table_event.archive != '1'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach ($result as $row) {
                                       echo '<option value="' . $row["event_id"] . '">' . $row["event_name"] . '</option>';
                                    }
                                    ?>
                                 </select>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="jid" id="jid" />
                  <input type="hidden" name="action" id="action" />
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
      $('#add').on('click', function() {
         $('#user_form')[0].reset();
         $('#btn_action').val("add_event");
      });

      $(document).on('submit', '#user_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: form_data,
            success: function(data) {
               $('#user_form')[0].reset();
               $('#user_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               userdataTable.ajax.reload();
               // location.reload();
               $("#refresh").load(location.href + " #refresh");
            }
         })
      });

      $(document).on('submit', '#update_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: form_data,
            success: function(data) {
               $('#update_form')[0].reset();
               $('#update_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               userdataTable.ajax.reload();
            }
         })
      });


      $(document).on('click', '.delete', function() {
         var judge_id = $(this).attr("id");
         var btn_action = 'delete_status';
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: {
               judge_id: judge_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               userdataTable.ajax.reload();
               // location.reload();
               $("#refresh").load(location.href + " #refresh");
            }
         })
      });

      $("#type").on('change', function() {
         var category_id = $(this).val();
         $.ajax({
            method: "POST",
            url: "fetch/fetch_event_name.php",
            data: {
               category_id: category_id
            },
            dataType: "html",
            success: function(data) {
               $("#event_id").html(data);
            }

         });
      })

      var userdataTable = $('#user_table').DataTable({
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax": {
            url: "fetch/setup_judge_fetch.php",
            type: "POST"
         },
         "columnDefs": [{
            "targets": [0, 1, 2],
            "orderable": false,
         }, ],
         "pageLength": 9999999
      });


      $(document).on('click', '.update', function() {
         var user_id = $(this).attr("id");
         var btn_action = "fetch_single";
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: {
               user_id: user_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {

               $('#action').val("edit");
               $('#update_modal').modal('show');
               $('#eid').val(data.event_id);
               $('#jid').val(user_id);

            }
         })
      });









   });
</script>
</body>

</html>