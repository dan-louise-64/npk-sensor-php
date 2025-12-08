<p id="print-fertilizer-title">
</p>

<table class="table table-bordered" id="print-fertilizer-recommendation">
  <thead>
    <tr>
      <th>Time of Application</th>
      <th>Fertilizer</th>
      <th>Bags/Actual Area</th>
      <th>kg/Actual Area</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>During Land Preparation</td>
      <td>Organic Ferilizer</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td rowspan="4">During Transplanting</td>
      <td>16-20-0 (Ammonium Phosphate)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>46-0-0 (Urea)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>14-14-14 (Complete)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>0-0-60 (Muriate of Potash)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>7-10 days after transplanting</td>
      <td>21-0-0 (Ammonium Sulphate)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>20-25 days after transplanting</td>
      <td>46-0-0 (Urea)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>35-45 days after transplanting</td>
      <td>46-0-0 (Urea)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>At panicle initiation</td>
      <td>0-0-60 (Muriate of Potash)</td>
      <td>-</td>
      <td>-</td>
    </tr>
    <tr>
      <td>After harvest (pack/s)</td>
      <td>Compost Fungus Activator (CFA)</td>
      <td>-</td>
      <td>-</td>
    </tr>
  </tbody>
</table>

<script>
  function changeFertilizerTable(activeTab, nitrAve, phosAve, potaAve) {
    const table = document.getElementById("print-fertilizer-recommendation");
    const cell1 = table.rows[1].cells[2]; // organic fertilizer
    const cell2 = table.rows[2].cells[2]; // ammonuim phosphate
    const cell3 = table.rows[3].cells[1]; // urea
    const cell4 = table.rows[4].cells[1]; // complete
    const cell5 = table.rows[5].cells[1]; // mop
    const cell6 = table.rows[6].cells[2]; // ammonuim sulfate
    const cell7 = table.rows[7].cells[2]; // urea
    const cell8 = table.rows[8].cells[2]; // urea
    const cell9 = table.rows[9].cells[2]; // potash
    const cell10 = table.rows[10].cells[2]; // cfa

    if (activeTab == "hrws") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Hybrid Rice - Wet Season</h3>"
      cell1.innerHTML = <?php echo json_encode(organicFertilizerALL($nitr_ave)); ?>;
      cell2.innerHTML = <?php echo json_encode(ammoniumPhosphateHRWS($nitr_ave, $phos_ave)); ?>;
      cell3.innerHTML = <?php echo json_encode(ureaTransplantHRWS($nitr_ave, $phos_ave)); ?>;
      cell4.innerHTML = <?php echo json_encode(completeHRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell5.innerHTML = <?php echo json_encode(muriateOfPotashTransplantHRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell6.innerHTML = <?php echo json_encode(ammoniumPhosphateAfterTransplantHRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell7.innerHTML = <?php echo json_encode(ureaTransplant2025HRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell8.innerHTML = <?php echo json_encode(ureaTransplant3545HRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell9.innerHTML = <?php echo json_encode(muriateOfPotashPanicleALL()); ?>;
      cell10.innerHTML = <?php echo json_encode(compostFungusActivatorALL()); ?>;
    } else if (activeTab == "hrds") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Hybrid Rice - Dry Season</h3>"
      cell1.innerHTML = <?php echo json_encode(organicFertilizerALL($nitr_ave)); ?>;
      cell2.innerHTML = <?php echo json_encode(ammoniumPhosphateHRDS($nitr_ave, $phos_ave)); ?>;
      cell3.innerHTML = <?php echo json_encode(ureaTransplantHRDS($nitr_ave, $phos_ave)); ?>;
      cell4.innerHTML = <?php echo json_encode(completeHRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell5.innerHTML = <?php echo json_encode(muriateOfPotashTransplantHRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell6.innerHTML = <?php echo json_encode(ammoniumPhosphateAfterTransplantHRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell7.innerHTML = <?php echo json_encode(ureaTransplant2025HRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell8.innerHTML = <?php echo json_encode(ureaTransplant3545HRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell9.innerHTML = <?php echo json_encode(muriateOfPotashPanicleALL()); ?>;
      cell10.innerHTML = <?php echo json_encode(compostFungusActivatorALL()); ?>;
    } else if (activeTab == "irws") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Inbred Rice - Wet Season</h3>"
      cell1.innerHTML = <?php echo json_encode(organicFertilizerALL($nitr_ave)); ?>;
      cell2.innerHTML = <?php echo json_encode(ammoniumPhosphateIRWS($nitr_ave, $phos_ave)); ?>;
      cell3.innerHTML = <?php echo json_encode(ureaTransplantIRWS($nitr_ave, $phos_ave)); ?>;
      cell4.innerHTML = <?php echo json_encode(completeIRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell5.innerHTML = <?php echo json_encode(muriateOfPotashTransplantIRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell6.innerHTML = <?php echo json_encode(ammoniumPhosphateAfterTransplantIRWS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell7.innerHTML = <?php echo json_encode(ureaTransplant2025IRWS($nitr_ave)); ?>;
      cell8.innerHTML = <?php echo json_encode(ureaTransplant3545IRWS($nitr_ave)); ?>;
      cell9.innerHTML = <?php echo json_encode(muriateOfPotashPanicleALL()); ?>;
      cell10.innerHTML = <?php echo json_encode(compostFungusActivatorALL()); ?>;
    } else if (activeTab == "irds") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Inbred Rice - Dry Season</h3>"
      cell1.innerHTML = <?php echo json_encode(organicFertilizerALL($nitr_ave)); ?>;
      cell2.innerHTML = <?php echo json_encode(ammoniumPhosphateIRDS($nitr_ave, $phos_ave)); ?>;
      cell3.innerHTML = <?php echo json_encode(ureaTransplantIRDS($nitr_ave, $phos_ave)); ?>;
      cell4.innerHTML = <?php echo json_encode(completeIRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell5.innerHTML = <?php echo json_encode(muriateOfPotashTransplantIRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell6.innerHTML = <?php echo json_encode(ammoniumPhosphateAfterTransplantIRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell7.innerHTML = <?php echo json_encode(ureaTransplant2025IRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell8.innerHTML = <?php echo json_encode(ureaTransplant3545IRDS($nitr_ave, $phos_ave, $pota_ave)); ?>;
      cell9.innerHTML = <?php echo json_encode(muriateOfPotashPanicleALL()); ?>;
      cell10.innerHTML = <?php echo json_encode(compostFungusActivatorALL()); ?>;
    } else {
      cell1.innerHTML = "NAN"
      cell2.innerHTML = "NAN"
      cell3.innerHTML = "NAN"
      cell4.innerHTML = "NAN"
      cell5.innerHTML = "NAN"
      cell6.innerHTML = "NAN"
      cell7.innerHTML = "NAN"
      cell8.innerHTML = "NAN"
      cell9.innerHTML = "NAN"
      cell10.innerHTML = "NAN"
    }

    for (let i = 1; i < 11; i++) {
      if (i == 3 || i == 4 || i == 5) {
        if (!isNaN(table.rows[i].cells[1].innerHTML)) {
          table.rows[i].cells[2].innerHTML = (parseFloat(table.rows[i].cells[1].innerHTML) * 50).toString() + " kg";
        } else {
          table.rows[i].cells[2].innerHTML = "-"
        }
      } else {
        if (!isNaN(table.rows[i].cells[2].innerHTML)) {
          table.rows[i].cells[3].innerHTML = (parseFloat(table.rows[i].cells[2].innerHTML) * 50).toString() + " kg";
        } else {
          table.rows[i].cells[3].innerHTML = "-"
        }
      }
    }
  }
</script>