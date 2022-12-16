<?php
$title = "DESS - Create Event";
include 'pdo-connection.php';
include 'header/admin.php'; ?>


<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/event.png" width="40"> Manage Events</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Events</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" id="add" data-target="#event_modal" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i class="fa fa-plus-square"></i>
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
               <table id="event_table" class="table">
                  <thead class="btn-cancel">
                     <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <!-- <tr>
                                 <td>Cultural</td>
                                 <td>06-25-2021</td>
                                 <td>03:00 PM</td>
                                 <td><span class="badge bg-success">open</span></td>
                                 <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-eye"></i> view</a>
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
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
<!-- <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body text-center">
            <img src="asset/img/sent.png" alt="" width="50" height="46">
            <h3>Are you sure want to delete this Event?</h3>
            <div class="m-t-20">
               <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
               <button type="submit" class="btn btn-danger">Delete</button>
            </div>
         </div>
      </div>
   </div>
</div> -->
<div id="event_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="event_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Events Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Event Name</label>
                                 <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Event Name" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Category Type</label>
                                 <select class="form-control" id="type" name="type" style="cursor: pointer;" required>
                                    <option value="">--- Select Category ---</option>
                                    <?php
                                    $query = "SELECT * FROM table_category";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach ($result as $row) {
                                       echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>';
                                    }
                                    ?>
                                 </select>
                                 <!-- <select class="form-control" id="type">
                                    <option>Choose Event Type</option>
                                    <option>Cultural</option>
                                    <option>Arts</option>
                                    <option>Academic</option>
                                 </select> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                              <!-- <div class="form-group">
                                 <label for="exampleInputFile">Choose Banner</label>
                                 <div class="input-group">
                                    <div class="custom-file">
                                       <input type="file" class="custom-file-input" name="img" id="img" accept="image/*" required>
                                       <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                 </div>
                              </div> -->
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Description</label>
                                 <textarea class="form-control" id="description" name="description" placeholder="Descriptions"></textarea required>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="float-left">Venue</label>
                                 <input type="text" id="venue" name="venue" class="form-control" placeholder="Venue" required>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="float-left">Organizer</label>
                                 <input type="text" id="organizer" name="organizer" class="form-control" placeholder="Organizer" required>
                              </div>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="float-left">Date</label>
                                 <input type="date" id="date" name="date" class="form-control" placeholder="Event Name" required>
                              </div>
                           </div>      

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label class="float-left">Start Time</label>
                                 <input type="time" id="time" name="time" class="form-control" placeholder="Start Time" required>
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">End Time</label>
                                 <input type="time" id="end_time" name="end_time" class="form-control" placeholder="End Time" required>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <input type="hidden" name="event_id" id="event_id" />
                  <input type="hidden" name="btn_action" id="btn_action" />
                  <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
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
   date.min = new Date().toISOString().split("T")[0];

   $(document).ready(function() {

      $('#add').on('click', function() {
         $('#event_form')[0].reset();
         $('#btn_action').val("add_event");
      });


      $(document).on('submit', '#event_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
               $('#event_form')[0].reset();
               $('#event_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               eventdataTable.ajax.reload();
            }
         })
      });


      var eventdataTable = $('#event_table').DataTable({
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax": {
            url: "fetch/event_fetch.php",
            type: "POST"
         },
         "columnDefs": [{
            "targets": [0, 1, 2, 3],
            "orderable": false,
         }, ],
         "pageLength": 9999999
      });


      $(document).on('click', '.delete', function() {
         var event_id = $(this).attr("id");
         var btn_action = 'delete';
         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: {
               event_id: event_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               eventdataTable.ajax.reload();
            }
         })
      });

      $(document).on('click', '.update', function() {
         var event_id = $(this).attr("id");
         var btn_action = "fetch_single";
         // alert("hi")
         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: {
               event_id: event_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {

               // $('#submit').text("Save Changes");
               $('#btn_action').val("edit");
               $('#event_modal').modal('show');
               $('#event_name').val(data.event_name);
               $('#type').val(data.event_type);
               $('#description').val(data.event_description);
               $('#venue').val(data.event_venue);
               $('#organizer').val(data.event_organizer);
               $('#date').val(data.event_date);
               $('#time').val(data.event_time);
               $('#end_time').val(data.end_time);
               $('#event_id').val(event_id);

            }
         })
      });



      $(document).on('click', '.view', function() {
         var event_id = $(this).attr("id");
         var btn_action = "view";

         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: {
               event_id: event_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {
               // $('#event_modal').modal('show');
               $('#event_name').val(data.event_name);
               // $('#category_description').val(data.category_description);
               // $('#category_id').val(category_id);

            }
         })
      });



   });
</script>
</body>

</html>