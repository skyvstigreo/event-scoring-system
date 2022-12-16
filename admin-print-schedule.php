<?php
include 'pdo-connection.php';
include 'header/admin.php'; ?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/event.png" width="40"> Events Schedule and Venue</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Schedules</li>
               </ol>
            </div>
            <a class="btn btn-sm elevation-4" href="#" onClick="window.print();" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><img src="asset/img/print.png" width="30">
               Print</a>
         </div>
      </div>
   </div>
   <section class="content">
      <div class="container-fluid">
         <div class="card card-info elevation-2">
            <br>
            <div class="col-md-12">
               <table class="table table-bordered">
                  <thead class="btn-cancel" style="background-color: rgb(240,158,65)">
                     <tr>
                        <th>NO.</th>
                        <th>Event Name</th>
                        <th>
                           <table class="table" style="margin: 0;">
                              <tr>
                                 <th class="text-center" colspan="3"> Schedule </th>
                              </tr>
                              <tr>
                                 <td class="text-center">Date</td>
                                 <td class="text-center">Start Time</td>
                                 <td class="text-center">End Time</td>
                              </tr>
                           </table>
                        </th>
                        <th>Venue</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $query = "SELECT * FROM table_event Order by event_date ASC";
                     $statement = $connect->prepare($query);
                     $statement->execute();
                     $result = $statement->fetchAll();
                     $num = 0;
                     foreach ($result as $row) {
                        $num += 1;
                        echo '<tr>
                        <td>' . $num . '</td>
                        <td>' . $row['event_name'] . '</td>
                        <td>
                           <table class="table" style="margin: 0;">
                              <tr>
                                 <td>' . date("M d Y", strtotime($row['event_date'])) . '</td>
                                 <td>' . date("h:i: A", strtotime($row['event_time'])) . '</td>
                                 <td>' . date("h:i: A", strtotime($row['end_time'])) . '</td>
                              </tr>
                           </table>
                        </td>
                        <td>' . $row['event_venue'] . '</td>
                     </tr>';
                     };



                     ?>
                     <!-- <tr>
                                 <td>1</td>
                                 <td>Beauty Contest</td>
                                 <td>
                                    <table class="table" style="margin: 0;">
                                       <tr>
                                          <td>06-23-2021</td>
                                          <td>01:00 PM</td>
                                          <td>05:00 PM</td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td>AVR</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>Pageant</td>
                                 <td>
                                    <table class="table" style="margin: 0;">
                                       <tr>
                                          <td>06-27-2021</td>
                                          <td>03:00 PM</td>
                                          <td>07:00 PM</td>
                                       </tr>
                                    </table>
                                 </td>
                                 <td>Function Hall</td>
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
   $(function() {
      $("#example1").DataTable();
   });
</script>
</body>

</html>