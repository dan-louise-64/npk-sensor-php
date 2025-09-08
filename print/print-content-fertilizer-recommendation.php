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
      cell1.innerHTML = "20"
      if (parseFloat(phosAve) < 5) {
        cell2.innerHTML = "2.00"
      } else {
        cell2.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell3.innerHTML = "0.50"
      } else {
        cell3.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell4.innerHTML = "-"
      } else {
        cell4.innerHTML = "4.25"
      }
      if (parseFloat(potaAve) > 85) {
        cell5.innerHTML = "1.00"
      } else {
        cell5.innerHTML = "-"
      }
      cell6.innerHTML = "1.00"
      cell7.innerHTML = "1.75"
      cell8.innerHTML = "1.00"
      cell9.innerHTML = "1.00"
      cell10.innerHTML = "20"
    } else if (activeTab == "hrds") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Hybrid Rice - Dry Season</h3>"
      cell1.innerHTML = "20"
      if (parseFloat(phosAve) < 5) {
        cell2.innerHTML = "2.00"
      } else {
        cell2.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell3.innerHTML = "1.00"
      } else {
        cell3.innerHTML = "0.50"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell4.innerHTML = "-"
      } else {
        cell4.innerHTML = "4.25"
      }
      if (parseFloat(potaAve) > 85) {
        cell5.innerHTML = "1.00"
      } else {
        cell5.innerHTML = "-"
      }
      cell6.innerHTML = "1.25"
      cell7.innerHTML = "2.50"
      cell8.innerHTML = "1.25"
      cell9.innerHTML = "1.00"
      cell10.innerHTML = "20"
    } else if (activeTab == "irws") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Inbred Rice - Wet Season</h3>"
      cell1.innerHTML = "20"
      cell2.innerHTML = "-"
      if (parseFloat(nitrAve) > 1.20) {
        cell3.innerHTML = "0.25"
      } else {
        cell3.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell4.innerHTML = "3.00"
      } else {
        cell4.innerHTML = "4.25"
      }
      if (parseFloat(potaAve) > 85) {
        cell5.innerHTML = "0.25"
      } else {
        cell5.innerHTML = "-"
      }
      cell6.innerHTML = "0.75"
      cell7.innerHTML = "1.50"
      cell8.innerHTML = "0.75"
      cell9.innerHTML = "1.00"
      cell10.innerHTML = "20"
    } else if (activeTab == "irds") {
      document.getElementById('print-fertilizer-title').innerHTML = "<h3>Fertilizer Recommendation for Inbred Rice - Dry Season</h3>"
      cell1.innerHTML = "20"
      if (parseFloat(phosAve) < 5) {
        cell2.innerHTML = "2.00"
      } else {
        cell2.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell3.innerHTML = "0.50"
      } else {
        cell3.innerHTML = "-"
      }
      if (parseFloat(nitrAve) > 1.20) {
        cell4.innerHTML = "-"
      } else {
        cell4.innerHTML = "4.25"
      }
      if (parseFloat(potaAve) > 85) {
        cell5.innerHTML = "1.00"
      } else {
        cell5.innerHTML = "-"
      }
      cell6.innerHTML = "1.00"
      cell7.innerHTML = "1.75"
      cell8.innerHTML = "1.00"
      cell9.innerHTML = "1.00"
      cell10.innerHTML = "20"
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