<?php
    
    require_once("model/Contato.php");
    require_once("model/ContatoFactory.php");

    class ContatoManager {

        public function __construct() {

            $this->factory = new ContatoFactory();
        }

        public function cadastra(string $nome, string $email) {
            try {
                if ($nome == "" ) {
                    throw new Exception("O campo <strong>Nome</strong> deve ser preenchido!");
                } elseif ($email == "") {
                    throw new Exception("O campo <strong>e-mail</strong> deve ser preenchido!");
                }
                    //consulta o e-mail no banco
                    $result = $this->factory->buscarPorEmail($email);
    
                    // se o resultado for igual a 0 itens, então salva contato
                    if (count($result) == 0) {
    
                        $contato = new Contato("", $nome, $email);
                        $sucesso = $this->factory->salvar($contato);
                         $msg = "O contato <em>" . $nome . "</em> - <em>" . $email . "</em> foi cadastrado com sucesso!";
                    }
                    else {
                        throw new Exception("O contato n&atilde;o foi adicionado. E-mail j&aacute; existente na agenda!");
    
                    }

                    return "Cadastrado com sucesso!";
    
                    unset($nome);
                    unset($email);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function lista() {
            return $this->factory->listar();
        }

        public function exclui($id) {
            // Valida o id
            if (!isset($id) || !is_numeric($id) || $id == "") throw Exception("Identificador do contato não é válido!");

            //consulta o objeto no banco de dados, buscando pelo id
            $result = $this->factory->buscar($id);

            // Se o resultado da busca conter 0 itens, 
            // então não foi encontrado o objeto no banco de dados,
            // caso contrário, é solicitada a exclusão do objeto
            if (count($result) == 0) {
                throw new Exception("O contato n&atilde;o foi encontrado na agenda!");
            }
            else {
                $contato = current($result);
                $sucesso = $this->factory->remover($contato);
                    
                if ($sucesso){					
                    return "O contato <em>" . $contato->getNome() . "</em> foi excluído com sucesso!";
                }else{
                    throw new Exception("O contato n&atilde;o foi excluído na agenda!");
                }

            }
        }

        public function busca($id) {
            // TODO: validação
            $result = $this->factory->buscar($id);
            return current($result);
        }

        public function atualiza($id, $nome, $email) {

            //consulta o objeto no banco de dados, buscando pelo id
            $result = $this->factory->buscar($id);

            // Se o resultado da busca conter 0 itens, 
            // então não foi encontrado o objeto no banco de dados,
            // caso contrário, é solicitada a atualização do objeto
            if (count($result) == 0) {
                throw new Exception("O contato n&atilde;o foi encontrado na agenda!");
            }
            else{

                $contato = current($result);
                $contato->setNome($nome);
                $contato->setEmail($email);
                $sucesso = $this->factory->atualizar($contato);
                
                if ($sucesso){					
                    return "O contato <em>" . $nome . "</em> - <em>" . $email . "</em> foi atualizado com sucesso!";
                }else{
                    throw new Exception("O contato n&atilde;o foi atualizado na agenda!");
                }
            
            }

        }
    }

?>