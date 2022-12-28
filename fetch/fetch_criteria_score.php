<?php
include '../pdo-connection.php';

$query = "SELECT * FROM table_criteria_score
INNER JOIN table_criteria on table_criteria_score.criteria_id = table_criteria.criteria_id
WHERE contestant_id = :contestant_id and table_criteria_score.event_id = :event_id and judge_id = :judge_id";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':event_id'    =>    $_POST["event_id"],
        ':contestant_id'    =>    $_POST["contestant_id"],
        ':judge_id'    =>    $_POST["judge_id"]
    )
);
$result = $statement->fetchAll();
foreach ($result as $row) {
    echo '  <tr class="text-center">
    <td>' . $row['criteria_name'] . '</td>
    <td>' . $row['score'] . '</td>

 </tr>';
}
