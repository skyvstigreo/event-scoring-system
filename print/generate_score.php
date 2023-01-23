<?php
//include connection file 
include('../pdo-connection.php');
require('../asset/tcpdf/tcpdf.php');

$event =  $_GET['id'];
$query = "SELECT * FROM table_event WHERE event_id = '$event'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetch();
$event_name = $result['event_name'];

date_default_timezone_set('Asia/Manila');
//make TCPDF object

class PDF extends TCPDF
{

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->setPrintHeader(false);
$pdf->AddPage('P', 'A4', 0);
//add content (student list)
//title
$pdf->SetFont('Helvetica', '', 14);
$pdf->Image('../asset/img/Logo.png', 55, 9, 10);
$pdf->Cell(200, 10, "DESS Dynamic Event Scoring System", 0, 1, 'C');
$pdf->Ln(2);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(190, 7, "$event_name", 0, 1, 'C');
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(190, 7, "Score Result", 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(190, 5, 'Date Generated: ' . date('M d, Y h:i a'), 0, 0, "C");
$pdf->Ln(6);
$pdf->Cell(190, 5, 'Prepared by: Scoring Committee ', 0, 0, 'C');
$pdf->Ln();
$pdf->Ln(2);
$query = "SELECT *, SUM(total_score)/Count(total_score) as total FROM table_contestant 
LEFT JOIN table_event on table_contestant.event_id = table_event.event_id
LEFT JOIN table_score on table_contestant.contestant_id = table_score.contestant_id
WHERE table_score.event_id = '$event' and total_score != ''
GROUP BY table_score.contestant_id
ORDER BY total DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$order = 0;

//make the table
$html = "
	<table>
		<tr>
        <th>Contestant Name</th>
        <th>Total Scores</th>
        <th>Rank</th>
		</tr>
		";
//loop the data
foreach ($result as $row) {
    $order += 1;
    $html .= '
                    <tr>
                        <td>' . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . '</td>
                        <td>' . (number_format($row['total'], 2)) . '%' . '</td>
                        <td>' . $order . '</td>
                    </tr>';
};
$html .= "
</table>
<table>
<tr>
<th>Judge</th>
<th>Contestant Name</th>
<th>Event Name</th>
<th>Overall Score</th>
</tr>
";
$queryjudge = "SELECT * FROM table_score
INNER JOIN table_user on table_score.judge_id = table_user.user_id
INNER JOIN table_contestant on table_score.contestant_id = table_contestant.contestant_id
INNER JOIN table_event on table_score.event_id = table_event.event_id
WHERE table_score.event_id = '$event'";
$stmt = $connect->prepare($queryjudge);
$stmt->execute();
$result2 = $stmt->fetchAll();



//loop the data
foreach ($result2 as $row2) {

    $html .= '
                    <tr>
                    <td>' . $row2['name'] . '</td>
                    <td>' . $row2['first_name'] . " " . $row2['middle_name'] . " " . $row2['last_name'] . '</td>
                    <td>' . $row2['event_name'] . '</td>
                    <td>' . $row2['total_score'] . '</td>
                    </tr>';
};

$html .= "
	</table>
	<style>
	table {
		border-collapse:collapse;
	}
	th,td {
		border:1px solid #888;
        font-size: 10px;
	}
   
	table tr th {
		background-color:#888;
		color:#fff;
		font-weight:bold;
        text-align: center;
	}
	</style>
";

// $queryjudge = "SELECT * FROM table_score
// INNER JOIN table_user on table_score.judge_id = table_user.user_id
// INNER JOIN table_contestant on table_score.contestant_id = table_contestant.contestant_id
// INNER JOIN table_event on table_score.event_id = table_event.event_id
// WHERE table_score.event_id = '$event'";
// $stmt = $connect->prepare($queryjudge);
// $stmt->execute();
// $result2 = $stmt->fetchAll();


// $html2 = "
// 	<table>

// 		";
// //loop the data
// foreach ($result2 as $row2) {

//     $html2 .= '
//                     <tr>
//                     <td>' . $row2['name'] . '</td>
//                     <td>' . $row2['first_name'] . " " . $row2['middle_name'] . " " . $row2['last_name'] . '</td>
//                     <td>' . $row2['event_name'] . '</td>
//                     <td>' . $row2['total_score'] . '</td>
//                     </tr>';
// };
// $html2 .= "
// 	</table>

// 	<style>
// 	table {
// 		border-collapse:collapse;
// 	}
// 	th,td {
// 		border:1px solid #888;
//         font-size: 10px;
// 	}

// 	table tr th {
// 		background-color:#888;
// 		color:#fff;
// 		font-weight:bold;
//         text-align: center;
// 	}
// 	</style>
// ";
//WriteHTMLCell
$pdf->WriteHTMLCell(192, 0, 9, '', $html, 0);
// $pdf->WriteHTMLCell(192, 0, 9, '', $html2, 0);
$pdf->Output();
// $pdf2->Output();
