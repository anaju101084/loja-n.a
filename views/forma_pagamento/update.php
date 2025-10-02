<?php
    require "../../autoload.php";

    // Construir o objeto do categoria
    $categoria = new Forma_pagamento();
    $categoria->setdescricao($_POST['descricao']);
    $categoria->setidforma_pagamento($_POST['id']);


    // Atualizar registro no Banco de Dados
    $dao = new Forma_pagamentoDAO();
    $dao->update($forma_pagamento);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');