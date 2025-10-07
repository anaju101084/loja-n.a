<?php
    require "../../autoload.php";

    // Construir o objeto do cliente
    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);

    // Inserir no Banco de Dados
    $dao = new ClienteDAO();
    $dao->create($cliente);

    // Redirecionar para o index x (comentar quando nao funcionar)
    header('Location: index.php');