<?php
    class Produto_VendaDAO {
        public function create($Produto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO$_produto(venda_idvenda) 
                     VALUES (:d)"
                );
                $query->bindValue(':v',$Produto->getVenda(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM$produto_idproduto");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $Produtos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $Produto = new$Produto();
                    $Produto->setproduto_idproduto($linha['id$produto_idproduto']);
                    $Produto->setVenda($linha['venda_idvenda']);

                    array_push($Produtos,$Produto);
                }

                return $Produtos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM$produto_idproduto WHERE id$produto_idproduto = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                
                $Produto = new$Produto();
                $Produto->setproduto_idproduto($linha['id$produto_idproduto']);
                $Produto->setVenda($linha['venda_idvenda']);


                return $Produtos;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($Produto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE$_produto
                     SET venda = :d
                     WHERE id$produto_idproduto = :i"
                );
                $query->bindValue(':v',$Produto->getVenda(), PDO::PARAM_STR);
                $query->bindValue(':i',$Produto->getproduto_idproduto(), PDO::PARAM_INT);

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
                    "DELETE FROM$produto_idproduto
                     WHERE id$produto_idproduto = :i"
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