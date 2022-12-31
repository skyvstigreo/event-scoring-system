<?php
include 'pdo-connection.php';
$title = "DESS - Event Criteria";
include 'header/admin.php'; ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><img src="asset/img/criteria.png" width="40"> Event Criteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Event Criteria</li>
                    </ol>
                </div>
                <a class="btn btn-sm elevation-4" href="#" id="add" data-toggle="modal" data-target="#criteria_modal" style="margin-top: 20px;margin-left: 10px;background-color: #981D2D; color:white"><i class="fa fa-plus-square"></i>
                    Add New</a>
            </div>
        </div>
        <span id="alert_action"></span>
    </div>
    <div id="refresh">
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
        <?php
        $query = "SELECT * FROM table_schedule
    INNER JOIN table_event on table_schedule.event_id = table_event.event_id
    INNER JOIN table_category on table_schedule.category_id = table_category.category_id";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $event = $row['event_id'];
            echo '<section class="content">
        <div class="container-fluid">
            <div class="card card-info elevation-2">
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="info-box">
                                <div class="info-box-content">

                                    <span class="info-box-text">
                                        <h5>Event Name: <span>' . $row['event_name'] . '</span></h5>
                                        <h5>Date of Contest: <span> Date</span></h5>
                                        <h5>Start Time: <span> ' . date("h:i: A", strtotime($row['event_time'])) . '</span></h5>
                                        <h5>Event Time: <span> ' . date("h:i: A", strtotime($row['end_time'])) . '</span></h5>
                                        <h5>Venue: <span>' . $row['event_venue'] . '</span></h5>
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
                                    ';
            $query = "SELECT * FROM table_criteria WHERE event_id = $event";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($result as $row) {
                echo '
                                    <tr style="border-collapse: collapse;">
                                        <td style>
                                            <p>' . $row['criteria_name'] . '(' . $row['criteria_percent'] . '%)</p>
                                        </td>
                                        <td>
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <button type="button" name="delete" id="' . $row['criteria_id'] . '" class="btn btn-danger btn-xs delete align-center" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button>
                                                    <button type="button" name="update" id="' . $row["criteria_id"] . '" class="btn btn-primary btn-xs update" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="fa fa-edit"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    ';
            }
            echo '
                                    <tr style="border-collapse: collapse;">
                                        <td>
                                            <p>Total Percentage</p>
                                        </td>
                                        <td>
                                            <div class="col-md-12">
                                                <div class="form-group">';
            $query = "SELECT sum(criteria_percent) as total FROM table_criteria where event_id = $event";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetch();
            $total = $result['total'];
            echo '
                                                     <input type="text" value = "' . $total . '%" class="form-control"  readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     ';
        }
        ?>
    </div>
</div>
</div>



<div id="criteria_modal" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form method="POST" id="criteria_form">
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
                                            <select class="form-control" id="event" name="event" style="cursor: pointer;" required>
                                                <option value="">--- Select Event ---</option>
                                                <?php
                                                $query = "SELECT * FROM table_schedule
                                                INNER JOIN table_event on table_schedule.event_id = table_event.event_id";
                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                foreach ($result as $row) {
                                                    echo '<option value="' . $row["event_id"] . '">' . $row["event_name"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Criteria Name</label>
                                            <input type="text" name="criteria" id="criteria" class="form-control" placeholder="Criteria Name" required>
                                        </div>


                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Percentage</label>
                                            <input type="number" name="percent" id="percent" value="1" min="1" max="100" class="form-control" placeholder="Percentage" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                        <input type="hidden" name="criteria_id" id="criteria_id" />
                        <input type="hidden" name="btn_action" id="btn_action" />
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
    $(document).ready(function() {

        $('#add').on('click', function() {
            $('#criteria_form')[0].reset();
            $('#btn_action').val("add_criteria");
        });
        // $("#example1").DataTable();




        $(document).on('submit', '#criteria_form', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "action/criteria_action.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    $('#criteria_form')[0].reset();
                    $('#criteria_modal').modal('hide');
                    $('#alert_action').fadeIn().html(data);
                    $("#refresh").load(location.href + " #refresh");
                }
            })
        });

        $(document).on('click', '.delete', function() {
            var criteria_id = $(this).attr("id");
            var btn_action = 'delete';
            $.ajax({
                url: "action/criteria_action.php",
                method: "POST",
                data: {
                    criteria_id: criteria_id,
                    btn_action: btn_action
                },
                success: function(data) {
                    $('#alert_action').fadeIn().html(data);
                    $("#refresh").load(location.href + " #refresh");
                }
            })
        });

        $(document).on('click', '.update', function() {
            var criteria_id = $(this).attr("id");
            var btn_action = "fetch_single";
            // alert("hi")
            $.ajax({
                url: "action/criteria_action.php",
                method: "POST",
                data: {
                    criteria_id: criteria_id,
                    btn_action: btn_action
                },
                dataType: "json",
                success: function(data) {
                    $('#btn_action').val("edit");
                    $('#criteria_modal').modal('show');
                    $('#event').val(data.event_id);
                    $('#criteria').val(data.criteria_name);
                    $('#percent').val(data.criteria_percent);
                    // $('#category_description').val(data.category_description);
                    $('#criteria_id').val(criteria_id);

                }
            })
        });




    });
</script>
</body>

</html>