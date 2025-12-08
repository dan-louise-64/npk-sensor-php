<?php
require 'print-formulas.php';

$number = 12345;
?>
<p id="print-nutrients-title">
</p>

<table class="table table-bordered" id="print-nutrient-requirements">
  <thead>
    <tr>
      <th>Nitrogen (N)</th>
      <th>Phosphorus (P)</th>
      <th>Potassium (K)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>-</td>
      <td>-</td>
      <td>-</td>
    </tr>
  </tbody>
</table>

<script>
  function changeNutrientTable(activeTab, nitrAve, phosAve, potaAve) {
    const table = document.getElementById("print-nutrient-requirements");
    const row = table.rows[1];
    const Ncell = row.cells[0];
    const Pcell = row.cells[1];
    const Kcell = row.cells[2];
    if (activeTab == "hrws") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Hybrid Rice - Wet Season</h3>"
      Ncell.innerHTML = <?php echo json_encode(nitrogenRequirementHRWS($nitr_ave)); ?>;
      Pcell.innerHTML = <?php echo json_encode(phosphorusRequirementALL($phos_ave)); ?>;
      Kcell.innerHTML = <?php echo json_encode(potassiumRequirementALL($pota_ave)); ?>;
    } else if (activeTab == "hrds") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Hybrid Rice - Dry Season</h3>"
      Ncell.innerHTML = <?php echo json_encode(nitrogenRequirementHRDS($nitr_ave)); ?>;
      Pcell.innerHTML = <?php echo json_encode(phosphorusRequirementALL($phos_ave)); ?>;
      Kcell.innerHTML = <?php echo json_encode(potassiumRequirementALL($pota_ave)); ?>;
    } else if (activeTab == "irws") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Inbred Rice - Wet Season</h3>"
      Ncell.innerHTML = <?php echo json_encode(nitrogenRequirementIRWS($nitr_ave)); ?>;
      Pcell.innerHTML = <?php echo json_encode(phosphorusRequirementALL($phos_ave)); ?>;
      Kcell.innerHTML = <?php echo json_encode(potassiumRequirementALL($pota_ave)); ?>;
    } else if (activeTab == "irds") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Inbred Rice - Dry Season</h3>"
      Ncell.innerHTML = <?php echo json_encode(nitrogenRequirementIRDS($nitr_ave)); ?>;
      Pcell.innerHTML = <?php echo json_encode(phosphorusRequirementALL($phos_ave)); ?>;
      Kcell.innerHTML = <?php echo json_encode(potassiumRequirementALL($pota_ave)); ?>;
    } else {
      Ncell.innerHTML = "NAN"
      Pcell.innerHTML = "NAN"
      Kcell.innerHTML = "NAN"
    }
  }
</script>