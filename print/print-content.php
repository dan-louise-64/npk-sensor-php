<main class="col-md-9 col-lg-10 px-md-4" onload="initTables();">
  <div class="mt-5 mb-3 clearfix">
    <h3><strong>Everything below here is a preview of the printed data.</strong></h3>
  </div>
  <hr>

  <?php
  //check if user can access the plot data
  include './src/connection.php';

  $uid = $_SESSION['id'];
  $plot_id = $_GET['plot_id'];
  if ($uid == 1) {
    $sql = "SELECT id FROM plots WHERE is_deleted = 0";
  } else {
    $sql = "SELECT id FROM plots WHERE owner_id = " . $uid . " and is_deleted = 0";
  }
  $result = mysqli_query($mysqli, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $plot_id_array[] = $row['id'];
  }

  if (in_array($plot_id, $plot_id_array)) { ?>
    <ul class="nav nav-pills" id="print-crop-tabs">
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#hrws">Hybrid Rice - Wet Season</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#hrds">Hybrid Rice - Dry Season</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#irws">Inbred Rice - Wet Season</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#irds">Inbred Rice - Dry Season</a>
      </li>
    </ul>
    <div id="print-printing-table">
      <?php include("print-content-table.php");
      ?>
    </div>
    <hr>

    <div id="print-printing-analytics">
      <?php
      include("print-content-nutrient-requirements.php");
      include("print-content-fertilizer-recommendation.php");
      ?>
      <div class="container" id="print-notes">
        Notes:
        <ol class="list-group-numbered">
          <li class="list-group-item">Computations assumes that the size of plot is 1 Ha. and the rice is transplanted.</li>
          <li class="list-group-item">Use Fungus Compost Activator (CFA) to enhance decomposition.</li>
          <li class="list-group-item">Application of 0-0-60 at panicle initiation may increase yield.</li>
        </ol>
      </div>
    </div>

    <br>

    <input type="hidden" id="activeTab" name="activeTab" value="hr-ws">
    <input type="hidden" id="print-plot-id" value="<?php echo $plot_id; ?>" />
    <div class="d-flex flex-row-reverse" style="padding: 20px 50px 20px;">
      <button class="btn btn-primary" type="button" id="print-export-to-pdf" onclick="printData()">Export data to PDF</button>
    </div>
  <?php } else {
    echo "You can't access this plot.";
  }
  ?>
</main>

<script>
  const tabList = document.getElementById('print-crop-tabs');
  const activeTabInput = document.getElementById('activeTab');
  var nitrAve = document.getElementById('print-nitr-ave').innerText;
  var phosAve = document.getElementById('print-phos-ave').innerText;
  var potaAve = document.getElementById('print-pota-ave').innerText;
  var activeTabID = "";
  var cropString;

  function printData() {
    var plotID = document.getElementById("print-plot-id").value;
    if (activeTabID == "hrws") {
      cropString = "Hybrid Rice - Wet Season";
    } else if (activeTabID == "hrds") {
      cropString = "Hybrid Rice - Dry Season";
    } else if (activeTabID == "irws") {
      cropString = "Inbred Rice - Wet Season";
    } else if (activeTabID == "irds") {
      cropString = "Inbred Rice - Dry Season";
    } else {
      cropString = "Null";
    }

    const {
      jsPDF
    } = window.jspdf;
    const doc = new jsPDF();

    doc.text(15, 20, "Samples list and average of Plot No. " + plotID);

    autoTable(doc, {
      startY: 25,
      html: '#print-samples-table',
    })

    let nextY = doc.lastAutoTable.finalY || 10
    doc.text(15, nextY + 10, "Nutrient Requirements for " + cropString)

    autoTable(doc, {
      startY: nextY + 15,
      html: '#print-nutrient-requirements',
    })

    nextY = doc.lastAutoTable.finalY || 10
    doc.text(15, nextY + 10, "Fertilizer Recommendations for " + cropString)

    autoTable(doc, {
      startY: nextY + 15,
      html: '#print-fertilizer-recommendation',
    })

    nextY = doc.lastAutoTable.finalY || 10
    doc.setFontSize(10);
    doc.text(15, nextY + 10, "Notes:\n\t" +
      "1. Computations assumes that the size of plot is 1 Ha. and the rice is transplanted.\n\t" +
      "2. Use Fungus Compost Activator (CFA) to enhance decomposition.\n\t" +
      "3. Application of 0-0-60 at panicle initiation may increase yield.")

    dateString = new Date(new Date().toLocaleString('en', {
      timeZone: 'Asia/Hong_Kong'
    }))

    let filename = "Plot ID " + plotID + " Soil Nutrient Data as of " + dateString;
    if (activeTabID) {
      doc.save(filename + ".pdf");
    } else {
      alert("Select a crop type first.");
    }

  }

  function initTables() {
    activeTabID = event.target.getAttribute('href').substring(1);

    changeNutrientTable(activeTabID, nitrAve, phosAve, potaAve);
    changeFertilizerTable(activeTabID, nitrAve, phosAve, potaAve);
  }

  tabList.addEventListener('show.bs.tab', function(event) {
    activeTabID = event.target.getAttribute('href').substring(1);

    activeTabInput.value = activeTabID;
    changeNutrientTable(activeTabID, nitrAve, phosAve, potaAve);
    changeFertilizerTable(activeTabID, nitrAve, phosAve, potaAve);
  });
</script>