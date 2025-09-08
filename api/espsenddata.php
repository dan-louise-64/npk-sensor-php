<?php

include '../src/connection.php';

$api_key_value = "REPLACEME";

$api_key = $plot_id = $nitr = $phos = $pota = "";

//get all plot ids
$sql = "SELECT id FROM `plots` WHERE is_deleted = 0;";
$result = mysqli_query($mysqli, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $plot_id_array[] = $row['id'];
}

echo '<pre>';
print_r($plot_id_array);
echo '</pre>';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $plot_id = test_input($_GET["plotid"]);
  $nitr = test_input($_GET["nitr"]);
  $phos = test_input($_GET["phos"]);
  $pota = test_input($_GET["pota"]);

  $sql = "INSERT INTO npk_table (plot_id, nitrogen, phosphorus, potassium)
      VALUES ('" . $plot_id . "', '" . $nitr . "', '" . $phos . "', '" . $pota . "')";

  if (in_array($plot_id, $plot_id_array)) {
    if ($mysqli->query($sql) === TRUE) {
      echo "New record created successfully";
      echo json_encode(['success' => '1']);
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
      echo json_encode(['success' => '0']);
    }
  } else {
    echo "Plot doesn't exist";
    echo json_encode(['success' => '-1']);
  }

  $mysqli->close();
} else {
  echo "No data posted with HTTP POST.";
  echo json_encode(['success' => '0']);
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
