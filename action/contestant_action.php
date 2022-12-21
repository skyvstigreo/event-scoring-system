<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    
    if ($_POST['btn_action'] == 'add_participant') {
        $query = "
        UPDATE table_contestant set event_id = :event_id, status = :status
    	WHERE contestant_id = :contestant_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant_id"],
                ':event_id' => $_POST["event_id"],
                ':status' => "1",
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Participant has been set <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'add') {
        $query = "
        UPDATE table_contestant set event_id = :event_id, status = :status
    	WHERE contestant_id = :contestant_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant"],
                ':event_id' => $_POST["event"],
                ':status' => $_POST["status"]
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Event has been set <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_contestant WHERE contestant_id = :contestant_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['first_name'] = $row['first_name'];
            $output['middle_name'] = $row['middle_name'];
            $output['last_name'] = $row['last_name'];
            $output['gender'] = $row['gender'];
            $output['course'] = $row['course_id'];
            $output['event'] = $row['event_id'];
        }
        echo json_encode($output);
    }
    if ($_POST['btn_action'] == 'fetch_event') {
        $query = "SELECT * FROM table_contestant 
        INNER JOIN table_course ON table_contestant.course_id = table_course.course_id
        INNER JOIN table_event ON table_contestant.event_id = table_event.event_id
        WHERE contestant_id = :contestant_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['contestant'] = $row['contestant_id'];
            $output['event'] = $row['event_id'];
            $output['status'] = $row['status'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        $query = "
    	UPDATE table_contestant set first_name = :first_name, middle_name = :middle_name, 
        last_name = :last_name, gender = :gender, course_id = :course
    	WHERE contestant_id = :contestant_id
    	";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':first_name'    =>    $_POST["fname"],
                ':middle_name'    =>    $_POST["mname"],
                ':last_name'    =>    $_POST["lname"],
                ':gender'    =>    $_POST["gender"],
                ':course'    =>    $_POST["course"],
                ':contestant_id'    =>    $_POST["contestant_id"],
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Contestant Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete') {
        $query = "
		DELETE FROM table_contestant WHERE contestant_id = :contestant_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant_id"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete_status') {
        $query = "
        UPDATE table_contestant set status = :status, event_id = :event_id
    	WHERE contestant_id = :contestant_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':contestant_id'    =>    $_POST["contestant_id"],
                ':status' => '0',
                ':event_id' => '0'
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Removed Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
