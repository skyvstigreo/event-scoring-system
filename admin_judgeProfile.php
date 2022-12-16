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
                  <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#add"
                     style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i
                        class="fa fa-user-plus"></i>
                     Add New</a>
               </div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12">

                     <table id="example1" class="table">
                        <thead class="btn-cancel">

                           <tr>

                           <th>First Name</th>
                           <th>Middle Name</th>
                           <th>Last Name</th>
                           <th>Achievement</th>
                           <th>Username</th>
                           <th>Action</th>
                              
                              
                           </tr>
                        </thead>
                        <tbody>

                           </thead>

                          
                           <?php
                           
                           $query = "SELECT * FROM table_judge ORDER BY judge_id ASC";

                           $result = mysqli_query($con, $query);
                           while ($row = mysqli_fetch_assoc($result)) {
                               echo '  
                               <tr>  
                                   <td>' . $row['first_name'] . '</td>
                                   <td>' . $row['middle_name'] . '</td>
                                   <td>' . $row['last_name'] . '</td>
                                   <td>' . $row['achievement'] . '</td>
                                   <td>' . $row['username'] . '</td>
                                 
                                   <td><button type="button" name="delete" judge_id="' . $row["judge_id"] . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button></td>
                                </tr>  
                                ';
                           }
                           
                           ?>
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
                     <button type="submit" class="btn btn-save">Save  Changes</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-center">

               <form action="" method="POST">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="asset/img/judges.png" width="40"> Judges Information</h5>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="float-left">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name">
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
                                    <label class="float-left">Username</label>
                                    <input type="text" class="form-control" placeholder="Username">
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
      $(function () {
         $("#example1").DataTable();
      });

      $(document).on('click', '.delete', function() {
            var judge_id = $(this).attr('judge_id');
            var action = 'delete';
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure you want to remove a user?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    $.ajax({
                        url: "user_action.php",
                        method: "POST",
                        data: {
                            judge_id: judge_id,
                            action: action
                        },
                        success: function(data) {
                            swal.fire({
                                icon: 'success',
                                title: 'Success.',
                                text: 'Removed Successfully !',
                                type: 'success',
                                showConfirmButton:false,
                                timer: 2000
                            }).then(function() {
                                location.reload("admin_judgeProfile.php");
                            });
                            
                        }
                    })
                }

            });

        });



   </script>
</body>

</html>