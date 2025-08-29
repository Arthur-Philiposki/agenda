<?php
require 'conexao.class.php';
class Contato {                   //fechamento da clas é a ultima coisa
    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;
    private $redesocial;
    private $profissao;
    private $foto;
    private $ativo;
    private $datanasc;

    private $con;

    public function __construct(){
        $this->con = new Conexao ();
    }
    private function existeEmail($email){
        $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
        $sql->bindParam (':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();   //fetch retorna o email encontrado

        }else {
            $array = array();
        }
        return $array;
    }

    public function adicionar($email, $nome, $endereco, $telefone, $redesocial, $profissao, $foto, $ativo, $datanasc){
        $emailExistente = $this->existeEmail($email);
            if(count($emailExistente) == 0 ){
                try {
                    $this->nome = $nome;
                    $this->endereco = $endereco;
                    $this->email = $email;
                    $this->telefone = $telefone;
                    $this->redesocial = $redesocial;
                    $this->profissao = $profissao;
                    $this->foto = $foto;
                    $this->ativo = $ativo;
                    $this->datanasc = $datanasc;
                    $sql = $this->con->conectar()->prepare("INSERT INTO contatos(nome, endereco, email, telefone, redesocial, profissao, foto, ativo, datanasc) 
                     VALUES (:nome, :endereco, :email, :telefone, :redesocial, :profissao, :foto, :ativo, :datanasc)");
                    $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                    $sql->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);
                    $sql->bindParam("email", $this->email, PDO::PARAM_STR);
                    $sql->bindParam("telefone", $this->telefone, PDO::PARAM_STR);
                    $sql->bindParam("redesocial", $this->redesocial, PDO::PARAM_STR);
                    $sql->bindParam("profissao", $this->profissao, PDO::PARAM_STR);
                    $sql->bindParam("foto", $this->foto, PDO::PARAM_STR);
                    $sql->bindParam("ativo", $this->ativo, PDO::PARAM_STR);
                    $sql->bindParam("datanasc", $this->datanasc, PDO::PARAM_STR);
                    $sql->execute();
                    return TRUE;
                }catch(PDOException $ex){
                    return 'ERRO: '.$ex->getMessage();
                }
            }else {
                return FALSE;
            }
    }
    public function listar() {
        try{
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $ex){
            echo 'ERRO: '.$ex->getMessage();
        }
    }
    public function buscar($id){
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }catch(PDOException $ex){
            echo "ERROR: ".$ex->getMessage();
        }
    }
    public function editar($email, $nome, $endereco, $telefone, $redesocial, $profissao, $foto, $ativo, $datanasc, $id){
        $emailExistente = $this->existeEmail($email);
        if(count($emailExistente) > 0 && $emailExistente['id']!=$id){
            return FALSE;
        }else{
            try{
                $sql = $this->con->conectar()->prepare("UPDATE contatos SET nome = :nome, endereco = :endereco, email = :email, telefone = :telefone, redesocial = :redesocial, profissao = :profissao, foto = :foto, ativo = :ativo, datanasc = :datanasc WHERE id = :id");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':endereco', $endereco);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':redesocial', $redesocial);
                $sql->bindValue(':profissao', $profissao);
                $sql->bindValue(':foto', $foto);
                $sql->bindValue(':ativo', $ativo);
                $sql->bindValue(':datanasc', $datanasc);
                $sql->bindValue(':id', $id);
                $sql->execute();
                return TRUE;

            }catch(PDOException $ex){
                echo 'ERRO: '.$ex->getMessage();
            }
        }
    }
}