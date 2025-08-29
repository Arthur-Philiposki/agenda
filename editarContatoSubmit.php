<?php
include 'classes/contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redesocial = $_POST['redesocial'];
    $profissao = $_POST['profissao'];
    $foto = $_POST['foto'];
    $ativo = $_POST['ativo'];
    $datanasc = $_POST['datanasc'];
    $id = $_POST['id'];

    if(!empty ($email)){
        $contato->editar($nome, $endereco, $email, $telefone, $redesocial, $profissao, $foto, $ativo, $datanasc, $id);
    }
    header("Location: /agenda");
}
?>