<?php
$title = "DESS - Scores";
include 'pdo-connection.php';
include 'header/admin.php'; ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><img src="asset/img/score.png" width="40"> Event Result</h1>
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
                <div>
                    <br>
                    <a class="btn btn-sm elevation-4" onClick="window.print();" style="margin-left: 8px;background-color: rgb(240,158,65)"><img src="asset/img/print.png" width="20">
                        Print</a>
                    <a class="btn btn-sm elevation-4"  style="margin-left: 8px;background-color: rgb(240,158,65)">
                    Add to Archive</a>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Contest Name: <span></span></h5>
                                        <h6>Date of Contest: <span> </span></h6>
                                        <h6>Venue: <span></span></h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5>Score Event Rank <span></span></h5>

                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Contestant Name</th>
                                <th>Event Name</th>
                                <th>Total Scores</th>
                                <th>Rank</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>Math Contest</td>
                                <td>90</td>
                                <td>1</td>

                            </tr>

                            <tr>
                                <td>Tigang</td>
                                <td>Math Contest</td>
                                <td>80</td>
                                <td>2</td>

                            </tr>



                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                    <div class="info-box-content">
                        <span class="info-box-text">
                            <h5>Tally Sheets <span></span></h5>

                            <table id="tally" class="table table-striped table-bordered " data-paging='false' style="width:100%">
                        <thead>
                            <tr>
                                <th>Judge</th>
                                <th>Contestant Name</th>
                                <th>Event Name</th>
                                <th>Criteria 1</th>
                                <th>Criteria 2</th>
                                <th>Criteria 3</th>
                                <th>Overall Score</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Judge 1</td>
                                <td>Tiger Nixon</td>
                                <td>Math Contest</td>
                                <td>20</td>
                                <td>50</td>
                                <td>20</td>
                                <td>90</td>

                            </tr>

                            <tr>
                                <td>Judge 2</td>
                                <td>Tiger Nixon</td>
                                <td>Math Contest</td>
                                <td>20</td>
                                <td>50</td>
                                <td>20</td>
                                <td>90</td>

                            </tr>

                            <tr>
                                <td>Judge 1</td>
                                <td>Tigang</td>
                                <td>Math Contest</td>
                                <td>20</td>
                                <td>50</td>
                                <td>20</td>
                                <td>90</td>

                            </tr>

                            <tr>
                                <td>Judge 2</td>
                                <td>Tigang</td>
                                <td>Math Contest</td>
                                <td>20</td>
                                <td>50</td>
                                <td>20</td>
                                <td>90</td>

                            </tr>




                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                            
                        </span>
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
        $("#tally").DataTable();
    });
</script>
</body>

</html>