<?php

/**
 * @author BRUNo Souza
 * data agosto/2024
 * Classe com conexao a banco de dados
 * @return boolean 
 */

class Contato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    /**
     * @author Bruno Souza
     * data agosto/2024
     * Metodo de conexao ao banco de dados
     * @return boolean 
     */
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
       
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    function __construct(){
        #o PDO precisa de 3 parametros 
        $dsn    = "mysql:dbname=etimcontato;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);

            /* echo "<script>
                   alert('Conectado ao banco')
                </script>";*/

        } catch (\Throwable $th) {
            echo "<script>
                    alert(`Banco indisponivel, tente mais tarde!`)
                 </script>";
            // echo $th;
        }
    }

       
    function insertUser($nome,$email,$senha){
        //passo 1  cria uam variavel com a consulta SQL
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha =:s;";

        //passo 2 quando tem apelidos temos que usar o metodo prepare
        $sql = $this->pdo->prepare($sql);

        //passo 3 depois do prepare usar o bindValue, um pra cada apelido
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);

        //passo 4 executar o comando
        return $sql->execute();
    }

    function insertAtividade($desc,$nome_prof,$data_venc){
        $atvd = "INSERT INTO atividade SET descricao = :d, nome_prof = :np, data_venc = :dv";

        $atvd = $this->pdo->prepare($atvd);

        $atvd->bindValue(":d",$desc);
        $atvd->bindValue(":np",$nome_prof);
        $atvd->bindValue(":dv",$data_venc);

        return $atvd->execute();
    }

    function verificarEmailExiste($email) {
        $sql = "SELECT email FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':e', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;  // Email já existe
        } else {
            return false; // Email não existe
        }
    }

    function verificarLogin($email, $senha) {
        // Preparar a consulta para buscar o e-mail
        $sql = "SELECT senha FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':e', $email, PDO::PARAM_STR);
        $stmt->execute();
    
        // Verificar se o e-mail existe
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $senhaUser = $usuario['senha']; // Senha armazenada no banco (hash)
    
            // Verificar a senha usando password_verify()
            if($senhaUser == $senha){
                return true;
                
            } else{
                return false;
            }
        } else {
            return false; // E-mail não encontrado

        }
    }

    function getNomeUser($email){
        $sql = "SELECT nome FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':e', $email, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomeUser = $usuario['nome'];
        return $nomeUser;
    }
}