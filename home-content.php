<main class="col-md-9 col-lg-10 px-md-4">
  <br>
  <h2>Dashboard</h2>

  <?php
  // Include database configuration file  
  include './src/connection.php';
  ?>

  <div class="d-flex justify-content-around align-items-stretch">
    <div class="card m-2 flex-fill">
      <div class="card-body">
        <h5 class="card-title">Total Plots</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Total Plots Recorded</h6>
        <p class="card-text">
        <h1 class="text-end" id="dashboard-plots">
          <?php
          $uid = $_SESSION['id'];
          if ($uid == 1) {
            $sql = "SELECT COUNT(*) FROM plots WHERE is_deleted = 0";
          } else {
            $sql = "SELECT COUNT(*) FROM plots WHERE owner_id = " . $uid . " and is_deleted = 0";
          }

          $result = mysqli_query($mysqli, $sql);

          $output = mysqli_fetch_assoc($result);
          $totalplots = $output['COUNT(*)'];

          echo $totalplots;
          ?>
        </h1>
        </p>
      </div>
    </div>

    <div class="card m-2 flex-fill">
      <div class="card-body">
        <h5 class="card-title">Total Samples</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Total Samples Collected</h6>
        <p class="card-text">
        <h1 class="text-end" id="dashboard-samples">
          <?php
          if ($uid == 1) {
            $sql = "SELECT COUNT(*) FROM npk_table WHERE is_deleted = 0";
          } else {
            $sql = "SELECT COUNT(*) FROM npk_table WHERE plot_id = ANY (SELECT id FROM plots WHERE owner_id = " . $uid . " and is_deleted = 0) and is_deleted = 0";
          }

          $result = mysqli_query($mysqli, $sql);

          $output = mysqli_fetch_assoc($result);
          $totalsamples = $output['COUNT(*)'];

          echo $totalsamples;
          ?>
        </h1>
        </p>
        <h6 class="card-subtitle mb-2 text-body-secondary">

          <?php
          if ($totalplots == 0) {
            echo "";
          } else {
            $averagesamples = $totalsamples / $totalplots;
            $averagesamples_formatted = round($averagesamples, 2);
            if ($averagesamples_formatted == 1) {
              $sampleword = "sample";
            } else {
              $sampleword = "samples";
            }

            echo "About " . $averagesamples_formatted . " " . $sampleword . " in a single plot";
          }
          ?>
        </h6>
      </div>
    </div>
  </div>

  <?php
  if ($uid == 1) {
    $sql = "SELECT AVG(nitrogen) AS averageN, 
                  AVG(phosphorus) AS averageP, 
                  AVG(potassium) AS averageK 
            FROM npk_table WHERE is_deleted = 0;";
  } else {
    $sql = "SELECT AVG(nitrogen) AS averageN, 
              AVG(phosphorus) AS averageP, 
              AVG(potassium) AS averageK 
            FROM npk_table WHERE plot_id = ANY (SELECT id FROM plots WHERE owner_id = " . $uid . " and is_deleted = 0) and is_deleted = 0";
  }

  $result = mysqli_query($mysqli, $sql);

  $output = mysqli_fetch_assoc($result);

  $average_n = $output['averageN'];
  $average_p = $output['averageP'];
  $average_k = $output['averageK'];
  ?>

  <div class="d-flex justify-content-around align-items-stretch">
    <div class="card m-2 flex-fill">
      <div class="card-body">
        <h5 class="card-title">Average Nitrogen (N) Count</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">In all collected samples</h6>
        <p class="card-text">
        <h1 class="text-end" id="dashboard-nitrogen">
          <?php
          echo round($average_n, 2) . " <small>mg/kg</small>";
          ?>
        </h1>
        </p>
      </div>
    </div>

    <div class="card m-2 flex-fill">
      <div class="card-body">
        <h5 class="card-title">Average Phosphorus (P) Count</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">In all collected samples</h6>
        <p class="card-text">
        <h1 class="text-end" id="dashboard-phosphorus">
          <?php
          echo round($average_p, 2) . " <small>mg/kg</small>";
          ?>
        </h1>
        </p>
      </div>
    </div>

    <div class="card m-2 flex-fill">
      <div class="card-body">
        <h5 class="card-title">Average Potassium (K) Count</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">In all collected samples</h6>
        <p class="card-text">
        <h1 class="text-end" id="dashboard-potassium">
          <?php
          echo round($average_k, 2) . " <small>mg/kg</small>";
          ?>
        </h1>
        </p>
      </div>
    </div>
  </div>
</main>