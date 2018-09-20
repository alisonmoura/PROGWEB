<?php

require_once("Contato.php");
require_once("AbstractFactory.php");

/**
* Classe concreta que implementa a classe AbstractFactory para gestão ao acesso de dados para o 
* modelo Contato.
*/

class ContatoFactory extends AbstractFactory {
  
  public function __construct() {
    parent::__construct();
  }
  
  /**
  * Método para cadastro de um contato no banco de dados
  * @param object - Contato a ser salvo
  * @return boolean - True: deu certo False: deu errado
  */
  public function salvar($obj) {
    
    
    $contato = $obj;
    
    try {
      
      $sql = "INSERT INTO tbcontato (nome, email) VALUES ('" 
      . $contato->getNome() . "', '" 
      . $contato->getEmail() . "' ) ";
      
      if($this->db->exec($sql)) {
        $result = true;
      }else {
        $result = false;
      }

    } catch (PDOException $exc) {
      echo $exc->getMessage();
      $result = false;
    }
    
    return $result;
  }
  
  /**
  * Método para buscar todos os contatos salvos no banco de dados
  * @return array - Array de contatos salvo no banco de dados
  */
  public function listar(): array {
    $sql = "SELECT * FROM tbcontato";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Contato");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }
  
  /**
  * Método para cadastro de um contato no banco de dados
  * @param string - email utilizado como critério de busca
  * @return object - contato encontrado pela busca ou null caso nenhum contato seja encontrado
  */
  public function buscar(string $param): array {
    $sql = "SELECT * FROM tbcontato WHERE email = '" . $param . "'";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Contato");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }
  
}

?>