<!-- Modal -->
<div class="modal fade" id="plotAddModal" tabindex="-1" aria-labelledby="plotAddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="plotAddModalLabel">Add New Plot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="plotAddForm" id=plot-add-form>
          <div class="form-row">
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-add-location">Plot Location</label>
              <input type="text" class="form-control" id="plot-add-location" name="plotAddLocation" placeholder="Location" maxlength="50" required>
            </div>
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-add-description">Description</label>
              <textarea class="form-control" id="plot-add-description" name="plotAddDescription" required> </textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="plot-add-plotid" value="<?php echo $uidPHP = $_SESSION['id']; ?>">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addToDatabase()">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function addData() {
    $('#plot-add-location').val('');
    $('#plot-add-description').val('');

    $('#plotAddModal').modal('show');
  }

  function addToDatabase() {
    // Data to be sent to the database
    let input_data_arr = [
      document.getElementById('plot-add-plotid').value,
      document.getElementById('plot-add-location').value,
      document.getElementById('plot-add-description').value,
    ]

    console.log(input_data_arr);

    //send data to event handler
    fetch('./api/plotsEventsHandler.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          request_type: 'addPlot',
          plot_data: input_data_arr
        }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.status == 1) {
          //refresh table
          logsTable.draw();

          $('#plotAddModal').modal('hide');
          $("#plot-add-form")[0].reset();
          displayToastie("Log successfully added.", "#198754")
        } else {
          console.log(data.error);
          displayToastie(data.error, "#dc3545")
        }
      })
      .catch(console.error);
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