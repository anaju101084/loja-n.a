<?php
    require "../../autoload.php";

    // Construir o objeto do categoria
    $categoria = new Categoria();
    $categoria->setDescricao($_POST['descricao']);


    // Atualizar registro no Banco de Dados
    $dao = new CategoriaDAO();
    $dao->update($descricao);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');