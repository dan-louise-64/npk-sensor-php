<main class="col-md-9 col-lg-10 px-md-4">
  <br>
  <h2>Profile Page</h2>
  <div>
    <p>Your account details are below:</p>
    <table>
      <tr>
        <td>Username:</td>
        <td><?= htmlspecialchars($_SESSION['name'], ENT_QUOTES) ?></td>
      </tr>
      <tr>
        <td>UID:</td>
        <td><?= htmlspecialchars($_SESSION['id'], ENT_QUOTES) ?></td>
      </tr>
    </table>
  </div>
</main>