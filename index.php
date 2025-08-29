<?php
include 'inc/header.inc.php';
include 'classes/contato.class.php';
include 'classes/funcoes.class.php';

$contato = new Contato();

$fn = new Funcoes();             /////////////

?>

<h1>Agenda Senac 2025</h1>
<button><a href="adicionarContato.php">ADICIONAR</a></button>

<table border="5" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Endereco</th>
        <th>Telefone</th>
        <th>Redesocial</th>
        <th>Profissao</th>
        <th>Foto</th>
        <th>Ativo</th>
        <th>DataNasc</th>
        <th>Açoes</th>
    </tr>

    <?php
    $lista = $contato->listar();
    foreach($lista as $item):
    ?>

    <tbody>
        <tr>
            <td><?php echo $item['id'];?></td>
            <td><?php echo $item['nome'];?></td>
            <td><?php echo $item['email'];?></td>
            <td><?php echo $item['endereco'];?></td>
            <td><?php echo $item['telefone'];?></td>
            <td><?php echo $item['redesocial'];?></td>
            <td><?php echo $item['profissao'];?></td>
            <td><?php echo $item['foto'];?></td>
            <td><?php echo $item['ativo'];?></td>
            <td><?php echo $fn->dtnasc($item['datanasc'], 2);?></td>
            <td>
                <a href="editarContato.php?id=<?php echo $item['id']?>">EDITAR</a>
                <a href="#">/ EXCLUIR</a>
            </td>
        </tr>
    </tbody>

    <?php
    endforeach;
    ?>

</table>

<?php
include 'inc/footer.inc.php';
?>