<?php
$title = "DESS - Create Event";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<style>
   #myUL {
      /* Remove default list styling */
      list-style-type: none;
      padding: 0;
      margin: 0;
   }

   #myUL li a {
      border: 1px solid #ddd;
      /* Add a border to all links */
      margin-top: -1px;
      /* Prevent double borders */
      background-color: #f6f6f6;
      /* Grey background color */
      padding: 12px;
      /* Add some padding */
      text-decoration: none;
      /* Remove default text underline */
      font-size: 18px;
      /* Increase the font-size */
      color: black;
      /* Add a black text color */
      display: block;
      /* Make it into a block element to fill the whole list */
   }

   #myUL li a:hover:not(.header) {
      background-color: #eee;
      /* Add a hover effect to all links, except for headers */
   }
</style>


<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/event.png" width="40">Events Name</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Events Name</li>
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
                     <tr class="text-center">
                        <th>Event Category</th>
                        <th>Event Name</th>
                        <th>Venue</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
               
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
</div>
<!-- edit para malupit -->
<div id="participant_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">

         <div class="modal-body text-center">

            <form method="POST">

               <div class="card">
                  <div class="card-header">Add Contestant

                  </div>
                  <div class="card-body">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button">
                              <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                     <br>
                     <ul id="myUL">
 
                        <div class="input-group">
                           <input type="text" class="form-control">
                           <div class="input-group-append">
                              <span class="input-group-text"> <input type="checkbox" ></span>
                           </div>
                        </div>
                        <div class="input-group">
                           <input type="text" class="form-control">
                           <div class="input-group-append">
                              <span class="input-group-text"> <input type="checkbox" ></span>
                           </div>
                        </div>
                        <div class="input-group">
                           <input type="text" class="form-control">
                           <div class="input-group-append">
                              <span class="input-group-text"> <input type="checkbox"></span>
                           </div>
                        </div>
                        <div class="input-group">
                           <input type="text" class="form-control">
                           <div class="input-group-append">
                              <span class="input-group-text"> <input type="checkbox" ></span>
                           </div>
                        </div>

                     </ul>
                  </div>
                  <div class="card-footer">
                     <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                     <button type="submit" id="submit" class="btn btn-save">Add Contestant</button>
                  </div>
               </div>

            </form>
         </div>

      </div>
   </div>
</div>
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
                                 <label class="float-left">Event Category</label>
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

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Event Name</label>
                                 <select class="form-control" id="event" name="event" style="cursor: pointer;" required>
                                    <option value="">--- Select Event ---</option>
                                  
                                 </select>
                              </div>
                           </div>


                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Venue</label>
                                 <input type="text" id="venue" name="venue" class="form-control" placeholder="Venue" required>
                              </div>
                           </div>



                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Date</label>
                                 <input type="date" id="date" name="date" class="form-control" placeholder="Event Name" required>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Start Time</label>
                                 <input type="time" id="time" name="time" class="form-control" placeholder="Start Time" required>
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">End Time</label>
                                 <input type="time" id="end_time" name="end_time" class="form-control" placeholder="End Time" required>
                              </div>
                           </div>

                           <!-- <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Judge</label>
                                 <select class="form-control" id="event" name="event" style="cursor: pointer;">
                                    <option value="">--- Select Judge ---</option>
                                 </select>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <input type="hidden" name="sched_id" id="sched_id" />
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


      $(document).on('click', '.participant', function() {
         $('#participant_modal').modal('show');
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
               $("#event").html(data);
            }

         });
      })


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
         var sched_id = $(this).attr("id");
         var btn_action = 'delete';
         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: {
               sched_id: sched_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               eventdataTable.ajax.reload();
            }
         })
      });

      $(document).on('click', '.update', function() {
         var sched_id = $(this).attr("id");
         var btn_action = "fetch_single";
         // alert("hi")
         $.ajax({
            url: "action/event_action.php",
            method: "POST",
            data: {
               sched_id: sched_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {

               // $('#submit').text("Save Changes");
               $('#btn_action').val("edit");
               $('#event_modal').modal('show');
               $('#event').val(data.event_name);
               $('#type').val(data.event_type);
               $('#venue').val(data.event_venue);
               $('#date').val(data.event_date);
               $('#time').val(data.event_time);
               $('#end_time').val(data.end_time);
               $('#sched_id').val(sched_id);

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

   function myFunction() {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("myUL");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
         a = li[i].getElementsByTagName("a")[0];
         txtValue = a.textContent || a.innerText;
         if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
         } else {
            li[i].style.display = "none";
         }
      }
   }
</script>
</body>

</html>