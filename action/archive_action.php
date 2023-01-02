<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {

    if ($_POST['btn_action'] == 'archive') {

        $query = "
        UPDATE table_event set archive = :archive
        WHERE event_id = :event_id
        ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(

                ':archive'    =>    "1",
                ':event_id'    =>    $_POST["event_id"],

            )
        );

        $query = "
		UPDATE table_user set event_id = :event_update
        WHERE event_id = :event_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(

                ':event_update'    =>    "0",
                ':event_id'    =>    $_POST["event_id"],

            )
        );

        $query = "
		UPDATE table_contestant set event_id = :event_update, status = :status
        WHERE event_id = :event_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(

                ':event_update'    =>    "0",
                ':status'    =>    "0",
                ':event_id'    =>    $_POST["event_id"],

            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Event Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
