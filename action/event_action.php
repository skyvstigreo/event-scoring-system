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
        $target_dir = "../profiles/";
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (move_uploaded_file($fileTmpPath, $target_file)) {
            $message = 'File is successfully uploaded.';
        } else {
            $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }


        $query = "
		INSERT INTO table_event(event_name, event_type, event_image, event_description, event_venue, event_organizer, event_date, event_time) 
		VALUES (:event_name, :event_type, :event_image, :event_description, :event_venue, :event_organizer, :event_date, :event_time)
		";

        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_name'    =>    $_POST["event_name"],
                ':event_type'    =>    $_POST["type"],
                ':event_image'    =>    basename($_FILES["img"]["name"]),
                ':event_description'    =>    $_POST["description"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_organizer'    =>    $_POST["organizer"],
                ':event_date'    =>    $_POST["date"],
                ':event_time'    =>    $_POST["time"],
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
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        $target_dir = "../profiles/";
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (move_uploaded_file($fileTmpPath, $target_file)) {
            $message = 'File is successfully uploaded.';
        } else {
            $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }

        $query = "
		UPDATE table_event set event_name = :event_name, event_type = :event_type, event_image = :event_image,
        event_description = :event_description, event_venue = :event_venue, event_organizer = :event_organizer,
        event_date = :event_date, event_time = :event_time WHERE event_id = :event_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_name'    =>    $_POST["event_name"],
                ':event_type'    =>    $_POST["type"],
                ':event_image'    =>    basename($_FILES["img"]["name"]),
                ':event_description'    =>    $_POST["description"],
                ':event_venue'    =>    $_POST["venue"],
                ':event_organizer'    =>    $_POST["organizer"],
                ':event_date'    =>    $_POST["date"],
                ':event_time'    =>    $_POST["time"],
                ':event_id'    =>    $_POST["event_id"],

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
