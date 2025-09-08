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
      Ncell.innerHTML = "100"
      if (phosAve < 5) {
        Pcell.innerHTML = "20"
      } else {
        Pcell.innerHTML = "30"
      }
      Kcell.innerHTML = "30"
    } else if (activeTab == "hrds") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Hybrid Rice - Dry Season</h3>"
      Ncell.innerHTML = "140"
      if (phosAve < 5) {
        Pcell.innerHTML = "20"
      } else {
        Pcell.innerHTML = "30"
      }
      Kcell.innerHTML = "30"
    } else if (activeTab == "irws") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Inbred Rice - Wet Season</h3>"
      Ncell.innerHTML = "80"
      if (phosAve < 5) {
        Pcell.innerHTML = "20"
      } else {
        Pcell.innerHTML = "30"
      }
      Kcell.innerHTML = "30"
    } else if (activeTab == "irds") {
      document.getElementById('print-nutrients-title').innerHTML = "<h3>Nutrient Requirements for Inbred Rice - Dry Season</h3>"
      Ncell.innerHTML = "100"
      if (phosAve < 5) {
        Pcell.innerHTML = "20"
      } else {
        Pcell.innerHTML = "30"
      }
      Kcell.innerHTML = "30"
    } else {
      Ncell.innerHTML = "NAN"
      Pcell.innerHTML = "NAN"
      Kcell.innerHTML = "NAN"
    }
  }
</script>