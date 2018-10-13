<?php
    
    require_once("model/Historic.php");
    require_once("model/HistoricFactory.php");

    class HistoricManager {

        public function __construct() {

            $this->factory = new HistoricFactory();
        }

        public function create(float $valueFrom, string $unityFrom, float $valueTo, string $unityTo) {
            try {
                if ($valueFrom == "" ) {
                    throw new Exception("O campo <strong>valor de origem</strong> deve ser preenchido!");
                } elseif ($valueTo == "") {
                    throw new Exception("O campo <strong>valor de destino</strong> deve ser preenchido!");
                } elseif ($unityFrom == "") {
                    throw new Exception("O campo <strong>unidade de origem</strong> deve ser preenchido!");
                } elseif ($unityTo == "") {
                    throw new Exception("O campo <strong>unidade de destino</strong> deve ser preenchido!");
                }
    
                $Historic = new Historic("", $valueFrom, $unityFrom, $valueTo, $unityTo);
                $sucesso = $this->factory->salvar($Historic);
                $msg = "O histórico de <em>" . $unityFrom . "</em> para <em>" . $unityTo . "</em> foi cadastrado com sucesso!";

                return "Cadastrado com sucesso!";

                unset($valueFrom);
                unset($valueTo);
                unset($unityFrom);
                unset($unityTo);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function findAll() {
            return $this->factory->findAll();
        }

        public function remover($id) {
            // Valida o id
            if (!isset($id) || !is_numeric($id) || $id == "") throw Exception("Identificador do histórico não é válido!");

            //consulta o objeto no banco de dados, buscando pelo id
            $result = $this->factory->findById($id);

            // Se o resultado da busca conter 0 itens, 
            // então não foi encontrado o objeto no banco de dados,
            // caso contrário, é solicitada a exclusão do objeto
            if (count($result) == 0) {
                throw new Exception("O histórico n&atilde;o foi encontrado!");
            }
            else {
                $historic = current($result);
                $sucesso = $this->factory->remove($historic->getId());
                    
                if ($sucesso){					
                    return "O histórico foi removido com sucesso!";
                }else{
                    throw new Exception("O histórico n&atilde;o foi excluído!");
                }

            }
        }

        // public function busca($id) {
        //     // TODO: validação
        //     $result = $this->factory->buscar($id);
        //     return current($result);
        // }

        // public function atualiza($id, $nome, $email) {

        //     //consulta o objeto no banco de dados, buscando pelo id
        //     $result = $this->factory->buscar($id);

        //     // Se o resultado da busca conter 0 itens, 
        //     // então não foi encontrado o objeto no banco de dados,
        //     // caso contrário, é solicitada a atualização do objeto
        //     if (count($result) == 0) {
        //         throw new Exception("O Historic n&atilde;o foi encontrado na agenda!");
        //     }
        //     else{

        //         $Historic = current($result);
        //         $Historic->setNome($nome);
        //         $Historic->setEmail($email);
        //         $sucesso = $this->factory->atualizar($Historic);
                
        //         if ($sucesso){					
        //             return "O Historic <em>" . $nome . "</em> - <em>" . $email . "</em> foi atualizado com sucesso!";
        //         }else{
        //             throw new Exception("O Historic n&atilde;o foi atualizado na agenda!");
        //         }
            
        //     }

        // }
    }

?>