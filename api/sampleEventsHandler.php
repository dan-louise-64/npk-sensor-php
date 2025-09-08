<?php
// Include database configuration file  
include '../src/connection.php';

// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

// DELETE
if ($jsonObj->request_type == 'deleteSample') {
  $sample_data = $jsonObj->sample_data;
  $is_deleted = 1;
  $id = $sample_data[0];

  if (!empty($sample_data) && empty($err)) {
    $sqlQ = "UPDATE npk_table
	            SET is_deleted = ?
              WHERE id = ?";
    $stmt = $mysqli->prepare($sqlQ);
    $stmt->bind_param("ii", $is_deleted, $id);
    $update = $stmt->execute();

    if ($update) {
      $output = [
        'status' => 1,
        'msg' => 'Sample deleted successfully!'
      ];
      echo json_encode($output);
    } else {
      echo json_encode(['error' => 'Sample Delete request failed!']);
    }
  } else {
    echo json_encode(['error' => trim($err, '<br/>')]);
  }
}
