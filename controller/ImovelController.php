<?php
require_once 'model/Imovel.php';

class ImovelController
{

    public function all(){

        $obj = new Imovel();
        $homes = $obj->all();
        include 'view/home.php';
    }

    public function IrparaCadastro(){
        $_SESSION["msg"] = "";

        include 'view/register.php';
    }

    public function delete(){
        $obj = new Imovel();
        $obj->setIdImovel($_GET["id"]);
        $obj -> delete();
        header("Location: ./?classe=Usuario&acao=ListImovel");
    }
    public function view(){
        $obj = new Imovel();
        $obj->setIdImovel($_GET["id"]);
        $homes = $obj->view();
        include 'view/view_imovel.php';
    }
    public function IrparaUpdate(){
        $_SESSION["msg"] = "";
        $obj = new Imovel();
        $obj->setIdImovel($_GET["id"]);
        $obj->IrparaUpdate();
        include 'view/update_imovel.php';
    }
    public function update(){
        $_SESSION["msg"] = "";

        $obj = new Imovel();

        if (isset($_POST["nome_imovel"]) && isset($_POST["cep"])) {

            $obj->setNome_imovel($_POST["nome_imovel"]);
            $obj->setValorImovel($_POST["valor_imovel"]);
            $obj->setTipoImovel($_POST["tipo_imovel"]);
            $obj->setTipoLocacao($_POST["tipo_locacao"]);
            $obj->setQuantQuartos($_POST["quantidade_quartos"]);
            $obj->setQuantSuites($_POST["quantidade_suites"]);
            $obj->setQuantBanheiros($_POST["quantidade_banheiros"]);
            $obj->setQuantVagas($_POST["quantidade_vagas"]);
            // Endereço
            $obj->setCep($_POST["cep"]);
            $obj->setLogradouro($_POST["rua"]);
            $obj->setBairro($_POST["bairro"]);
            $obj->setLocalidade($_POST["cidade"]);
            $obj->setUf($_POST["uf"]);
            $obj->setNumero($_POST["numero"]);

            $obj->update();

        }else{
            require_once "view/cadastro.php";
        }
    }
    public function create(){
        $_SESSION["msg"] = "";

        $obj = new Imovel();

        if (isset($_POST["nome_imovel"]) && isset($_POST["cep"])) {

            $obj->setNome_imovel($_POST["nome_imovel"]);
            $obj->setValorImovel($_POST["valor_imovel"]);
            $obj->setTipoImovel($_POST["tipo_imovel"]);
            $obj->setTipoLocacao($_POST["tipo_locacao"]);
            $obj->setQuantQuartos($_POST["quantidade_quartos"]);
            $obj->setQuantSuites($_POST["quantidade_suites"]);
            $obj->setQuantBanheiros($_POST["quantidade_banheiros"]);
            $obj->setQuantVagas($_POST["quantidade_vagas"]);
            // Endereço
            $obj->setCep($_POST["cep"]);
            $obj->setLogradouro($_POST["rua"]);
            $obj->setBairro($_POST["bairro"]);
            $obj->setLocalidade($_POST["cidade"]);
            $obj->setUf($_POST["uf"]);
            $obj->setNumero($_POST["numero"]);

            $obj->create();

        }else{
            require_once "view/cadastro.php";
        }
    }
}


