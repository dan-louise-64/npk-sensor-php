<?php
// Include database configuration file  
include '../src/connection.php';

// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

//ADD
if ($jsonObj->request_type == 'addPlot') {
  $plot_data = $jsonObj->plot_data;
  $uid = $plot_data[0];
  $location = $plot_data[1];
  $description = $plot_data[2];
  $is_deleted = 0;

  if (!empty($plot_data) && empty($err)) {
    $sqlQ = "INSERT INTO plots (owner_id, location, description, is_deleted) VALUES (?,?,?,?)";
    $stmt = $mysqli->prepare($sqlQ);
    $stmt->bind_param("sssi", $uid, $location, $description, $is_deleted);
    $insert = $stmt->execute();

    if ($insert) {
      $output = [
        'status' => 1,
        'msg' => 'Plot added successfully!'

      ];
      echo json_encode($output);
    } else {
      echo json_encode(['error' => 'Plot Add request failed!']);
    }
  } else {
    echo json_encode(['error' => trim($err, '<br/>')]);
  }
}

//EDIT
if ($jsonObj->request_type == 'editPlot') {
  $plot_data = $jsonObj->plot_data;
  $location = $plot_data[0];
  $description = $plot_data[1];
  $is_deleted = 0;
  $id = $plot_data[2];

  if (!empty($plot_data) && empty($err)) {
    $sqlQ = "UPDATE plots SET location=?,description=?,is_deleted=?, time_modified = NOW() WHERE id = ?";
    $stmt = $mysqli->prepare($sqlQ);
    $stmt->bind_param("ssii", $location, $description, $is_deleted, $id);
    $update = $stmt->execute();

    if ($update) {
      $output = [
        'status' => 1,
        'msg' => 'Plot updated successfully!'
      ];
      echo json_encode($output);
    } else {
      echo json_encode(['error' => 'Plot Update request failed!']);
    }
  } else {
    echo json_encode(['error' => trim($err, '<br/>')]);
  }
}

// DELETE
if ($jsonObj->request_type == 'deletePlot') {
  $plot_data = $jsonObj->plot_data;
  $is_deleted = 1;
  $id = $plot_data[0];

  if (!empty($plot_data) && empty($err)) {
    $sqlQ1 = "UPDATE plots
              SET is_deleted = ?
              WHERE id = ?";
    $sqlQ2 = "UPDATE npk_table
	            SET is_deleted = ?
              WHERE plot_id = ?";
    $stmt1 = $mysqli->prepare($sqlQ1);
    $stmt2 = $mysqli->prepare($sqlQ2);
    $stmt1->bind_param("ii", $is_deleted, $id);
    $stmt2->bind_param("ii", $is_deleted, $id);
    $update1 = $stmt1->execute();
    $update2 = $stmt2->execute();

    if ($update1 and $update2) {
      $output = [
        'status' => 1,
        'msg' => 'Plot and samples deleted successfully!'
      ];
      echo json_encode($output);
    } else {
      echo json_encode(['error' => 'Plot and samples Delete request failed!']);
    }
  } else {
    echo json_encode(['error' => trim($err, '<br/>')]);
  }
}
