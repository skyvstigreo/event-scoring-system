<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'add_user') {
        $query = "
		INSERT INTO table_user (user_type, first_name, middle_name, last_name, achievement,status, username, password) 
		VALUES (:user_type, :first_name, :middle_name, :last_name, :achievement, :status, :username, :password)
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_type'    =>    '1',
                ':first_name'    =>    $_POST["fname"],
                ':middle_name'    =>    $_POST["mname"],
                ':last_name'    =>    $_POST["lname"],
                ':achievement'    =>    $_POST["achievement"],
                ':status'    =>    '0',
                ':username' =>  $_POST["uname"],
                ':password' => password_hash($_POST["password"], PASSWORD_DEFAULT)
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'User Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_user WHERE user_id = :user_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':user_id'    =>    $_POST["user_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['first_name'] = $row['first_name'];
            $output['middle_name'] = $row['middle_name'];
            $output['last_name'] = $row['last_name'];
            $output['achievement'] = $row['achievement'];
            $output['user_name'] = $row['username'];
            $output['password'] = password_verify('admin123', $row['password']);
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        if (empty($_POST['password'])) {
            $query = "
            UPDATE table_user set first_name = :first_name, middle_name = :middle_name, last_name = :last_name,
            achievement = :achievement, username = :username
            WHERE user_id = :user_id
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':first_name'    =>    $_POST["fname"],
                    ':middle_name'    =>    $_POST["mname"],
                    ':last_name'    =>    $_POST["lname"],
                    ':achievement'    =>    $_POST["achievement"],
                    ':username' =>  $_POST["uname"],
                    ':user_id' =>  $_POST["user_id"],
                )
            );
        } else {
            $query = "
            UPDATE table_user set first_name = :first_name, middle_name = :middle_name, last_name = :last_name,
            achievement = :achievement, username = :username, password = :password
            WHERE user_id = :user_id
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    ':first_name'    =>    $_POST["fname"],
                    ':middle_name'    =>    $_POST["mname"],
                    ':last_name'    =>    $_POST["lname"],
                    ':achievement'    =>    $_POST["achievement"],
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
}
