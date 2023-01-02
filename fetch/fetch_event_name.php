<?php
include '../pdo-connection.php';

$query = "SELECT * FROM table_event WHERE category_id = :category_id AND archive != '1'";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':category_id'    =>    $_POST["category_id"]
    )
);
$result = $statement->fetchAll();
foreach ($result as $row) {
    echo '<option value="' . $row["event_id"] . '">' . $row["event_name"] . '</option>';
}
