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

  <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
           
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="public/img/logo-preto.png">
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
          <div class="row py-4">
            <div class="col-lg-6 col-5">
              <a href="./?classe=Usuario&acao=ListImovel" class="btn btn-sm btn-neutral"><i class="ni ni-bold-left"></i> Voltar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6" >
      <div class="row">
    
        <div class="col-xl-12" >
          <div class="card" >
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Cadastro de imóveis</h6>
                  <h5 class="h3 mb-0">Cadastre imóveis</h5>
                  <?php echo  $_SESSION['msg'] ?>
                </div>
              </div>
            </div>
            <div class="card-body" >
              <form role="form" action="./?classe=Imovel&acao=create" method="post">
                <div class="row">
                  <!-- Nome do Imovel -->
                  <div class="col-lg-6">
                    <div class="form-group ">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        </div>
                        <input class="form-control" name="nome_imovel" placeholder="Nome do Imóvel" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Valor Imovel -->
                  <div class="col-lg-6">
                    <div class="form-group ">
                      <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input class="form-control" name="valor_imovel" placeholder="Valor do Imóvel" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Tipo Imovel -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="tipo_imovel" placeholder="Tipo de imóvel" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Tipo de locação -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="tipo_locacao" placeholder="Tipo de Locação" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Quantidade de quartos -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-fat-add"></i></span>
                        </div>
                        <input class="form-control" name="quantidade_quartos" placeholder="Quantidade de Quartos" type="number">
                      </div>
                    </div>
                  </div>
                  <!-- Quantidades Suites -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="quantidade_suites" placeholder="Quantidade de Suites" type="number">
                      </div>
                    </div>
                  </div>
                  <!-- Quantidades Banheiros -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="quantidade_banheiros" placeholder="Quantidade de Banheiros" type="number">
                      </div>
                    </div>
                  </div>
                  <!-- Quantidades Vagas -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" name="quantidade_vagas" placeholder="Quantidade de Vagas" type="number">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">Endereço</div>
                  <!-- cep -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="CEP" type="number"
                        name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                        onblur="pesquisacep(this.value);">
                      </div>
                    </div>
                  </div>
                  <!-- Rua -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Rua" name="rua" type="text" id="rua" size="60">
                      </div>
                    </div>
                  </div>
                  <!-- Bairro -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Bairro" name="bairro" type="text" id="bairro" size="100">
                      </div>
                    </div>
                  </div>
                  <!-- Cidade -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Cidade" name="cidade" type="text" id="cidade" size="100">
                      </div>
                    </div>
                  </div>
                  <!-- Estado -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Estado" name="uf" type="text" id="uf" size="2">
                      </div>
                    </div>
                  </div>
                  <!-- Número -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Número" name="numero" type="text" id="uf" size="2">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-2">Cadastrar imóvel</button>
                </div>
              </form>           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Footer -->
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"></a>
          </div>
        </div>
      </div>
    </footer>
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