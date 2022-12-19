
<?php

//measurement_fetch.php

include('../pdo-connection.php');
date_default_timezone_set('Asia/Manila');

$query = '';

$output = array();

$query .= "SELECT * FROM table_schedule
INNER JOIN table_event on table_schedule.event_id = table_event.event_id
INNER JOIN table_category on table_schedule.category_id = table_category.category_id
";

if (isset($_POST["search"]["value"])) {

    $query .= 'WHERE event_name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR event_date LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY table_schedule.event_id ASC ';
}

if ($_POST['length'] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach ($result as $row) {
    // if(){

    // }
    $date_now = date("Y-m-d");
    $time_now = date("h:i:sa");
    if ($date_now >= $row['event_date']) {
        if ($time_now >= $row['event_time']) {
            $status = '<span class="badge bg-success">Open</span>';
        } else ($status = '<span class="badge bg-danger">close</span>');
    } else ($status = '<span class="badge bg-danger">close</span>');


    $sub_array = array();
    $sub_array[] = $row['category_name'];
    $sub_array[] = $row['event_name'];
    $sub_array[] = $row['event_venue'];
    $sub_array[] = date("M d Y", strtotime($row['event_date']));
    $sub_array[] = date("h:i: A", strtotime($row['event_time']));
    $sub_array[] = date("h:i: A", strtotime($row['end_time']));
    $sub_array[] = $status;


    $sub_array[] = '<center><button type="button" name="view" id="'.$row["sched_id"].'" class="btn btn-primary btn-xs view"  data-toggle="tooltip" data-placement="bottom" title="View Event"><i class="fa fa-eye"></i></button> <button type="button" name="update" id="'.$row["sched_id"].'" class="btn btn-primary btn-xs update" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="fa fa-edit"></i></button> <button type="button" name="delete" id="' . $row["sched_id"] . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button>';
    $data[] = $sub_array;
}

$output = array(
    "draw"            =>    intval($_POST["draw"]),
    "recordsTotal"      =>  $filtered_rows,
    "recordsFiltered"     =>     get_total_all_records($connect),
    "data"                =>    $data
);

function get_total_all_records($connect)
{
    $statement = $connect->prepare("SELECT * FROM table_schedule
    INNER JOIN table_event on table_schedule.event_id = table_event.event_id
    INNER JOIN table_category on table_schedule.category_id = table_category.category_id");
    $statement->execute();
    return $statement->rowCount();
}

echo json_encode($output);

?>