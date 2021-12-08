<?php
session_start();

            require_once "inc/config.php";

            // Resolvendo a CLASSE a ser utilizada e a ACAO a ser utilizada
            if ( isset($_GET['classe']) && isset($_GET['acao']) ){

                // pega os dados via GET para o controlador
                $controller = $_GET['classe'].'Controller';
                $acao = $_GET['acao'];
            }else{

                // pega os dados DEFAULT para o controlador
                $controller = 'ImovelController';
                $acao = 'all';

            }

            // controlador
            require_once "controller/".$controller.".php";
            $app = new $controller();
            $app->$acao();

            ?>
