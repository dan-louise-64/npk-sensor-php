<div class="table-responsive">
  <table id="log-table" class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Plot ID</th>
        <th scope="col">Location</th>
        <th scope="col" class="text-center">Description</th>
        <th scope="col" class="text-center" style="width: 20%">Action</th>
      </tr>
    </thead>
    <tbody id="logs_data">
    </tbody>
  </table>
</div>
<div>
  UID: <a id="logs-table-uid">
    <?php
    echo $uidPHP = $_SESSION['id'];
    echo "<script> var uid = '$uidPHP'; </script>"
    ?>
  </a>
</div>

<script>
  //datatables
  var logsTable = $('#log-table').DataTable({
    ajax: {
      'url': './api/fetch_plots.php',
      data: {
        uid: uid
      }
    },
    columns: [{
        'data': 'id',
        width: '10%'
      },
      {
        'data': 'location',
        width: '20%'
      },
      {
        'data': 'description',
        width: '60%'
      },
      {
        'data': 'actions',
        width: '10%',
      },
    ],
    processing: true,
    serverSide: true,
  });

  $(document).ready(function() {
    // Draw the table
    logsTable.draw();
    console.log(uid)
  });
</script>