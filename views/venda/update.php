<?php
    require "../../autoload.php";

    // Construir o objeto do venda
    $venda = new Venda();
    $venda->setIdvenda($_POST['id']);
    $venda->setPreco($_POST['preco']);
    $venda->setData($_POST['data']);

    // Construir um objeto do Tipovenda
    $Cliente = new Cliente();
    $Cliente->setCliente_idcliente($_POST['cliente']);
    $Forma_pagamento = new Forma_pagamento();
    $Forma_pagamento->setForma_pagamento_idforma_pagamento($_POST['forma_pagamento']);

    // Definir o tipovenda (objeto da associação) na classe venda
    $venda->setCliente($Cliente);
    $venda->setforma_pagamento($Forma_pagamento);


    // Atualizar registro no Banco de Dados
    $dao = new VendaDAO();
    $dao->update($venda);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');