<?php
include '../pdo-connection.php';
$contestant_id = $_POST['contestant_id'];
$judge_id = $_POST['judge_id'];
$query = "SELECT * FROM table_contestant WHERE contestant_id = :contestant_id";
$statement = $connect->prepare($query);
$statement->execute(
    array(
        ':contestant_id'    =>    $_POST["contestant_id"]
    )
);
$result = $statement->fetchAll();
foreach ($result as $row) {
    $event_id = $row['event_id'];
    echo '
    <div class="info-box content-header">
    <h5>'  . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] .  '</h5>
 </div>
 <form method="POST" id="score_form">
 <div class="info-box">
    <div class=" bg-warning">
    </div>
    <table class="table">
       <thead class="btn-cancel" style = "background-color: #981D2D; color:white">
          <tr>
             <th>Criteria</th>
             <th>Score</th>
          </tr>
       </thead>
       <tr style="border-collapse: collapse;">';

    $query = "SELECT * FROM table_criteria
       LEFT JOIN table_criteria_score on table_criteria.criteria_id = table_criteria_score.criteria_id
       WHERE table_criteria.event_id = :event_id AND contestant_id = :contestant_id AND judge_id = :judge_id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':event_id'    =>    $_POST["event_id"],
            ':contestant_id'    =>    $_POST["contestant_id"],
            ':judge_id'    =>    $_POST["judge_id"]
        )
    );
    $result = $statement->fetchAll();
    if (!$result) {
        $query = "SELECT criteria_id, criteria_name, criteria_percent FROM table_schedule
        INNER JOIN table_event on table_schedule.event_id = table_event.event_id
        INNER JOIN table_criteria on table_event.event_id = table_criteria.event_id
        WHERE table_event.event_id = :event_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["event_id"],
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            echo '
                  <td>
                     <p>' . $row['criteria_name'] . '(' . $row['criteria_percent'] . '%)</p>
                  </td>
                  <td>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="hidden" id="criteria" name="criteria[]" class="form-control" value="' . $row['criteria_id'] . '">
                           <input type="number" id="score" name="score[]" class="form-control" placeholder="Score" max="' . $row['criteria_percent'] . '" required>
                        </div>
                     </div>
                  </td>
               </tr>
               ';
        };
    } else {
        $query = "SELECT * FROM table_criteria
        LEFT JOIN table_criteria_score on table_criteria.criteria_id = table_criteria_score.criteria_id
        WHERE table_criteria.event_id = :event_id AND contestant_id = :contestant_id AND judge_id = :judge_id";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':event_id'    =>    $_POST["event_id"],
                ':contestant_id'    =>    $_POST["contestant_id"],
                ':judge_id'    =>    $_POST["judge_id"]
            )
        );
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            echo '
                          <td>
                             <p>' . $row['criteria_name'] . ' (' . $row['criteria_percent'] . '%)</p>
                          </td>
                          <td>
                             <div class="col-md-12">
                                <div class="form-group">
                                   <input type="number" id="score" name="score" class="form-control" value = "' . $row['score'] . '" placeholder="Score" readonly>
                                </div>
                             </div>
                          </td>
                       </tr>
                       ';
        }
    }
    echo '
    </table>
 </div>
 <div class="col-md-12">
    <div class="form-group">
       <input type="hidden" name="btn_action" id="btn_action" />
       <input type="hidden" id="eid" name="event_id" class="form-control" value="' . $event_id . '">
       <input type="hidden" id="cid" name="contestant_id" class="form-control" value="' . $contestant_id . '">
       <input type="hidden" id="jid" name="judge_id" class="form-control" value="' . $judge_id . '"> 
       <center><button type="submit" class="btn btn-info">Submit Score</button> </center>
    </div>
 </div>
 </form>';
}
