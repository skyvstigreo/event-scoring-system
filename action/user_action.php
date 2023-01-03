<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'add_user') {
        $query = "
		INSERT INTO table_user (user_type, name, username, password) 
		VALUES (:user_type, :name, :username, :password)
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_type'    =>    '1',
                ':name'    =>    $_POST["name"],
                ':username' =>  $_POST["uname"],
                ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT)
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'User Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'add_event') {
        $query = "
		UPDATE table_user set event_id = :event_id
        WHERE user_id = :judge_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>   $_POST["event_id"],
                ':judge_id'    =>    $_POST["judge_id"],

            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Judge Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_user 
        LEFT JOIN table_event on table_user.event_id = table_event.event_id
        WHERE user_id = :user_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_id'    =>    $_POST["user_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['name'] = $row['name'];
            $output['user_name'] = $row['username'];
            $output['user_id'] = $row['user_id'];
            $output['event_id'] = $row['event_id'];
            $output['password'] = password_verify('admin123', $row['password']);
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        if (empty($_POST['password'])) {
            $query = "
            UPDATE table_user set name = :name, username = :username
            WHERE user_id = :user_id
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':name'    =>    $_POST["name"],
                    ':username' =>  $_POST["uname"],
                    ':user_id' =>  $_POST["user_id"],
                )
            );
        } else {
            $query = "
            UPDATE table_user set name = :name, username = :username, password = :password
            WHERE user_id = :user_id
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':name'    =>    $_POST["name"],
                    ':username' =>  $_POST["uname"],
                    ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
                    ':user_id' =>  $_POST["user_id"],
                )
            );
        }




        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Course Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete') {
        $query = "
		DELETE FROM table_user WHERE user_id = :user_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_id'    =>    $_POST["user_id"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete_status') {
        $query = "
        UPDATE table_user set event_id = :event_id
    	WHERE user_id = :user_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_id'    =>    $_POST["judge_id"],
                ':event_id' => '0'
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Removed Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'edit') {
        $query = "
            UPDATE table_user set event_id = :event_id
            WHERE user_id = :user_id
            ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["eid"],
                ':user_id' =>  $_POST["jid"],
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Event Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
