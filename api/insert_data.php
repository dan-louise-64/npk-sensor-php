<?php
include '../src/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $plot_id = $_GET['plot_id'];
  $nitr = $_GET['nitrogen'];
  $phos = $_GET['phosphorus'];
  $pota = $_GET['potassium'];
  $sql = "Insert into 'npk_table'('plot_id', 'nitrogen', 'phosphorus', 'potassium') values('$plot_id', '$nitr', '$phos', '$pota)";
  $result = $mysqli->query($sql);
  if ($result) {
    echo json_encode(['success' => '1']);
  } else {
    echo json_encode(['success' => '0']);
  }
}
