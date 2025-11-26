<?php
    class VendaDAO {
        public function create($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO venda(preco,data,cliente_idcliente, forma_pagamento_idforma_pagamento) 
                     VALUES (:p, :d, :c, :f)"
                );
                $query->bindValue(':p',$venda->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':d',$venda->getData(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':c',$venda->getCliente()->getIdCliente(), PDO::PARAM_INT);
                $query->bindValue(':f',$venda->getFormaPagamento()->getIdforma_pagamento(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }


        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM venda");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $vendas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $venda = new venda();
                    $venda->setIdVenda($linha['idvenda']);
                    $venda->setPreco($linha['preco']);
                    $venda->setCliente_idcliente($linha['cliente_idcliente']);
                    $venda->setForma_pagamento_idforma_pagamento($linha['forma_pagamento_idforma_pagamento']);

                    array_push($vendas,$venda);
                }

                return $vendas;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM venda WHERE idvenda = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                
                $venda = new venda();
                $venda->setIdVenda($linha['idvenda']);
                $venda->setDescricao($linha['descricao']);
                $venda->setIdVenda($linha['idvenda']);
                $venda->setPreco($linha['preco']);
                $venda->setCliente_idcliente($linha['cliente_idcliente']);
                $venda->setForma_pagamento_idforma_pagamento($linha['forma_pagamento_idforma_pagamento']);



                return $vendas;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($venda) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE venda
                     SET preco = :p , data = :d , cliente_idcliente = :c , forma_pagamento_idforma_pagamento = :f ,
                     WHERE idvenda = :i"
                );
                $query->bindValue(':p',$venda->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':d',$venda->getData(), PDO::PARAM_INT);
                // Bind para a chave estrangeira
                $query->bindValue(':c',$venda->getCliente()->IdCliente(), PDO::PARAM_INT);
                $query->bindValue(':f',$venda->getFormaPagamento()->getIdforma_pagamento(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM venda
                     WHERE idvenda = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }
    }