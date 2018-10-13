<?php

require_once("Convertion.php");
require_once("AbstractFactory.php");

/**
* Classe concreta que implementa a classe AbstractFactory para gestão ao acesso de dados para o 
* modelo Convertion.
*/

class ConvertionFactory extends AbstractFactory {
  
  public function __construct() {
    parent::__construct();
  }
  
  /**
  * Método para cadastro de um Convertion no banco de dados
  * @param object - Convertion a ser salvo
  * @return boolean - True: deu certo False: deu errado
  */
  public function create($obj) {
    
    $convertion = $obj;
    
    try {
      
      $sql = "INSERT INTO convertion (unity_from , unity_to, convertion_value) VALUES ('" 
      . $convertion->getUnityFrom() . "', '" 
      . $convertion->getUnityTo() . "', '" 
      . $convertion->getConvertionValue() . "' ) ";
      
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
  * Método para atualização de um Convertion no banco de dados
  * @param object - Convertion a ser alterado
  * @return boolean - True: deu certo False: deu errado
  */
  public function update($obj) {
    
    
    $convertion = $obj;
    
    try {
      
      $sql = "UPDATE convertion SET " 
      . "unity_from = '" . $convertion->getUnitFrom() . "', " 
      . "unity_to = '" . $convertion->getUnitTo() . "', " 
      . "convertion_value = '" . $convertion->getConvertionValue() . "', " 
      . "WHERE id = '" . $convertion->getId() . "'";
      
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
  * Método para buscar todos os Convertions salvos no banco de dados
  * @return array - Array de Convertions salvo no banco de dados
  */
  public function findAll(): array {
    $sql = "SELECT * FROM convertion";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Convertion");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }

  /**
  * Método para buscar um Convertion no banco de dados pelo ID
  * @param string $param - id utilizado como critério de busca
  * @return object - Convertion encontrado pela busca ou null caso nenhum Convertion seja encontrado
  */
  public function findById(string $param): array {
    $sql = "SELECT * FROM convertion WHERE id = '" . $param . "'";
    
    try {
      $resultRows = $this->db->query($sql);
      
      if (!($resultRows instanceof PDOStatement)) {
        throw new Exception("Tem erro no seu SQL!<br> '" . $sql . "'");
      }
      
      $resultObject = $this->queryRowsToListOfObjects($resultRows, "Convertion");
      return $resultObject;
      
    } catch (Exception $exc) {
      echo $exc->getMessage();
      $resultObject = array();
    }
  }

  /**
  * Método para remoção de um Convertion no banco de dados
  * @param object - Convertion a ser salvo
  * @return boolean - True: deu certo False: deu errado
  */
  public function remove(string $id) {
    
    try {
      
      $sql = "DELETE FROM convertion WHERE id = '" 
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