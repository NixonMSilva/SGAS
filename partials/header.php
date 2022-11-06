<!-- Custom styles for this template -->
<head>
<link href="../css/sgas/header.css" rel="stylesheet">
</head>
<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="?page=home" class="nav-link px-2 text-secondary">Página Inicial</a></li>
          <?php
            if (isset($_SESSION['is_logged']))
            {
              ?>
              <li><a href="#" class="nav-link px-2 text-white">Listar Salas</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Suas Alocações</a></li>
              <?php
              if (isManager($_SESSION['user_type']))
              {
                ?>
                <li><a href="index.php?page=add_classroom" class="nav-link px-2 text-white">Adc. Salas</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Solicitações</a></li>
                <?php
                if (isAdmin($_SESSION['user_type']))
                {
                  ?>
                  <li><a href="#" class="nav-link px-2 text-white">Adc. Institutos</a></li>
                  <li><a href="#" class="nav-link px-2 text-white">Listar Usuários</a></li>
                  <?php
                }
              }
            }
            ?>
          <li><a href="#" class="nav-link px-2 text-white">Sobre</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Pesquisar Salas..." aria-label="Search">
        </form>

        <div class="text-end">
          
          <?php
            if (isset($_SESSION['is_logged']))
            {
              ?><button type="button" class="btn btn-warning" onclick="location.href='logout_user.php'">Logout</button><?php
            }
            else
            {
              ?><button type="button" class="btn btn-warning" onclick="location.href='index.php?page=signup'">Cadastro</button><?php
            }
          ?>
        </div>
      </div>
    </div>
  </header>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>