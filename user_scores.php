<?php
$title = "DESS - Score";
include 'pdo-connection.php';
include 'header/user.php';
// if (empty($_SESSION['username'])) {
//    header("Location: index.php");
// } else ($uid = $_SESSION['user_id']);

?>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="asset/img/score.png" width="40"> Scores</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Scores</li>
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
                              <h5>Event Name: <span> Beauty Contest</span></h5>
                              <h5>Date of Contest <span> Date</span></h5>
                              <h5>Start Time <span> Date</span></h5>
                              <h5>Event Time <span> Date</span></h5>
                              <h5>Venue: <span> Location</span></h5>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="info-box">
                        <table class="table">
                           <thead class="btn-cancel" style="background-color: rgb(240,158,65)">
                              <tr>

                                 <th>Contestant Name</th>
                                 <th>Action</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Jane Smith</td>
                                 <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>View</a>

                                       </tr>
                                    </table>
                                 </td>

                                 </td>
                              </tr>
                              <tr>
                                 <td>Jane Doe</td>
                                 <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>View</a>
                                       </tr>
                                    </table>
                                 </td>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="info-box content-header">
                        <h5>Jane Smith</h5>

                     </div>
                     <div class="info-box">
                        <div class="content-header bg-warning">
                        </div>
                        <table class="table">
                           <thead class="btn-cancel">
                              <tr>
                                 <th>Criteria</th>
                                 <th>Score</th>
                              </tr>
                           </thead>
                           <tr style="border-collapse: collapse;">
                              <td>
                                 <p>Q and A (50%)</p>
                              </td>
                              <td>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Score">
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
                                       <input type="text" class="form-control" placeholder="Score">
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr style="border-collapse: collapse;">
                              <td>
                                 <p>Total Score</p>
                              </td>
                              <td>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="100" readonly="">
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </table>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">

                           <button type="submit" class="btn btn-info">Submit Score</button>
                           <button type="submit" class="btn">Edit Score</button>
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