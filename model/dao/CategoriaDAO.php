<?php
    class CategoriaDAO {
        public function create($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO categoria(descricao) 
                     VALUES (:c)"
                );
                $query->bindValue(':c',$categoria->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $categorias = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $categoria = new Categoria();
                    $categoria->setIdCategoria($linha['idcategoria']);
                    $categoria->setdescricao($linha['descricao']);

                    array_push($categorias,$categoria);
                }

                return $categorias;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria WHERE idcategoria = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $categoria = new Categoria();
                $categoria->setDescricao($linha['descricao']);
                $categoria->setIdCategoria($linha['idcategoria']);


                return $categoria;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE categoria 
                     SET descricao = :d 
                     WHERE idcategoria = :i"
                );
                $query->bindValue(':d',$categoria->getDescricao(), PDO::PARAM_STR);
                $query->bindValue(':i',$categoria->getIdCategoria(), PDO::PARAM_INT);

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
                    "DELETE FROM categoria
                     WHERE idcategoria = :i"
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