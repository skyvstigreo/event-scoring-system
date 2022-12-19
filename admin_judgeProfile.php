<?php 
$title = "DESS - Judge Profile";
include_once('mysqli-connection.php');
include 'header/admin.php';
?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/judges.png" width="40"> Judges</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Judges</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" id="add" data-target="#user_modal" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i class="fa fa-user-plus"></i>
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

                     <tr>

                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                        


                     </tr>
                  </thead>
                  <tbody>

                     </thead>



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
               <h3>Are you sure want to delete this Judge?</h3>
               <div class="m-t-20">
                  <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div> -->
<div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/judges.png" width="40"> Judges Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="float-left">Firts Name</label>
                                 <input type="text" class="form-control" placeholder="Firts Name">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="float-left">Middle Name</label>
                                 <input type="text" class="form-control" placeholder="Middle Name">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label class="float-left">Last Name</label>
                                 <input type="text" class="form-control" placeholder="Last Name">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Achievement</label>
                                 <textarea class="form-control" placeholder="Achievement"></textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">UserName</label>
                                 <input type="text" class="form-control" placeholder="UserName">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Password</label>
                                 <input type="password" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                  <button type="submit" class="btn btn-save">Save Changes</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="user_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-body text-center">

            <form method="POST" id="user_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/judges.png" width="40"> Judges Information</h5>
                        </div>
                        <div class="row">
                          
                          
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Username</label>
                                 <input type="text" name="uname" id="uname" class="form-control" placeholder="Username">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="float-left">Password</label>
                                 <input type="password" name="password" id="password" class="form-control">
                                 <label class="text-black mt-2 ml-2"><input type="checkbox" onclick="myFunction()"> Show Password</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="user_id" id="user_id" />
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
         x.type = "text";
      } else {
         x.type = "password";
      }
   }
   $(document).ready(function() {
      $('#add').on('click', function() {
         $('#user_form')[0].reset();
         $('#btn_action').val("add_user");
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
            }
         })
      });

      $(document).on('click', '.update', function() {
         var user_id = $(this).attr("id");
         var btn_action = "fetch_single";
         // alert("hi")
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: {
               user_id: user_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {
               $('#btn_action').val("edit");
               $('#user_modal').modal('show');
               $('#fname').val(data.first_name);
               $('#mname').val(data.middle_name);
               $('#lname').val(data.last_name);
               $('#achievement').val(data.achievement);
               $('#uname').val(data.user_name);
               $('#password').val('');
               // $('#course_description').val(data.course_description);
               $('#user_id').val(user_id);

            }
         })
      });


      // var userdataTable = $('#user_table').DataTable({
      //    "processing": true,
      //    "serverSide": true,
      //    "order": [],
      //    "ajax": {
      //       url: "fetch/judge_fetch.php",
      //       type: "POST"
      //    },
      //    "columnDefs": [{
      //       "targets": [0, 1, 2],
      //       "orderable": false,
      //    }, ],
      //    "pageLength": 9999999
      // });



      $(document).on('click', '.delete', function() {
         var user_id = $(this).attr("id");
         var btn_action = 'delete';
         $.ajax({
            url: "action/user_action.php",
            method: "POST",
            data: {
               user_id: user_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               userdataTable.ajax.reload();
            }
         })
      });




   });
</script>
</body>

</html>