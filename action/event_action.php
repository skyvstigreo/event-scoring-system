<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {


    if ($_POST['btn_action'] == 'view') {

        $query = "SELECT * FROM table_event WHERE event_id = :event_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["event_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['event_name'] = $row['event_name'];
            $output['event_type'] = $row['event_type'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'add_event') {

        $query = "
		INSERT INTO table_schedule(event_id, category_id, event_venue, event_date, event_time, end_time) 
		VALUES (:event_id, :category_id, :event_venue,  :event_date, :event_time, :end_time)
		";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["event"],
                ':category_id'    =>    $_POST["type"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_date'    =>    $_POST["date"],
                ':event_time'    =>    $_POST["time"],
                ':end_time'     => $_POST["end_time"]
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'An event is added Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_schedule
        INNER JOIN table_event on table_schedule.event_id = table_event.event_id
        INNER JOIN table_category on table_schedule.category_id = table_category.category_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':sched_id'    =>    $_POST["sched_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['event_type'] = $row['category_id'];
            $output['event_name'] = $row['event_id'];
            $output['event_venue'] = $row['event_venue'];
            $output['event_date'] = $row['event_date'];
            $output['event_time'] = $row['event_time'];
            $output['end_time'] = $row['end_time'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {

        $query = "
		UPDATE table_schedule set event_id = :event_id, category_id = :category_id,
        event_venue = :event_venue, event_date = :event_date,
        event_time = :event_time, end_time = :end_time 
        WHERE sched_id = :sched_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
               
                ':category_id'    =>    $_POST["type"],
                ':event_id'    =>    $_POST["event"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_date'    =>    $_POST["date"],
                ':event_time'    =>    $_POST["time"],
                ':end_time'     => $_POST["end_time"],
                ':sched_id' =>  $_POST["sched_id"]
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Event Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }



    if ($_POST['btn_action'] == 'delete') {
        $query = "
		DELETE FROM table_event WHERE event_id = :event_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["event_id"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
