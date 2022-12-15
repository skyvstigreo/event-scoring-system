<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'add_course') {
        $query = "
		INSERT INTO table_course (course_name, course_description) 
		VALUES (:course_name, :course_description)
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':course_name'    =>    $_POST["course_name"],
                ':course_description'    =>    $_POST["course_description"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Course Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_course WHERE course_id = :course_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':course_id'    =>    $_POST["course_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['course_name'] = $row['course_name'];
            $output['course_description'] = $row['course_description'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        $query = "
		UPDATE table_course set course_name = :course_name, course_description = :course_description
		WHERE course_id = :course_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':course_name'    =>    $_POST["course_name"],
                ':course_description'    =>    $_POST["course_description"],
                ':course_id'        =>    $_POST["course_id"]
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Course Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete') {
        $query = "
		DELETE FROM table_course WHERE course_id = :course_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':course_id'    =>    $_POST["course_id"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
