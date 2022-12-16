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
		INSERT INTO table_event(event_name, event_type, event_description, event_venue, event_organizer, event_date, event_time, end_time) 
		VALUES (:event_name, :event_type, :event_description, :event_venue, :event_organizer, :event_date, :event_time, :end_time)
		";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_name'    =>    $_POST["event_name"],
                ':event_type'    =>    $_POST["type"],
                ':event_description'    =>    $_POST["description"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_organizer'    =>    $_POST["organizer"],
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
            $output['event_description'] = $row['event_description'];
            $output['event_venue'] = $row['event_venue'];
            $output['event_organizer'] = $row['event_organizer'];
            $output['event_date'] = $row['event_date'];
            $output['event_time'] = $row['event_time'];
            $output['end_time'] = $row['end_time'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {

        $query = "
		UPDATE table_event set event_name = :event_name, event_type = :event_type,
        event_description = :event_description, event_venue = :event_venue, event_organizer = :event_organizer,
        event_date = :event_date, event_time = :event_time, end_time = :end_time WHERE event_id = :event_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_name'    =>    $_POST["event_name"],
                ':event_type'    =>    $_POST["type"],
                ':event_description'    =>    $_POST["description"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_organizer'    =>    $_POST["organizer"],
                ':event_date'    =>    $_POST["date"],
                ':event_time'    =>    $_POST["time"],
                ':event_id'    =>    $_POST["event_id"],
                ':end_time'     => $_POST["end_time"]
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
