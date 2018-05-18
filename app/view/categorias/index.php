    <a href="categorias.php?acao=inserir">Inserir Categoria</a>
<h1>Categoria</h1>
    <table>
        <tr>
            <th>#</th>
            <th>nome</th>
        </tr>

<?php foreach ($categorias as $categoria): ?>
        <tr>
            <td></a><?= $categoria->getId() ?></td>
            <td><a href="categorias.php?acao=exibir&id=<?=$categoria->getID()?>"><?= $categoria->getNome() ?></a></td>
        </tr>
<?php endforeach;?>
    </table>

