<?php
require 'inc/header.inc.php';
include 'classes/contato.class.php';
$contato = new Contato ();

if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $info = $contato->buscar($id);
    if(empty($info['email'])){
        header("Location: /agenda");         //talvez nome do banco
        exit;
    }
}else{
    header("Location: /agenda");            //aqui tmb
    exit;
}

?>

<h1>EDITAR Contato</h1>

<form method="POST" action="editarContatoSubmit.php">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

    Nome: <br>
    <input type="text" name = "nome" value="<?php echo $info['nome']; ?>"/> <br><br>
    Endereco:<br>
    <input type="text" name = "endereco" value="<?php echo $info['endereco']; ?>"/> <br><br>
    Email:<br>
    <input type="email" name="email" value="<?php echo $info['email']; ?>"/> <br><br>
    Telefone:<br>
    <input type="text" name = "telefone" value="<?php echo $info['telefone']; ?>"/> <br><br>
    RedeSocial:<br>
    <input type="text" name = "redesocial" value="<?php echo $info['redesocial']; ?>"/> <br><br>
    Profissao:<br>
    <input type="text" name = "profissao" value="<?php echo $info['profissao']; ?>"/> <br><br>
    Foto:<br>
    <input type="text" name = "foto" value="<?php echo $info['foto']; ?>"/> <br><br>
    Ativo:<br>
    <input type="text" name = "ativo" value="<?php echo $info['ativo']; ?>"/> <br><br>
    DataNasc:<br>
    <input type="date" name = "datanasc" value="<?php echo $info['datanasc']; ?>"/> <br><br>

    <input type="submit" value= "SALVAR">
</from>

<?php
require 'inc/footer.inc.php';