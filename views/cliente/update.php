<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setIdCliente($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new ClienteDAO();
    $dao->update($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');