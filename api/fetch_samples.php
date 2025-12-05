<?php

include "../src/databasevariables.php";

$table = 'npk_table';

$primaryKey = 'id';

$plot_id = $_GET['plot_id'] ?? '0';


// db - What column in the database should I get the data from?
// dt - What column should I name this data to be sent into the table?\
// formatter - How should I format the data?

$columns = array(
  array('db' => 'id', 'dt' => 'id'),
  array('db' => 'plot_id', 'dt' => 'plot_id'),
  array(
    'db' => 'nitrogen',
    'dt' => 'nitrogen',
    'formatter' => function ($d, $row) {
      return $d . ' <small>mg/kg</small>';
    }
  ),
  array(
    'db' => 'phosphorus',
    'dt' => 'phosphorus',
    'formatter' => function ($d, $row) {
      return $d . ' <small>mg/kg</small>';
    }
  ),
  array(
    'db' => 'potassium',
    'dt' => 'potassium',
    'formatter' => function ($d, $row) {
      return $d . ' <small>mg/kg</small>';
    }
  ),
  array('db' => 'is_deleted', 'dt' => 'is_deleted'),
  array('db' => 'time_added', 'dt' => 'time_added'),
  array(
    'db' => 'id',
    'dt' => 'actions',
    'formatter' => function ($d, $row) {
      return ' 
      <div class="d-flex justify-content-evenly">
        <a href="javascript:void(0);" data-bs-target="#plotDeleteModal" onclick="deleteSampleData(' . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ')" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title=""Delete Plot Info"><i class="bi bi-trash"></i></a> 
      </div>';
    }
  ),
);

$where = "is_deleted = 0 AND plot_id = " . $plot_id;

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
