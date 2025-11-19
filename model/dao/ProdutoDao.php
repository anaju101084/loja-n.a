<?php
    class ProdutoDAO {
        public function create($produto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO produto(descricao,preco,tamanho,categoria_idcategoria) 
                     VALUES (:d, :p, :t, :c)"
                );
                $query->bindValue(':d',$produto->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':p',$produto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':t',$produto->getTamanho(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':c',$produto->getCategoria()->getIdCategoria(), PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto");                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $produtos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    // Para a associação com o TipoProduto
                    $daoCategoria = new CategoriaDAO();
                    $categoria = $daoCategoria->find($linha['categoria_idcategoria']);

                    // Construindo um objeto do Produto
                    $produto = new Produto();
                    $produto->setIdproduto($linha['idproduto']);
                    $produto->setDescricao($linha['descricao']);
                    $produto->setPreco($linha['preco']);
                    $produto->setTamanho($linha['tamanho']);
                    // Definir o atributo (objeto) TipoProduto
                    $produto->setCategoria($categoria);

                    array_push($produtos,$produto);
                }

                return $produtos;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
        
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto WHERE idproduto = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);             

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                // Para a associação com o TipoProduto
                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['categoria_idcategoria']);

                // Construindo um objeto do Produto
                $produto = new Produto();
                $produto->setIdproduto($linha['idproduto']);
                $produto->setDescricao($linha['descricao']);
                $produto->setpreco($linha['preco']);
                $produto->setTamanho($linha['tamanho']);
                // Definir o atributo (objeto) TipoProduto
                $produto->setCategoria($categoria);

                return $produto;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($produto) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE produto 
                     SET descricao = :d, preco = :p, tamanho = :t, categoria_idcategoria = :c  
                     WHERE idproduto = :i"
                );
                $query->bindValue(':d',$produto->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':p',$produto->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':t',$produto->getTamanho(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':c',$produto->getCategoria()->getIdCategoria(), PDO::PARAM_INT);
                $query->bindValue(':i',$produto->getIdproduto(), PDO::PARAM_INT);

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
                    "DELETE FROM produto 
                     WHERE idproduto = :i"
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