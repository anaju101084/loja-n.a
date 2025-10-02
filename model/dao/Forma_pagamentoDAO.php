<?php
    class Forma_pagamentoDAO {
        public function create($forma_pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO forma_pagamento(descricao) 
                     VALUES (:c)"
                );
                $query->bindValue(':c',$forma_pagamento->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $forma_pagamentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $forma_pagamento = new forma_pagamento();
                    $forma_pagamento->setidforma_pagamento($linha['idforma_pagamento']);
                    $forma_pagamento->setdescricao($linha['descricao']);

                    array_push($forma_pagamentos,$forma_pagamento);
                }

                return $forma_pagamentos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento WHERE idforma_pagamento = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $forma_pagamento = new forma_pagamento();
                $forma_pagamento->setidforma_pagamento($linha['idforma_pagamento']);
                $forma_pagamento->setdescricao($linha['descricao']);

                return $forma_pagamento;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($forma_pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE forma_pagamento 
                     SET forma_pagamento = :c 
                     WHERE idforma_depagamento = :i"
                );
                $query->bindValue(':c',$forma_pagamento->getforma_pagamento(), PDO::PARAM_STR);
                $query->bindValue(':r',$forma_pagamento->getdescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM forma_pagamento
                     WHERE idforma_pagamento = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }