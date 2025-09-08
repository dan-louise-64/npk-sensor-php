<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary flex-shrink-0 position-relative">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h2 class="offcanvas-title" id="sidebarMenuLabel">NPK SENSOR</h2>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="d-flex offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="home.php">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="logs.php">
            <i class="bi bi-clipboard"></i> Plots
          </a>
        </li>
      </ul>
      <hr>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="profile.php">
            <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['name'], ENT_QUOTES) ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="api/logout.php">
            <i class="bi bi-box-arrow-left"></i> Sign out
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>