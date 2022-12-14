
<?php include 'header/user.php';?>

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
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="info-box">
                        <table class="table table-striped">
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td><img src="asset/img/avatar.png" width="60"></td>
                                 <td>Jane Smith</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td><img src="asset/img/avatar.png" width="60"></td>
                                 <td>Jane Smith</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="info-box">
                        <img src="asset/img/profile.png" width="200">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="info-box">
                        <table class="table table-bordered">
                           <tbody>
                              <tr>
                                 <td><p>Full Name: </p></td>
                                 <td><p>Jane Smith</p></td>
                              </tr>
                              <tr>
                                 <td><p>Gender: </p></td>
                                 <td><p>Female </p></td>
                              </tr>
                              <tr>
                                 <td><p>Birthday: </p></td>
                                 <td><p>06-23-1995 </p></td>
                              </tr>
                              <tr>
                                 <td><p>Age: </p></td>
                                 <td><p>22 </p></td>
                              </tr>
                              <tr>
                                 <td><p>Course: </p></td>
                                 <td><p>Course 1 </p></td>
                              </tr>
                              <tr>
                                 <td><p>Event Joined: </p></td>
                                 <td><p>Beauty Contest </p></td>
                              </tr>
                           </tbody>
                        </table>
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
$(function () {
   $("#example1").DataTable();
});
</script>
</body>
</html>