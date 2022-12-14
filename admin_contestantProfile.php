<?php include 'header/admin.php';?>
      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="asset/img/contestant.png" width="40"> Contestants</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contestants</li>
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
                              <th>Full Name</th>
                              <th>Age</th>
                              <th>Gender</th>
                              <th>Course</th>
                              <th>Personal Background</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Jane Smith</td>
                              <td>23</td>
                              <td>Female</td>
                              <td>Course 1</td>
                              <td>Personal Background</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-user-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>Jane Doe</td>
                              <td>24</td>
                              <td>Female</td>
                              <td>Course 2</td>
                              <td>Personal Background</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-user-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>Anne Cortez</td>
                              <td>22</td>
                              <td>Female</td>
                              <td>Course 3</td>
                              <td>Personal Background</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-user-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
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
               <h3>Are you sure want to delete this Contestant?</h3>
               <div class="m-t-20">
                  <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-center">
               <form>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="asset/img/contestant.png" width="40"> Contestants Information</h5>
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
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="float-left">Age</label>
                                    <input type="number" class="form-control" placeholder="Age">
                                 </div>
                              </div><div class="col-md-4">
                                 <div class="form-group">
                                 <label class="float-left">Gender</label>
                                 <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                 </select>
                              </div>
                              </div><div class="col-md-4">
                                 <div class="form-group">
                                 <label class="float-left">Course</label>
                                 <select class="form-control">
                                    <option>Course 1</option>
                                    <option>Course 2</option>
                                    <option>Course 3</option>
                                 </select>
                              </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Personal Background</label>
                                    <textarea class="form-control" placeholder="Personal Background"></textarea>
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
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-center">
               <form>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="asset/img/contestant.png" width="40"> Contestants Information</h5>
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
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="float-left">Age</label>
                                    <input type="number" class="form-control" placeholder="Age">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                 <label class="float-left">Gender</label>
                                 <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                 </select>
                              </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                 <label class="float-left">Course</label>
                                 <select class="form-control">
                                    <option>Course 1</option>
                                    <option>Course 2</option>
                                    <option>Course 3</option>
                                 </select>
                              </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Personal Background</label>
                                    <textarea class="form-control" placeholder="Personal Background"></textarea>
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