<?php
$title = "DESS - Contestant Profile ";
include 'pdo-connection.php';
include 'header/admin.php'; ?>

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
                <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#contestant_modal" id="add" style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i class="fa fa-user-plus"></i>
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
                    <table id="contestant_table" class="table">
                        <thead class="btn-cancel">
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Age</th>
                                <th>Course</th>
                                <th>Event Joined</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
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
<div id="contestant_modal" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form method="POST" id="contestant_form">
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
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="float-left">Middle Name</label>
                                            <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="float-left">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="float-left">Gender</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--- Select Gender ---</option>
                                                <option>Male</option>
                                                <option>Female </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="float-left">Birthdate</label>
                                            <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Middle Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="float-left">Age</label>
                                            <input type="number" name="age" id="age" class="form-control" placeholder="Age">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="float-left">Course</label>
                                            <select class="form-control" id="course" name="course" style="cursor: pointer;" required>
                                                <option value="">--- Select Course ---</option>
                                                <?php
                                                $query = "SELECT * FROM table_course";
                                                $statement = $connect->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                foreach ($result as $row) {
                                                    echo '<option value="' . $row["course_id"] . '">' . $row["course_name"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="float-left">Event Joined</label>
                                            <select class="form-control" id="event" name="event" style="cursor: pointer;" required>
                                                <option value="">--- Select Event---</option>
                                                <?php
                                                $query = "SELECT * FROM table_event";
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


                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                        <input type="hidden" name="contestant_id" id="contestant_id" />
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
            $('#contestant_form')[0].reset();
            $('#btn_action').val("add_contestant");
        });


        $(document).on('submit', '#contestant_form', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "action/contestant_action.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                    $('#contestant_form')[0].reset();
                    $('#contestant_modal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
                    contestantdataTable.ajax.reload();
                }
            })
        });

        var contestantdataTable = $('#contestant_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "fetch/contestant_fetch.php",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 1, 2, 3],
                "orderable": false,
            }, ],
            "pageLength": 9999999
        });




        $(document).on('click', '.delete', function() {
            var contestant_id = $(this).attr("id");
            var btn_action = 'delete';
            $.ajax({
                url: "action/contestant_action.php",
                method: "POST",
                data: {
                    contestant_id: contestant_id,
                    btn_action: btn_action
                },
                success: function(data) {
                    $('#alert_action').fadeIn().html('<div class="alert alert-danger">' + data + '</div>');
                    contestantdataTable.ajax.reload();
                }
            })
        });

        $(document).on('click', '.update', function() {
            var contestant_id = $(this).attr("id");
            var btn_action = "fetch_single";
            // alert("hi")
            $.ajax({
                url: "action/contestant_action.php",
                method: "POST",
                data: {
                    contestant_id: contestant_id,
                    btn_action: btn_action
                },
                dataType: "json",
                success: function(data) {
                    $('#btn_action').val("edit");
                    $('#contestant_modal').modal('show');
                    $('#fname').val(data.first_name);
                    $('#mname').val(data.middle_name);
                    $('#lname').val(data.last_name);
                    $('#gender').val(data.gender);
                    $('#birthdate').val(data.birthday);
                    $('#age').val(data.age);
                    $('#course').val(data.course);
                    $('#event').val(data.event);
                    $('#contestant_id').val(contestant_id);

                }
            })
        });


    });
</script>
</body>

</html>