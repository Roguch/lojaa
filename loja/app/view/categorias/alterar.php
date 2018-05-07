<h2>Alterar Categoria</h2>

<form method="post" action="categorias.php?acao=alterar">

    <label for="nome"></label>
    <input type="hidden" name="id" value="<?= $categoria->getId()?>">
    <input type="text" name="nome" id="nome" value="<?=$categoria->getNome()?>">
    <br>
    <label for="descricao">Descricao</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$categoria->getDescricao()?></textarea>
    <input type="submit" name="gravar" value="Gravar"/>



</form>