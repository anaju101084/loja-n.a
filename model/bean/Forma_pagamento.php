<?php
    class Forma_pagamento {
        // Atributos
        private $idforma_pagamento;
        private $descricao;

        // Métodos
        public function getIdforma_pagamento() {
            return $this->idforma_pagamento;
        }

        public function setIdforma_pagamento($idforma_pagamento) {
            $this->idforma_pagamento = $idforma_pagamento;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->idforma_pagamento;
        }
    }