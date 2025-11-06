<?php
    require "../../autoload.php";

    // Construir o objeto do Produto
    $produto = new Produto_VendaDAO();
    $produto->setVenda($_POST['venda_idvenda']);

    // Construir um objeto do TipoProduto
    $tipoProduto = new TipoProduto();
    $tipoProduto->setvenda_idvenda($_POST['tipo_produto']);

    // Definir o tipoProduto (objeto da associação) na classe Produto
    $produto->setTipoProduto($tipoProduto);

    // Inserir no Banco de Dados
    $dao = new Produto_VendaDAO();
    $dao->create($produto);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');