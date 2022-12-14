<?php include 'header/admin.php';?>


<div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><img src="asset/img/score.png" width="40"> Contest Result</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Course</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
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
                                       <h5>Contest Name: <span> Beauty Contest</span></h5>
                                       <h6>Date of Contest: <span> 06-25-2021</span></h6>
                                       <h6>Venue: <span> AVR</span></h6>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <table class="table table-bordered">
                           <thead class="btn-cancel"style="background-color: rgb(240,158,65)">
                              <tr>
                                 <th>Contestant Name</th>
                                 <th>
                                    <table class="table" style="margin: 0;">
                                       <tr>
                                          <th class="text-center" colspan="2"> Category </th>
                                       </tr>
                                       <tr>
                                          <td>Q and A (50%)</td>
                                          <td>Swimsuit (50%)</td>
                                       </tr>
                                    </table>
                                 </th>
                                 <th>Total Score</th>
                                 <th class="text-center">Rank</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Jane Smith</td>
                                 <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <td>50.00</td>
                                          <td>50.00</td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td>100.00</td>
                                 <td class="bg-success">Rank 1</td>
                              </tr>
                              <tr>
                                 <td>Jane Doe</td>
                                 <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <td>50.00</td>
                                          <td>45.00</td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td>95.00</td>
                                 <td class="bg-info">Rank 2</td>
                              </tr>
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
      <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><img src="asset/img/course.png" width="40"> Course Information</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Course Name</label>
                                       <input type="text" class="form-control" placeholder="Course Name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Description</label>
                                       <textarea class="form-control" placeholder="Descriptions"></textarea>
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
      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><img src="asset/img/course.png" width="40"> Course Information</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Course Name</label>
                                       <input type="text" class="form-control" placeholder="Course Name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Description</label>
                                       <textarea class="form-control" placeholder="Descriptions"></textarea>
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
      <script>
         $(function () {
            $("#example1").DataTable();
         });
      </script>
   </body>
</html>