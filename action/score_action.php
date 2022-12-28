<?php
include '../pdo-connection.php';
if (isset($_POST['btn_action'])) {
    $score = 0;
    foreach ($_POST['criteria'] as $key => $value) {
        $score +=  $_POST['score'][$key];
        $score2[] =  $_POST['score'][$key];
        $query = "INSERT INTO table_criteria_score(criteria_id, event_id, judge_id, contestant_id, score)VALUES(:criteria_id, :event_id, :judge_id, :contestant_id, :score)";
        $stmt = $connect->prepare($query);
        $stmt->execute([
            ':criteria_id' => $value,
            ':event_id' => $_POST['event_id'],
            ':judge_id' => $_POST['judge_id'],
            ':contestant_id' => $_POST['contestant_id'],
            ':score' => $_POST['score'][$key],

        ]);
    }
    $query = "
		INSERT INTO table_score(event_id, contestant_id, judge_id, total_score) 
		VALUES (:event_id, :contestant_id, :judge_id, :total_score)
		";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':event_id' => $_POST['event_id'],
            ':contestant_id' => $_POST['contestant_id'],
            ':judge_id' => $_POST['judge_id'],
            ':total_score' => $score

        )
    );




    $result = $stmt->fetchAll();
    echo $score2;
    if (isset($result)) {
        echo 'score Added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    }
}
