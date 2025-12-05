<?php

include "../src/databasevariables.php";

$table = 'plots';

$primaryKey = 'id';

$uid = $_GET['uid'] ?? '0';


// db - What column in the database should I get the data from?
// dt - What column should I name this data to be sent into the table?\
// formatter - How should I format the data?

$columns = array(
  array('db' => 'id', 'dt' => 'id'),
  array('db' => 'location', 'dt' => 'location'),
  array('db' => 'description', 'dt' => 'description'),
  array('db' => 'is_deleted', 'dt' => 'is_deleted'),
  array('db' => 'time_added', 'dt' => 'time_added'),
  array('db' => 'time_modified', 'dt' => 'time_modified'),
  array(
    'db' => 'id',
    'dt' => 'actions',
    'formatter' => function ($d, $row) {
      return ' 
      <div class="d-flex justify-content-evenly">
        <a href="javascript:void(0);" data-bs-target="#plotViewSamplesModal" onclick="viewDataSamples(' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View Plot Samples"><i class="bi bi-eye"></i></a> 
        <a href="javascript:void(0);" data-bs-target="#plotUpdateModal" onclick="updateData(' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Plot Info"><i class="bi bi-pencil-square"></i></a> 
        <a href="javascript:void(0);" data-bs-target="#plotDeleteModal" onclick="deleteData(' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title=""Delete Plot Info"><i class="bi bi-trash"></i></a> 
      </div>';
    }
  ),
);

if ($uid == 1) {
  $where = "is_deleted = 0";
} else {
  $where = "owner_id = " . $uid . " and is_deleted = 0";
}

$sql_details = array(
  'user' => $username,
  'pass' => $password,
  'db'   => $dbname,
  'host' => $servername
);

require('ssp.class.php');

echo json_encode(
  SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, $where)
);
