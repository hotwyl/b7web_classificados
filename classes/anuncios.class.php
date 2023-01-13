<?php
class Anuncios {
    public function getMeusAnuncios() {
        global $pdo;

        $array = array();
        $sql = $pdo->prepare("SELECT 
            *, (SELECT anuncios_imagens.url 
                FROM anuncios_imagens
                WHERE anuncios_imagens.id_anuncio  = anuncios.id limit 1) as url 
            FROM anuncios WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function addAnuncio($titulo, $categotia, $valor, $descricao, $estado){
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");

        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":categoria", intval($categotia));
        $sql->bindValue(":id_usuario", intval($_SESSION['cLogin']));
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", floatval($valor));
        $sql->bindValue(":estado", intval($estado));
        $sql->execute();
    }
}