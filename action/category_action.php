<?php
include '../pdo-connection.php';
include '../function.php';
if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'add_category') {
        $query = "
		INSERT INTO table_category (category_id, category_name) 
		VALUES (:category_id, :category_name)
		";
        $cid = gen_cid();
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':category_id'    =>    $cid,
                ':category_name'    =>    $_POST["category_name"],
            )
        );

        foreach ($_POST['event'] as $key => $value) {
            $query = "INSERT INTO table_event(category_id, event_name)VALUES(:category_id, :event_name)";
            $stmt = $connect->prepare($query);
            $stmt->execute([
                ':category_id' => $cid,
                ':event_name' => $value,
            ]);
        }




        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Category Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
    if ($_POST['btn_action'] == 'fetch_single') {
        $query = "SELECT * FROM table_category WHERE category_id = :category_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':category_id'    =>    $_POST["category_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $output['category_name'] = $row['category_name'];
        }
        echo json_encode($output);
    }

    if ($_POST['btn_action'] == 'edit') {
        $query = "
		UPDATE table_category set category_name = :category_name
		WHERE category_id = :category_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':category_name'    =>    $_POST["category_name"],
                ':category_id'        =>    $_POST["category_id"]
            )
        );

        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Category Edited Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }

    if ($_POST['btn_action'] == 'delete') {
        $query = "
		DELETE FROM table_category WHERE category_id = :category_id
		";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':category_id'    =>    $_POST["category_id"],
            )
        );
        $result = $statement->fetchAll();
        if (isset($result)) {
            echo 'Deleted Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
    }
}
