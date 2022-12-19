<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'add_criteria') {
        $event = $_POST['event'];
        $query = "SELECT sum(criteria_percent) as total FROM table_criteria where event_id = $event";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        $total = $result['total'];
        $total += $_POST["percent"];
        if ($total > 100) {
            echo '<div class="alert alert-danger"> Warning percentage exceeded <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        } else {
            $query = "
        INSERT INTO table_criteria(event_id, criteria_name, criteria_percent) 
        VALUES (:event_id, :criteria_name, :percentage)
        ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':event_id'    =>    $_POST["event"],
                    ':criteria_name'    =>    $_POST["criteria"],
                    ':percentage'    =>    $_POST["percent"],
                )
            );
            $result = $statement->fetchAll();
            if (isset($result)) {
                echo '<div class="alert alert-success">Criteria Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
        }
    }
}

if ($_POST['btn_action'] == 'fetch_single') {
    $query = "SELECT * FROM table_criteria
    INNER JOIN table_event on table_criteria.event_id = table_event.event_id
    WHERE criteria_id = :criteria_id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':criteria_id'    =>    $_POST["criteria_id"]
        )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['event_id'] = $row['event_id'];
        $output['criteria_name'] = $row['criteria_name'];
        $output['criteria_percent'] = $row['criteria_percent'];
    }
    echo json_encode($output);
}

if ($_POST['btn_action'] == 'edit') {
    // $event = $_POST['event'];
    // $query = "SELECT sum(criteria_percent) as total FROM table_criteria where event_id = $event";
    // $statement = $connect->prepare($query);
    // $statement->execute();
    // $result = $statement->fetch();
    // $total = $result['total'];
    // $total += $_POST["percent"];
    // if ($total > 100) {
    //     echo '<div class="alert alert-danger"> Warning percentage exceeded <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    // } else {
    $query = "
        UPDATE table_criteria set event_id = :event_id, criteria_name = :criteria_name, criteria_percent = :percentage
        WHERE criteria_id = :criteria_id
        ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':event_id'    =>    $_POST["event"],
            ':criteria_name'    =>    $_POST["criteria"],
            ':percentage'    =>    $_POST["percent"],
            ':criteria_id'        =>    $_POST["criteria_id"]
        )
    );

    $result = $statement->fetchAll();
    if (isset($result)) {
        echo '<div class="alert alert-success">Criteria Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    // }
}


if ($_POST['btn_action'] == 'delete') {
    $query = "
    DELETE FROM table_criteria WHERE criteria_id = :criteria_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':criteria_id'    =>    $_POST["criteria_id"],
        )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
        echo '<div class="alert alert-danger">Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}
