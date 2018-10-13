<?php

require_once("Historic.php");
require_once("AbstractFactory.php");

/**
* Classe concreta que implementa a classe AbstractFactory para gestão ao acesso de dados para o 
* modelo Historic.
*/

class HistoricFactory extends AbstractFactory {
  
  public function __construct() {
    parent::__construct();
  }
  
  /**
  * Método para cadastro de um Historic no banco de dados
  * @param object - Historic a ser salvo
  * @return boolean - True: deu certo False: deu errado
  */
  public function create($obj) {
    
    
    $Historic = $obj;
    
    try {
      
      $sql = "INSERT INTO historic (valueFrom, valueTo, unityFrom , unityTo) VALUES ('" 
      . $Historic->getValueFrom() . "', '" 
      . $Historic->getValueTo() . "', '" 
      . $Historic->getUnityFrom() . "', '" 
      . $Historic->getUnityTo() . "' ) ";
      
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
  * Método para atualização de um Historic no banco de dados
  * @param object - Historic a ser alterado
  * @return boolean - True: deu certo False: deu errado
  */
  public function update($obj) {
    
    
    $Historic = $obj;
    
    try {
      
      $sql = "UPDATE historic SET " 
      . "valueFrom = '" . $Historic->getValueFrom() . "', " 
      . "valueTo = '" . $Historic->getValueTo() . "', " 
      . "unityFrom = '" . $Historic->getUnitFrom() . "', " 
      . "unityTo = '" . $Historic->getUnitTo() . "', " 
      . "WHERE id = '" . $Historic->getId() . "'";
      
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
  * Método para buscar todos os Historics salvos no banco de dados
  * @return array - Array de Historics salvo no banco de dados
  */
  public function findAll(): array {
    $sql = "SELECT * FROM historic";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Historic");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }

  /**
  * Método para buscar um Historic no banco de dados pelo ID
  * @param string $param - id utilizado como critério de busca
  * @return object - Historic encontrado pela busca ou null caso nenhum Historic seja encontrado
  */
  public function findById(string $param): array {
    $sql = "SELECT * FROM historic WHERE id = '" . $param . "'";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Historic");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }

  /**
  * Método para remoção de um Historic no banco de dados
  * @param object - Historic a ser salvo
  * @return boolean - True: deu certo False: deu errado
  */
  public function remove(string $id) {
    
    try {
      
      $sql = "DELETE FROM historic WHERE id = '" 
      . $id . "'";
      
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
  
}

?>