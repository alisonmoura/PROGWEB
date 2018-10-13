<?php

require_once("model/ConvertionManager.php");

class Controller {

    public function __construct() {
        $this->convertionManager = new ConvertionManager();
    }

    public function init () {

        if(isset($_GET['page'])){ 
            $page = $_GET['page'];
        } else $page = '';

        switch ($page) {
            case 'history':
                $this->loadHistory();
                break;
            default:
                $this->loadHome();
                break;
        }

    }

    private function loadHome() {
        unset($message);

        try {
            $convertions = $this->convertionManager->findAll();
        } catch (Exception $e) {
            $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
        }
        if(isset($_GET['action']) && $_GET['action'] == 'calculate') {
            try {
                $result = $this->convertionManager->convert($_POST['from'], $_POST['to'], $_POST['value']);
            } catch (Exception $e) {
                $result = 0; 
                $message = (object) ['message' => $e->getMessage(), 'type' => 'error'];
            }
        } else $result = 0; 
        require 'view/home.php';
    }

    private function loadHistory() {
        require 'view/history.php';
    }

}

?>
