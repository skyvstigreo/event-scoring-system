
<?php

//measurement_fetch.php

include('../pdo-connection.php');


$query = '';

$output = array();

$query .= "SELECT * FROM table_category
";

if (isset($_POST["search"]["value"])) {

    $query .= 'WHERE category_name LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR category_description LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY category_id ASC ';
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
    $sub_array[] = $row['category_name'];
    $sub_array[] = $row['category_description'];
    $sub_array[] = '<center><button type="button" name="update" id="'.$row["category_id"].'" class="btn btn-primary btn-xs update" data-toggle="tooltip" data-placement="bottom" title="Edit Category"><i class="fa fa-edit"></i></button> <button type="button" name="delete" id="' . $row["category_id"] . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button>';
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
    $statement = $connect->prepare("SELECT * FROM table_category");
    $statement->execute();
    return $statement->rowCount();
}

echo json_encode($output);

?>