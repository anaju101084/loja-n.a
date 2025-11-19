<?php
    require "../../autoload.php";

    // Construir o objeto do produto
    $produto = new Produto();
    $produto->setDescricao($_POST['descricao']);
    $produto->setIdproduto($_POST['id']);
    $produto->setPreco($_POST['preco']);
    $produto->setTamanho($_POST['tamanho']);

    // Construir um objeto do TipoProduto
    $Categoria = new Categoria();
    $Categoria->setIdCategoria($_POST['categoria']);

    // Definir o tipoProduto (objeto da associação) na classe Produto
    $produto->setCategoria($Categoria);


    // Atualizar registro no Banco de Dados
    $dao = new ProdutoDAO();
    $dao->update($produto);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');