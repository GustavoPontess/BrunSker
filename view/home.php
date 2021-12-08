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
  <!-- Argon CSS -->
  <link rel="stylesheet" href="public/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="public/img/logo.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="public/img/brand/white.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <span class="nav-link-inner--text">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?classe=Usuario&acao=IrparaLogin" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="./?classe=Imovel&acao=IrparaCadastro" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/gustavo.pontes.716533/" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/pontes_gustavo__/" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/Guputasso" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/GustavoPontess" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container mt-3">
        <div class="row mb-3">
            <?php foreach ($homes as $home) { ?>
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                            <img src="public/img/banner.jfif" alt="logo" class="img-fluid mb-3" style="width: 90vh;">

                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $home->tipo_locacao ;?></h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo $home->tipo_imovel; ?></span>
                                    <h3 class="h1 font-weight-bold mb-0">R$ <?php echo $home->valor_imovel; ?></h3>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                        <i class="ni ni-favourite-28"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success "><i class="fas fa-bed mr-1"></i><?php echo $home->quant_quartos; ?></span>
                                <span class="text-nowrap">Quartos</span>
                                <span>-</span>
                                <span class="text-success"><i class="fas fa-star mr-1"></i><?php echo $home->quant_quartos; ?></span>
                                <span class="text-nowrap">Suítes</span>
                                <br>
                                <span class="text-success"><i class="fas fa-bath mr-1"></i><?php echo $home->quant_quartos; ?></span>
                                <span class="text-nowrap">Banheiros</span>
                                <span>-</span>
                                <span class="text-success"><i class="fas fa-parking mr-1"></i><?php echo $home->quant_quartos; ?></span>
                                <span class="text-nowrap">Vagas</span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
  <!-- Footer -->

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="public/vendor/jquery/dist/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="public/vendor/js-cookie/js.cookie.js"></script>
  <script src="public/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="public/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="public/js/argon.js?v=1.2.0"></script>
</body>

</html>