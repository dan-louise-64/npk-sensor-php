<main class="col-md-9 col-lg-10 px-md-4">
  <div class="mt-5 mb-3 clearfix">
    <h2 class="pull-left"></h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="addData()">
      <span class="bi bi-plus"></span> Add Plot
    </button>
  </div>

  <?php include("modals/logs-add-plot.php");
  ?>

  <!-- Table -->
  <div id="logs-table">
    <?php include("logs-table.php");
    ?>
  </div>


  <!-- Modals -->


  <?php include("modals/logs-edit-plot.php");
  ?>

  <?php include("modals/logs-delete-plot.php");
  ?>

  <?php include("modals/logs-view-plot-samples.php");
  ?>

</main>