<?php 
header("Content-type:text/html; charset=utf8");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>BrunSker</title>
  <!-- Favicon -->
  <link rel="icon" href="public/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="public/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="public/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="public/css/argon.css?v=1.2.0" type="text/css">
</head>
<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="public/img/logo-preto.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="./?classe=Usuario&acao=ListImovel">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="public/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['usuario']->nome ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="./?classe=Usuario&acao=logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Seus imóveis cadastrados</h3>
                </div>
                <div class="col text-right">
                  <a href="./?classe=Usuario&acao=IrparaCadastro_imovel" class="btn btn-sm btn-primary">Novo imóvel</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Locação</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($homes != '0'){ ?>
                    <?php foreach ($homes as $home) { ?>
                      <tr class="text-center">
                        <td><?php echo $home->nome_imovel;?></td>
                        <td>R$ <?php echo $home->valor_imovel;?></td>
                        <td><?php echo $home->tipo_imovel;?></td>
                        <td><?php echo $home->tipo_locacao;?></td>
                        <td>
                          <a href="./?classe=Imovel&acao=IrparaUpdate&id=<?php echo $home->id_imovel;?>" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                          <a href="./?classe=Imovel&acao=delete&id=<?php echo $home->id_imovel;?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                          <a href="./?classe=Imovel&acao=view&id=<?php echo $home->id_imovel;?>" class="btn btn-outline-darker"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    <?php }
                  }else{?>
                    <tr>
                        <td colspan="12"> Nenhum aluno cadastrado no sistema !!!</td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="public/vendor/jquery/dist/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="public/vendor/js-cookie/js.cookie.js"></script>
  <script src="public/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="public/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="public/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="public/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="public/js/argon.js?v=1.2.0"></script>
</body>

</html>