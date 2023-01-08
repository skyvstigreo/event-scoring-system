<?php
include '../pdo-connection.php';

$query = "SELECT *, table_event.event_id as event FROM table_event 
LEFT JOIN table_schedule on table_event.event_id = table_schedule.event_id
WHERE table_event.category_id = :category_id AND sched_id IS NULL";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':category_id'    =>    $_POST["category_id"]
    )
);
$result = $statement->fetchAll();

foreach ($result as $row) {
    echo '<option value="' . $row["event"] . '">' . $row["event_name"] . '</option>';
}
