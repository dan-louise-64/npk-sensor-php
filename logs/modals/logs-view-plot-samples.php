<!-- Modal -->
<div class="modal fade" id="plotViewSamplesModal" tabindex="-1" aria-labelledby="plotViewSamplesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="plotViewSamplesModalLabel">View Samples</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="plotViewSamplesForm" id=plot-view-samples-form>
          <input type="hidden" id="plot-view-samples-id" name="plotViewSamplesID" value="0">
          <table class="table table-bordered table-striped" id="npk-table">
            <thead>
              <tr>
                <th scope="col">Sample ID</th>
                <th scope="col" class="text-center">Nitrogen</th>
                <th scope="col" class="text-center">Phosphorus</th>
                <th scope="col" class="text-center">Potassium</th>
                <th scope="col" class="text-center" style="width: 20%">Action</th>
              </tr>
            </thead>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="processData()">Process Data</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function processData() {
    var plotID = document.getElementById("plot-view-samples-id").value;

    var url = './print.php?plot_id='.concat(plotID);

    window.location.href = url;
  }

  function viewDataSamples(data_samples) {
    $('#plot-view-samples-id').val(data_samples.id);

    $('#plotViewSamplesModal').modal('show');

    console.log(data_samples.id)

    //datatables
    npkTable = $('#npk-table').DataTable({
      ajax: {
        'url': './api/fetch_samples.php',
        data: {
          plot_id: data_samples.id
        }
      },
      columns: [{
          'data': 'id',
        },
        {
          'data': 'nitrogen',
        },
        {
          'data': 'phosphorus',
        },
        {
          'data': 'potassium',
        },
        {
          'data': 'actions',
        },
      ],
      processing: true,
      serverSide: true,
    });

    $(document).ready(function() {
      // Draw the table
      npkTable.draw();
    });
  }

  // clear table when closing modal
  $(document).ready(function() {
    $("#plotViewSamplesModal").on('hide.bs.modal', function() {
      npkTable.destroy()
    });
  });

  function deleteSampleData(sample) {
    if (confirm("Delete Sample ID " + sample.id + "?")) {
      // Data to be sent to the database
      let input_data_arr = [
        sample.id
      ]

      //send data to event handler
      fetch('./api/sampleEventsHandler.php', {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            request_type: 'deleteSample',
            sample_data: input_data_arr
          }),
        })
        .then(response => response.json())
        .then(data => {
          if (data.status == 1) {
            //refresh table
            npkTable.draw();

            displayToastie("Sample Deleted Succesfully", "#198754");
          } else {
            console.log(data.error);
            displayToastie(data.error, "#dc3545")
          }
        })
        .catch(console.error);
    } else {
      displayToastie("Sample Deletion Canceled", "#198754");
    }
  }

  function displayToastie(text, color) {
    Toastify({
      text: (text).toString(),
      duration: 3000,
      newWindow: true,
      close: true,
      gravity: "bottom",
      position: "right",
      stopOnFocus: true,
      style: {
        background: color,
      },
      onClick: function() {}
    }).showToast();
  }
</script>