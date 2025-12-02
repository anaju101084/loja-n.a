<?php
    require "../../autoload.php";

    // Construir o objeto do venda
    $venda = new Venda();
    $venda->setPreco($_POST['preco']);
    $venda->setData($_POST['data']);

    // Construir um objeto do Tipovenda
    $Cliente = new Cliente();
    $Cliente->setIdCliente($_POST['cliente']);
    $Forma_pagamento = new Forma_pagamento();
    $Forma_pagamento->setIdforma_pagamento($_POST['forma_Pagamento']);

    // Definir o tipovenda (objeto da associação) na classe venda
    $venda->setCliente($Cliente);
    $venda->setFormaPagamento($Forma_pagamento);

    // Inserir no Banco de Dados
    $dao = new VendaDAO();
    $dao->create($venda);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');