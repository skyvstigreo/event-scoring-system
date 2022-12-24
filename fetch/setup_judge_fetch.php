
<?php

//measurement_fetch.php

include('../pdo-connection.php');


$query = '';

$output = array();

$query .= "SELECT *, table_user.event_id AS event FROM table_user
LEFT JOIN table_event ON table_user.event_id = table_event.event_id
WHERE table_user.event_id != 0
";

if (isset($_POST["search"]["value"])) {
    $query .= 'AND name LIKE "%' . $_POST["search"]["value"] . '%" ';
    // $query .= 'OR event_name LIKE "%' . $_POST["search"]["value"] . '%" ';

}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY user_id ASC ';
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
    $sub_array = array();
    $sub_array[] = '<center>' . $row['name'] .'<center>' ;
    $sub_array[] = '<center>' . $row['event_name'] . '<center>' ;
    $sub_array[] = '<center><button type="button" name="update" id="' . $row["user_id"] . '" class="btn btn-primary btn-xs update" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="fa fa-edit"></i></button> <button type="button" name="delete" id="' . $row["user_id"] . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button>';
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
    $statement = $connect->prepare("SELECT *, table_user.event_id AS event FROM table_user
    LEFT JOIN table_event ON table_user.event_id = table_event.event_id
    WHERE table_user.event_id != 0");
    $statement->execute();
    return $statement->rowCount();
}

echo json_encode($output);

?>