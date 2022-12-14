<?php
include('connection.php');

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'delete') {
        $query = "
		DELETE FROM table_judge WHERE judge_id = :judge_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':judge_id'        =>    $_POST["judge_id"]
            )
        );
    }
}
