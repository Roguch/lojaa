<h2>Categoria: <?= $categoria->getNome()?></h2>

<p>Descricao:<?= $categoria->getDescricao()?> </p>

<a href="categorias.php?acao=alterar&id=<?= $categoria->getId()?>">Editar</a>
<a href="categorias.php?acao=excluir&id=<?= $categoria->getId()?>">Excluir</a>