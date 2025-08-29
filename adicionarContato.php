<?php
require 'inc/header.inc.php';

?>

<h1>Adicionar Contato</h1>

<form method="POST" action="adicionarContatoSubmit.php">
    Nome: <br>
    <input type="text" name = "nome"/> <br><br>
    Endereco:<br>
    <input type="text" name = "endereco"/> <br><br>
    Email:<br>
    <input type="email" name="email"/> <br><br>
    Telefone:<br>
    <input type="text" name = "telefone"/> <br><br>
    RedeSocial:<br>
    <input type="text" name = "redesocial"/> <br><br>
    Profissao:<br>
    <input type="text" name = "profissao"/> <br><br>
    Foto:<br>
    <input type="text" name = "foto"/> <br><br>
    Ativo:<br>
    <input type="text" name = "ativo"/> <br><br>
    DataNasc:<br>
    <input type="date" name = "datanasc"/> <br><br>

    <input type="submit" name="btCadastrar" value= "ADICIONAR">
</from>

<?php
require 'inc/footer.inc.php';