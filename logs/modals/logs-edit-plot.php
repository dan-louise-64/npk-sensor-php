<!-- Modal -->
<div class="modal fade" id="plotUpdateModal" tabindex="-1" aria-labelledby="plotUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="plotUpdateModalLabel">Update Plot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="plotUpdateForm" id=plot-update-form>
          <div class="form-row">
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-update-location">Plot Location</label>
              <input type="text" class="form-control" id="plot-update-location" name="plotUpdateLocation" placeholder="Location" maxlength="50" required>
            </div>
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-update-description">Description</label>
              <textarea class="form-control" id="plot-update-description" name="plotUpdateDescription" required> </textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="plot-update-id" value="0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="updateToDatabase()">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function updateData(update_data) {
    $('#plot-update-location').val(update_data.location);
    $('#plot-update-description').val(update_data.description);
    $('#plot-update-id').val(update_data.id);

    $('#plotUpdateModal').modal('show');
  }

  function updateToDatabase() {
    // Data to be sent to the database
    let input_data_arr = [
      document.getElementById('plot-update-location').value,
      document.getElementById('plot-update-description').value,
      document.getElementById('plot-update-id').value,
    ]

    console.log(input_data_arr);

    //send data to event handler
    fetch('./api/plotsEventsHandler.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          request_type: 'editPlot',
          plot_data: input_data_arr
        }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.status == 1) {
          //refresh table
          logsTable.draw();

          $('#plotUpdateModal').modal('hide');
          $("#plot-update-form")[0].reset();
          displayToastie("Log successfully updated.", "#198754")
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