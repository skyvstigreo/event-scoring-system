<?php

$title = "DESS - Event Criteria";
include 'header/admin.php';?>

     
     <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="asset/img/criteria.png" width="40"> Event Criteria (Gagawing Card)</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Criteria</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#add"
                     style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i
                        class="fa fa-plus-square"></i>
                     Add New</a>
               </div>
            </div>
         </div>

         <!-- <section class="content">
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12">
                     <table id="example1" class="table">
                        <thead class="btn-cancel">
                           <tr>
                              <th>Event Name</th>
                              <th>Criteria Name</th>
                              <th>Percentage</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Cultural</td>
                              <td>Criteria 1</td>
                              <td><span class="badge bg-warning">75%</span></td>
                              <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                                 </td>
                           </tr>
                           <tr>
                              <td>Arts</td>
                              <td>Criteria 2</td>
                              <td><span class="badge bg-danger">35%</span></td>
                              <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                                 </td>
                           </tr>
                           <tr>
                              <td>Academics</td>
                              <td>Criteria 3</td>
                              <td><span class="badge bg-success">100%</span></td>
                              <td class="text-center">
                                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                                 </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section> -->

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
                                       <h5>Event Name: <span> Beauty Contest</span></h5>
                                <h5>Date of Contest: <span> Date</span></h5>
                                <h5>Time: <span> Time</span></h5>
                                <h5>Venue: <span> Gymn</span></h5>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="info-box">
                            <div class="content-header bg-warning">
                            </div>
                            <table class="table">
                                <thead class="btn-cancel">
                                    <tr>
                                        <th>Criteria</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tr style="border-collapse: collapse;">
                                    <td style>
                                        <p>Q and A (50%)</p>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <button type="button" name="delete" id="" class="btn btn-danger btn-xs delete align-center" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="border-collapse: collapse;">
                                    <td>
                                        <p>Swimsuit (50%)</p>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <!-- <button type="button" class="form-control" placeholder="Percentage">Delete</button> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="border-collapse: collapse;">
                                    <td>
                                        <p>Total Percentage</p>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <!-- <input type="text" class="form-control" placeholder="100 %" readonly=""> -->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">

                                <!-- <button type="submit" class="btn btn-info">Save</button> -->
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#edit"> 
                        <i class="fa fa-plus-square"></i> Edit
                     </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                    <h5><img src="asset/img/criteria.png" width="40"> Event Criteria Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Event Name</label>
                                            <select class="form-control">
                                    <option>Cultural</option>
                                    <option>Arts</option>
                                    <option>Academic</option>
                                 </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Criteria Name</label>
                                            <select class="form-control">
                                    <option>Criteria 1</option>
                                    <option>Criteria 2</option>
                                    <option>Criteria 3</option>
                                 </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Percentage</label>
                                            <input type="number" class="form-control" placeholder="Percentage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <!-- <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a> -->
                        <button type="submit" class="btn btn-cancel">Cancel</button>
                        <button type="submit" class="btn btn-save">Update</button>
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
                                    <h5><img src="asset/img/criteria.png" width="40"> Event Criteria Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Event Name</label>
                                            <select class="form-control">
                                    <option>Cultural</option>
                                    <option>Arts</option>
                                    <option>Academic</option>
                                 </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Criteria Name</label>
                                            <input type="text" class="form-control" placeholder="Criteria Name">
                                        </div>


                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Percentage</label>
                                            <input type="text" class="form-control" placeholder="Percentage">
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
    $(function() {
        $("#example1").DataTable();
    });
</script>
</body>

</html>