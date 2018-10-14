<?php

require_once("model/ConvertionManager.php");
require_once("model/HistoricManager.php");

class Controller {

    public function __construct() {
        $this->convertionManager = new ConvertionManager();
        $this->historicManager = new HistoricManager();
    }

    public function init () {

        if(isset($_GET['page'])){ 
            $page = $_GET['page'];
        } else $page = '';

        switch ($page) {
            case 'convertion':
                $this->loadConvertion();
                break;
            default:
                $this->loadHome();
                break;
        }

    }

    private function loadHome() {
        unset($message);
        unset($convertions);
        unset($historic);

        try {
            $convertions = $this->convertionManager->findAll();
            $historic = $this->historicManager->findAll();
        } catch (Exception $e) {
            $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
        }
        if(isset($_GET['action']) && $_GET['action'] == 'calculate') {
            try {
                $result = $this->convertionManager->convert($_POST['from'], $_POST['to'], $_POST['value']); // faz a conversão
                $historic = $this->historicManager->findAll(); // atualiza do histórico
            } catch (Exception $e) {
                $result = 0; 
                $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
            }
        } else $result = 0; 
        require 'view/home.php';
    }

    private function loadConvertion() {
        unset($message);
        unset($convertions);

        try {
            $convertions = $this->convertionManager->findAll();
        } catch (Exception $e) {
            $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
        }
        if(isset($_GET['action']) && $_GET['action'] == 'create') {
            try {
                $result = $this->convertionManager->create($_POST['from'], $_POST['to'], $_POST['value']); // cria nova conversão
                $convertions = $this->convertionManager->findAll(); // atualiza as conversões
                $message = (object) ['message' => $result, 'type' => 'success'];
            } catch (Exception $e) {
                $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
            }
        }
        require 'view/convertion.php';
    }

}

?>
