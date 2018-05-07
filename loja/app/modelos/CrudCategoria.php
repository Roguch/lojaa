<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:01
 */

require 'Categoria.php';
require 'DBConnection.php';
class CrudCategoria
{
    private $conexao;

    public function getCategorias()
    {
        $this->conexao = DBConnection::getConexao();

        $sql = 'select * from categoria';

        $resultado = $this->conexao->query($sql);
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];

        foreach ($categorias as $categoria) {
            $listaCategorias[] = new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria'],$categoria['id_categoria']);
        }


        return $listaCategorias;

    }

    public function getCategoria( int $id)
    {
        $this->conexao = DBConnection::getConexao();
        $sql = "select * from categoria WHERE id_categoria = $id";

        $resultado = $this->conexao->query($sql);
        $categorias = $resultado->fetch(PDO::FETCH_ASSOC);

        $listaCategorias = new Categoria($categorias['nome_categoria'], $categorias['descricao_categoria'],$categorias['id_categoria']);


        return $listaCategorias;
    }
    public function insertCategoria(Categoria $cat){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $cat->getNome();
        $dados[] = $cat->getDescricao();
        $dados[] = $cat->getId();
        $this->conexao->exec("insert into categoria(nome_categoria,descricao_categoria) VALUES('$dados[0]','$dados[1]')");

    }
    public function atualizaCategoria(Categoria  $cat,int $id){
        $this->conexao = DBConnection::getConexao();
        $dados[] = $cat->getNome();
        $dados[] = $cat->getDescricao();
        $sql = "UPDATE categoria SET nome_categoria = '$dados[0]',descricao_categoria = '$dados[1]'WHERE id_categoria = $id";
        $this->conexao->exec($sql);
    }
    public function excluirCategoria( int $cat){
        $this->conexao = DBConnection::getConexao();
        $sql ="delete from categoria WHERE id_categoria = $cat";
        $this->conexao->exec($sql);

    }



}





