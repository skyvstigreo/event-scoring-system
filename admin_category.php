<?php
include 'mysqli-connection.php';
include 'header/admin.php';



?>
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/event.png" width="40"> Events Category</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#category_modal" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i class="fa fa-plus-square"></i>
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
               <table id="category_table" class="table">
                  <thead class="btn-cancel">
                     <tr>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>

                     <!-- <tr>
                              <td>Cultural</td>
                              <td>Cultural Descriptions</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>Arts</td>
                              <td>Arts Descriptions</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>Academic</td>
                              <td>Academic Descriptions</td>
                              <td class="text-center">
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
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body text-center">
            <img src="asset/img/sent.png" alt="" width="50" height="46">
            <h3>Are you sure want to delete this Category?</h3>
            <div class="m-t-20">
               <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
               <button type="submit" class="btn btn-danger">Delete</button>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="editCategory" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Category Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Category Name</label>
                                 <input type="text" class="form-control" placeholder="Category Name">
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
<div id="category_modal" class="modal animated rubberBand delete-modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body text-center">
            <form method="POST" id="category_form">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-header">
                           <h5><img src="asset/img/event.png" width="40"> Category Information</h5>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Category Name</label>
                                 <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name" required>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="float-left">Description</label>
                                 <textarea name="category_description" id="category_description" class="form-control" placeholder="Descriptions" required></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                  <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                  <input type="hidden" name="category_id" id="category_id" />
                  <input type="hidden" name="btn_action" id="btn_action" value="add_category" />
                  <button type="submit" id="submit" class="btn btn-save">Save</button>
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
      // var table = $("#category_table").DataTable();

      var categorydataTable = $('#category_table').DataTable({
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax": {
            url: "fetch/category_fetch.php",
            type: "POST"
         },
         "columnDefs": [{
            "targets": [0, 1, 2],
            "orderable": false,
         }, ],
         "pageLength": 9999999
      });

      $(document).on('submit', '#category_form', function(event) {
         event.preventDefault();
         var form_data = $(this).serialize();
         $.ajax({
            url: "action/category_action.php",
            method: "POST",
            data: form_data,
            success: function(data) {
               $('#category_form')[0].reset();
               $('#category_modal').modal('hide');
               $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
               categorydataTable.ajax.reload();
            }
         })
      });

      $(document).on('click', '.delete', function() {
         var category_id = $(this).attr("id");
         var btn_action = 'delete';
         $.ajax({
            url: "action/category_action.php",
            method: "POST",
            data: {
               category_id: category_id,
               btn_action: btn_action
            },
            success: function(data) {
               $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
               categorydataTable.ajax.reload();
            }
         })
      });

      $(document).on('click', '.update', function() {
         var category_id = $(this).attr("id");
         var btn_action = "fetch_single";
         // alert("hi")
         $.ajax({
            url: "action/category_action.php",
            method: "POST",
            data: {
               category_id: category_id,
               btn_action: btn_action
            },
            dataType: "json",
            success: function(data) {

               $('#submit').text("Save Changes");
               $('#btn_action').val("edit");
               $('#category_modal').modal('show');
               $('#category_name').val(data.category_name);
               $('#category_description').val(data.category_description);
               $('#category_id').val(category_id);

            }
         })
      });




   });
</script>
</body>

</html>