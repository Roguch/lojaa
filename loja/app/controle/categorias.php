<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:34
 */
require_once '../modelos/CrudCategoria.php';

if(isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = "index";
}

switch ($acao){
    case 'index':
        echo '<pre>';
        $crud = new CrudCategoria();
        $categorias = $crud->getCategorias();
        include "../view/templates/cabecalho.php";
        include "../view/categorias/index.php";
        include "../view/templates/rodape.php";
        break;

    case 'exibir':
        $id = $_GET['id'];
        $crud = new CrudCategoria();
        $categoria = $crud->getCategoria($id);
        include '../view/templates/cabecalho.php';
        include '../view/categorias/exibir.php';
        include '../view/templates/rodape.php';
        break;
    case 'inserir':
        if (!isset($_POST['inserir'])) {
            include '../view/templates/cabecalho.php';
            include '../view/categorias/inserir.php';
            include '../view/templates/rodape.php';
        }else{
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaCat = new Categoria($nome,$descricao);
            $crud = new CrudCategoria();
            $crud->insertCategoria($novaCat);
            header('Location: categorias.php');
        }
        break;
    case 'alterar':
        if (!isset($_POST['gravar'])) {
            $id = $_GET['id'];
            $crud = new CrudCategoria();
            $categoria = $crud->getCategoria($id);
            include '../view/templates/cabecalho.php';
            include '../view/categorias/alterar.php';
            include '../view/templates/rodape.php';
        }else{
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaCat = new Categoria($nome,$descricao);
            $crud = new CrudCategoria();
            $crud->atualizaCategoria($novaCat,$id);
            header('Location: categorias.php');
        }
        break;
    case 'excluir':
        $id = $_GET['id'];
        $crud = new CrudCategoria();
        $crud->excluirCategoria($id);
        header('Location: categorias.php');
        break;
}