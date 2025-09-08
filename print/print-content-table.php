  <p>
  <h4>Samples list and Average</h4>
  </p>

  <?php
  include './src/connection.php';

  $uid = $_SESSION['id'];
  $plot_id = $_GET['plot_id'];
  $sql = "SELECT id, nitrogen, phosphorus, potassium FROM npk_table WHERE plot_id = " . $plot_id . " and is_deleted = 0";

  echo '<table class="table table-bordered" id="print-samples-table"> 
          <thead>
            <tr> 
                <th><strong>Sample ID</strong> </th> 
                <th><strong>Nitrogen</strong> </th> 
                <th><strong>Phosphorus</strong> </th> 
                <th><strong>Potassium</strong> </th> 
            </tr>
          </thead>';

  function avg(array $values)
  {
    $sum = array_sum($values);
    $count = count($values);
    return ($count !== 0) ? round($sum / $count, 2) : NAN;
  }

  if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
      $sampleValue = $row["id"];
      $nitrValue = $row["nitrogen"];
      $phosValue = $row["phosphorus"];
      $potaValue = $row["potassium"];
      $nitr_array[] = $row['nitrogen'];
      $phos_array[] = $row['phosphorus'];
      $pota_array[] = $row['potassium'];

      $nitr_ave = avg($nitr_array);
      $phos_ave = avg($phos_array);
      $pota_ave = avg($pota_array);

      echo '<tr> 
              <td>' . $sampleValue . '</td> 
              <td>' . $nitrValue . '</td> 
              <td>' . $phosValue . '</td>
              <td>' . $potaValue . '</td>
            </tr>';
    }
    echo '<tr>
            <td><strong>Average</strong></td> 
            <td><strong id="print-nitr-ave">' . $nitr_ave . '</strong></td> 
            <td><strong id="print-phos-ave">' . $phos_ave . '</strong></td>
            <td><strong id="print-pota-ave">' . $pota_ave . '</strong></td>
          </tr>';

    echo '</table>';
    $result->free();
  }
  ?>