<?php
    require "../../autoload.php";

    // Construir o objeto do Categoria
    $categoria = new Categoria();
    $categoria->setdescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new CategoriaDAO();
    $dao->create($categoria);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');