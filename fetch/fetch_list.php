<?php
include '../pdo-connection.php';

$query = "SELECT * FROM table_event WHERE category_id = :category_id";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':category_id'    =>    $_POST["category_id"]
    )
);
$result = $statement->fetchAll();
foreach ($result as $row) {
    echo '  <tr class="text-center">
    <td>'.$row['event_name'].'</td>
    <td><button type="button" name="update_event" id="'.$row["event_id"].'" class="btn btn-primary btn-xs update_name" data-toggle="tooltip" data-category="'.$row['category_id'].'" data-placement="bottom" title="Edit Category"><i class="fa fa-edit"></i></button> <button type="button" name="delete_event" id="' . $row["event_id"] . '" class="btn btn-danger btn-xs delete_event" data-toggle="tooltip" data-placement="bottom" title="Remove User"><i class="fa fa-trash"></i></button></td>

 </tr>';
}
