<?php

class Imovel
{
// usuario
    private $id_imovel;
    private $nome_imovel;
    private $valor_imovel;
    private $tipo_imovel;
    private $tipo_locacao;
    private $quant_quartos;
    private $quant_suites;
    private $quant_banheiros;
    private $quant_vagas;

    // endereco do usuario
    private $id_adress;
    private $cep;
    private $logradouro;
    private $complemento;
    private $bairro;
    private $localidade;
    private $uf;
    private $numero;
    private $con;




    public function __construct($id=null)
    {
        $this->id = $id;

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);

    }

    public function all(){
        $sql = $this->con->prepare("SELECT * FROM tbl_imoveis");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function delete(){
        $sql = $this->con->prepare("DELETE from  adress_imoveis where id_adress_imovel = ?");
        $sql->execute([
            $this->id_imovel
        ]);
        $sql = $this->con->prepare("DELETE from  tbl_imoveis where id_imovel = ?");
        $sql->execute([
            $this->id_imovel
        ]);
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function IrparaUpdate(){
        $sql = $this->con->prepare("SELECT * from tbl_imoveis as imv inner join adress_imoveis as adr on imv.id_imovel = ? where adr.id_adress_imovel = ?;");
        $sql->execute([ $this->id_imovel, $this->id_imovel ]);
        $row = $sql->fetchObject();
        $_SESSION['view'] = $row;
        return $row;
    }
    public function view(){
        $sql = $this->con->prepare("SELECT * from tbl_imoveis as imv inner join adress_imoveis as adr on imv.id_imovel = ? where adr.id_adress_imovel = ?;");
        $sql->execute([
            $this->id_imovel,
            $this->id_imovel
        ]);
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    
    public function update(){
        if($this->nome_imovel != "" && $this->cep != ""){
            $sql = $this->con->prepare("UPDATE tbl_imoveis set nome_imovel=?,valor_imovel=?,tipo_imovel =?,
            tipo_locacao=?,quant_quartos=?,quant_suites=?,quant_banheiros=?,quant_vagas=? WHERE id_imovel = ?");
            $sql->execute([
            $this->nome_imovel,
            $this->valor_imovel,
            $this->tipo_imovel, 
            $this->tipo_locacao, 
            $this->quant_quartos,
            $this->quant_suites,
            $this->quant_banheiros,
            $this->quant_vagas,
            $_SESSION['view']->id_imovel
        ]);
            
            $sql = $this->con->prepare("UPDATE adress_imoveis SET cep=?,logradouro=?,bairro=?,localidade=?,
            uf=?,numero=? WHERE id_adress_imovel=?");
            $sql->execute([
            $this->cep,
            $this->logradouro,
            $this->bairro,
            $this->localidade,
            $this->uf,
            $this->numero,
            $_SESSION['view']->id_imovel
            ]);


            if ( $sql->errorCode()=='00000'){
                $_SESSION['msg'] = "Imovel Alterado com sucesso!";
                header("Location: ./?classe=Usuario&acao=ListImovel");
            }else{
                echo "<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
            }
        }else{
            include ('view/update_imovel.php');
            $_SESSION["msg"] = "Campos não preenchidos.";
        }
    }
    public function create() {
            if($this->nome_imovel != "" && $this->cep != ""){
            $sql = $this->con->prepare("INSERT INTO tbl_imoveis (id_imovel, nome_imovel,valor_imovel, tipo_imovel,
                tipo_locacao,quant_quartos,quant_suites,quant_banheiros,quant_vagas,id_imovel_usuario) VALUES (null, ?,?,?,?,?,?,?,?,?)");

            $sql->execute([
            $this->nome_imovel,
            $this->valor_imovel,
            $this->tipo_imovel, 
            $this->tipo_locacao, 
            $this->quant_quartos,
            $this->quant_suites,
            $this->quant_banheiros,
            $this->quant_vagas,
            $_SESSION['usuario']->id_usuario
        ]);
            
            $sql = $this->con->prepare("INSERT INTO adress_imoveis (id_adress, cep,logradouro,bairro,localidade,
            uf,numero,id_adress_imovel) VALUES (null, ?,?,?,?,?,?,?)");
            $sql->execute([
            $this->cep,
            $this->logradouro,
            $this->bairro,
            $this->localidade,
            $this->uf,
            $this->numero,
            $this->con->lastInsertId()
            ]);


            if ( $sql->errorCode()=='00000'){
                $_SESSION['msg'] = "Imovel Cadastrado com sucesso!";
                include ("view/cadastro_imovel.php");
            }else{
                echo "<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
            }
        }else{
            include ('view/cadastro.php');
            $_SESSION["msg"] = "Campos não preenchidos.";
        }
    }

    /**
     * @return mixed
     */
    public function getIdImovel()
    {
        return $this->id_imovel;
    }

    /**
     * @param mixed $id_imovel
     */
    public function setIdImovel($id_imovel)
    {
        $this->id_imovel = $id_imovel;

    }

    /**
     * @return mixed
     */
    public function getNome_imovel()
    {
        return $this->nome_imovel;
    }

    /**
     * @param mixed $id_imovel
     */
    public function setNome_imovel($nome_imovel)
    {
        $this->nome_imovel = $nome_imovel;
    }

    /**
     * @return mixed
     */
    public function getValorImovel()
    {
        return $this->valor_imovel;
    }

    /**
     * @param mixed $valor_imovel
     */
    public function setValorImovel($valor_imovel)
    {
        $this->valor_imovel = $valor_imovel;
    }

    /**
     * @return mixed
     */
    public function getTipoImovel()
    {
        return $this->tipo_imovel;
    }

    /**
     * @param mixed $tipo_imovel
     */
    public function setTipoImovel($tipo_imovel)
    {
        $this->tipo_imovel = $tipo_imovel;
    }

    /**
     * @return mixed
     */
    public function getTipoLocacao()
    {
        return $this->tipo_locacao;
    }

    /**
     * @param mixed $tipo_locacao
     */
    public function setTipoLocacao($tipo_locacao)
    {
        $this->tipo_locacao = $tipo_locacao;
    }

    /**
     * @return mixed
     */
    public function getQuantQuartos()
    {
        return $this->quant_quartos;
    }

    /**
     * @param mixed $quant_quartos
     */
    public function setQuantQuartos($quant_quartos)
    {
        $this->quant_quartos = $quant_quartos;
    }

    /**
     * @return mixed
     */
    public function getQuantSuites()
    {
        return $this->quant_suites;
    }

    /**
     * @param mixed $quant_suites
     */
    public function setQuantSuites($quant_suites)
    {
        $this->quant_suites = $quant_suites;
    }

    /**
     * @return mixed
     */
    public function getQuantBanheiros()
    {
        return $this->quant_banheiros;
    }

    /**
     * @param mixed $quant_banheiros
     */
    public function setQuantBanheiros($quant_banheiros)
    {
        $this->quant_banheiros = $quant_banheiros;
    }

    /**
     * @return mixed
     */
    public function getQuantVagas()
    {
        return $this->quant_vagas;
    }

    /**
     * @param mixed $quant_vagas
     */
    public function setQuantVagas($quant_vagas)
    {
        $this->quant_vagas = $quant_vagas;
    }

    /**
     * @return mixed
     */
    public function getIdAdress()
    {
        return $this->id_adress;
    }

    /**
     * @param mixed $id_adress
     */
    public function setIdAdress($id_adress)
    {
        $this->id_adress = $id_adress;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * @param mixed $localidade
     */
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

     /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
}
