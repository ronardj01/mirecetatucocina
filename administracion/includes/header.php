<header>
    <nav class="navbar navbar-expand-lg bg-dark py-2" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand px-5" href="../../index.php"> <img src="../../img/logo/logo.svg" alt="Logo" width="100"
            height="100" class="d-inline-block align-text-top"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item px-5 fs-2">
              <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item px-5 fs-2">
              <a class="nav-link active" href="crear.php">Crear</a>
            </li>
            <li class="nav-item px-5 fs-2">
              <a class="nav-link" href="editar.php">Editar</a>
            </li>
            <li class="nav-item px-5 fs-2">
              <a class="nav-link" href="eliminar.php">Eliminar</a>
            </li>
            <li class="nav-item px-5 fs-2 ms-5">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php get_message();?>
  </header>
