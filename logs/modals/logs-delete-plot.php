<!-- Modal -->
<div class="modal fade" id="plotDeleteModal" tabindex="-1" aria-labelledby="plotDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="plotDeleteModalLabel">Delete Plot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="plotDeleteForm" id=plot-delete-form>
          <div class="form-row">
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-delete-location">Plot Location</label>
              <input type="text" class="form-control" id="plot-delete-location" name="plotDeleteLocation" placeholder="Location" maxlength="50" readonly>
            </div>
            <div class="form-group  mb-3">
              <label style="font-weight: bolder;" for="plot-delete-description">Description</label>
              <textarea class="form-control" id="plot-delete-description" name="plotDeleteDescription" readonly> </textarea>
            </div>
            <div class="form-group  mb-3 text-danger">
              Warning: Deleting this plot will also delete the samples in it.
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="plot-delete-id" value="0">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" onclick="deleteToDatabase()">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function deleteData(delete_data) {
    $('#plot-delete-location').val(delete_data.location);
    $('#plot-delete-description').val(delete_data.description);
    $('#plot-delete-id').val(delete_data.id);

    $('#plotDeleteModal').modal('show');
  }

  function deleteToDatabase() {
    // Data to be sent to the database
    let input_data_arr = [
      document.getElementById('plot-delete-id').value
    ]

    //send data to event handler
    fetch('./api/plotsEventsHandler.php', {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          request_type: 'deletePlot',
          plot_data: input_data_arr
        }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.status == 1) {
          //refresh table
          logsTable.draw();

          $('#plotDeleteModal').modal('hide');
          $("#plot-delete-form")[0].reset();
          displayToastie("Log successfully deleted.", "#198754")
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