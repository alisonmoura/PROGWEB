<?php
    
    require_once("model/Convertion.php");
    require_once("model/ConvertionFactory.php");

    class ConvertionManager {

        public function __construct() {

            $this->factory = new ConvertionFactory();
        }

        public function create(string $unityFrom, string $unityTo, float $convertionValue) {
            try {
                
                if ($unityFrom == "") {
                    throw new Exception("O campo <strong>unidade de origem</strong> deve ser preenchido!");
                } elseif ($unityTo == "") {
                    throw new Exception("O campo <strong>unidade de destino</strong> deve ser preenchido!");
                } elseif ($convertionValue == "") {
                    throw new Exception("O campo <strong>valor da conversão</strong> deve ser preenchido!");
                }
    
                $Convertion = new Convertion("", $unityFrom, $unityTo, $convertionValue);
                $sucesso = $this->factory->create($Convertion);
                $msg = "O conversão de <em>" . $unityFrom . "</em> para <em>" . $unityTo . "</em> foi cadastrado com sucesso!";

                return "Cadastrado com sucesso!";

                unset($unityFrom);
                unset($unityTo);
                unset($convertionValue);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function findAll() {
            return $this->factory->findAll();
        }

        public function remove($id) {
            // Valida o id
            if (!isset($id) || !is_numeric($id) || $id == "") throw Exception("Identificador da conversão não é válido!");

            //consulta o objeto no banco de dados, buscando pelo id
            $result = $this->factory->findById($id);

            // Se o resultado da busca conter 0 itens, 
            // então não foi encontrado o objeto no banco de dados,
            // caso contrário, é solicitada a exclusão do objeto
            if (count($result) == 0) {
                throw new Exception("A conversão n&atilde;o foi encontrado!");
            }
            else {
                $Convertion = current($result);
                $sucesso = $this->factory->remove($Convertion->getId());
                    
                if ($sucesso){					
                    return "A conversão foi removido com sucesso!";
                }else{
                    throw new Exception("A conversão n&atilde;o foi excluído!");
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
        //         throw new Exception("O Convertion n&atilde;o foi encontrado na agenda!");
        //     }
        //     else{

        //         $Convertion = current($result);
        //         $Convertion->setNome($nome);
        //         $Convertion->setEmail($email);
        //         $sucesso = $this->factory->atualizar($Convertion);
                
        //         if ($sucesso){					
        //             return "O Convertion <em>" . $nome . "</em> - <em>" . $email . "</em> foi atualizado com sucesso!";
        //         }else{
        //             throw new Exception("O Convertion n&atilde;o foi atualizado na agenda!");
        //         }
            
        //     }

        // }
    }

?>