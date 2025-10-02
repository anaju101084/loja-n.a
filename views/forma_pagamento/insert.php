<?php
    require "../../autoload.php";

    // Construir o objeto do forma_pagamento
    $forma_pagamento = new Forma_pagamento();
    $forma_pagamento->setdescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new Forma_pagamentoDAO();
    $dao->create($forma_pagamento);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');