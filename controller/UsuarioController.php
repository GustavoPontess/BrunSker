<?php
require_once 'model/Usuario.php';

class UsuarioController
{

    public function all(){

        $obj = new Imovel();
        $homes = $obj->all();
        include 'view/homes.php';
    }


     public function create(){
        $_SESSION["msg"] = "";

        $obj = new Usuario();

        if (isset($_POST["nome"])) {

            $obj->setNome($_POST["nome"]);
            $obj->setEmail($_POST["email"]);
            $obj->setSenha($_POST["senha"]);

            $obj->create();

        }else{
            require_once "view/register.php";
        }
    }

    public function IrparaLogin(){
        $_SESSION["msg"] = "";
        include 'view/login.php';
      }

    public function login(){
        $obj = new Usuario();
        if (isset($_POST["email"]) && isset($_POST["senha"])) {

            $obj->setNome($_POST["email"]);
            $obj->setSenha($_POST["senha"]);
            $obj->login();
        }
    }
    public function logout(){
        session_destroy(); 
        $obj = new Usuario();
        $obj->logout();
    }
    public function ListImovel(){
        $obj = new Usuario();
        $homes = $obj->ListImovel();
        include 'view/dashboard.php';
    }
    public function IrparaDeshboard(){
        $_SESSION["msg"] = "";
        include 'view/dashboard.php';
    }
    public function IrparaCadastro_imovel(){
        $_SESSION["msg"] = "";
        include 'view/cadastro_imovel.php';
    }
}


