<?php include 'header/user.php';?>

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
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="info-box">
                                 <table class="table"><thead class="btn-cancel"style="background-color: rgb(240,158,65)">
                              <tr>
                                 
                                 <th>Contestant</th>
                                 <th>Scores</th>
                                 <th>Total</th>
                                 <th>Edit</th>
                              </tr>
                           </thead>
                                    <tbody>
                                       <tr>                                          <td><img src="asset/img/avatar.png" width="60"></td>
                                          <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <td>50.00</td>
                                          <td>50.00</td>
                                       </tr>
                                    </table>
                                 </td>

                                          <td>Jane Smith</td>
                                          <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> edit</a>
                              </td>
                                       </tr>
                                       <tr>                                          <td><img src="asset/img/avatar.png" width="60"></td>
                                          <td>
                                    <table class="table">
                                       <tr style="border-collapse: collapse;">
                                          <td>50.00</td>
                                          <td>50.00</td>
                                       </tr>
                                    </table>
                                 </td>

                                          <td>Jane Doe</td>
                                          <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> edit</a>
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
                                          <td><p>Q and A (50%)</p></td>
                                          <td><div class="col-md-12">
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Score">
                              </div>
                           </div></td>
                                       </tr>
                                       <tr style="border-collapse: collapse;">
                                          <td><p>Swimsuit (50%)</p></td>
                                          <td><div class="col-md-12">
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Score">
                              </div>
                           </div></td>
                                       </tr>
                                       <tr style="border-collapse: collapse;">
                                          <td><p>Total Score</p></td>
                                          <td><div class="col-md-12">
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="100" readonly="">
                              </div>
                           </div></td>
                                       </tr>
                                    </table>
                              </div>
                              <div class="col-md-12">
                              <div class="form-group">
                                 
                     <button type="submit" class="btn btn-info">Submit Score</button>
                     <button type="submit" class="btn">Update Score</button>
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
         $(function () {
            $("#example1").DataTable();
         });
      </script>
   </body>
</html>
