<?php
class Usuario{
    
    private $id_usuario;
    private $nome;
    private $email;
    private $telefone;

    private $con;

    public function __construct(){
        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);        
    }
    
    public function all(){
        // O MÉTOD PREPARE DA CLASS PDO ACEITA INSTRUÇÕES SQL
        $sql = $this->con->prepare("SELECT * FROM tbl_Imovel ORDER BY IdImovel");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function create() {

        $sql = $this->con->prepare("SELECT * FROM tbl_users where email=?");
        $sql->execute( array($_POST['email']));
        $row = $sql->fetchObject();
        if ($row){
            $_SESSION['msg'] = "Usuario já cadastrado, por favor tente outro.";
             include 'view/register.php';
           }
           else{
                if($this->nome != "" && $this->email != ""){
                $sql = $this->con->prepare("INSERT INTO tbl_users (id_usuario, nome, email,senha) VALUES (null, ?,?,sha1(?))");
                $sql->execute([
                $this->nome,
                $this->email,
                $this->senha]);
                
                if ( $sql->errorCode()=='00000'){
                    include ('view/login.php');
                    $_SESSION["msg"] = "Cadastro realizado com sucesso. Logue-se";
                }else{
                    echo "<div class='alert alert-danger'>".$sql->errorInfo()[2]."</div>";
                }
                }else{
                    include ('view/cadastro.php');
                    $_SESSION["msg"] = "Campos não preenchidos.";
                }
            }
    }
    public function login(){
        // procura o usuario no banco de dados
        $sql = $this->con->prepare("SELECT * FROM tbl_users  WHERE email =? and senha =sha1(?);");
        $sql->execute( array($_POST['email'], $_POST['senha']) );
        $row = $sql->fetchObject();
        if ($row){
        $_SESSION['usuario'] = $row;
        header("Location: ./?classe=Usuario&acao=ListImovel");
        //include("view/dashboard.php");
        }else{
            $_SESSION['msg'] = "Usuario ou senha incorretas.";
            include ("view/login.php");
        }
    }
    public function logout(){
        header("Location: ./?classe=Imovel&acao=all");
        //include ("view/home.php");
    }

    public function ListImovel(){
        // O MÉTOD PREPARE DA CLASS PDO ACEITA INSTRUÇÕES SQL
        $sql = $this->con->prepare("SELECT * FROM tbl_imoveis WHERE id_imovel_usuario = ?");
        $sql->execute([
            $_SESSION['usuario']->id_usuario
        ]);
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    /**
     * @return mixed
     */
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $IdImovel
     * @return Usuario
     */
    public function setIdImovel($id_usuario)
    {
        $this->id_usuario = $id_usuario;
        return $this;
    }


   
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $tiporc
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $venalu
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $venalu
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    
    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $tipo
     * @return Usuario
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }
}