<?php

$title = "DESS - Contestant Event";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="../asset/img/contestant.png" width="40"> Setup Event Contestant </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Setup Event</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" id="add" data-toggle="modal" data-target="#contestant_modal" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i class="fa fa-plus-square"></i>
               Add Event</a>
         </div>
      </div>
   </div>
   <section class="content">
      <span id="alert_action"></span>
      <div class="container-fluid">
         <div class="card card-info elevation-2">
            <br>
            <div class="col-md-12">
               <table id="contestant_table" class="table">
                  <thead class="btn-cancel">
                     <tr>
                        <th>Event Name</th>
                        <th>Contestant Name</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <!-- <tr>
                        <td>Cultural Event</td>
                        <td>Jane Doe</td>
                        <td><span class="badge bg-success">open</span></td>
                        <td class="text-center">
                           <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i class="fa fa-user-edit"></i> update</a>
                           <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt"></i> delete</a>
                        </td>
                     </tr> -->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
</div>
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body text-center">
            <img src="asset/img/sent.png" alt="" width="50" height="46">
            <h3>Are you sure want to delete this Course?</h3>
            <div class="m-t-20">
               <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
               <button type="submit" class="btn btn-danger">Delete</button>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="contestant_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="contestant_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Event Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Event Joined</label>
                                 <select class="form-control" id="event" name="event" style="cursor: pointer;" required>
                                    <option value="">--- Select Event---</option>
                                    <?php
                                    $query = "SELECT * FROM table_event";
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
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Contestant Name</label>
                                 <select class="form-control" id="contestant" name="contestant" style="cursor: pointer;" required>
                                    <option value="">--- Select Contestant---</option>
                                    <?php
                                    $query = "SELECT * FROM table_contestant";
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
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Status</label>
                                 <select class="form-control" id="status" name="status" required>
                                    <option value="">---select ---</option>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="contestant_id" id="contestant_id" />
                  <input type="hidden" name="btn_action" id="btn_action" />
                  <button type="submit" class="btn btn-save">Save</button>
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
         $('#contestant_form')[0].reset();
         $('#btn_action').val("add");
      });

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
               contestantdataTable.ajax.reload();
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
               contestantdataTable.ajax.reload();
            }
         })
      });


      var contestantdataTable = $('#contestant_table').DataTable({
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax": {
            url: "fetch/setup_contestant_fetch.php",
            type: "POST"
         },
         "columnDefs": [{
            "targets": [0, 1, 2],
            "orderable": false,
         }, ],
         "pageLength": 9999999
      });

      $(document).on('click', '.update', function() {
         var contestant_id = $(this).attr("id");
         var btn_action = "fetch_event";
         // alert("hi")
         $.ajax({
            url: "action/contestant_action.php",
            method: "POST",
            data: {
               contestant_id: contestant_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {
               $('#btn_action').val("add_event");
               $('#contestant_modal').modal('show');
               $('#contestant').val(data.contestant);
               $('#event').val(data.event);
               $('#status').val(data.status);
               $('#contestant_id').val(contestant_id);

            }
         })
      });





   });
</script>
</body>

</html>