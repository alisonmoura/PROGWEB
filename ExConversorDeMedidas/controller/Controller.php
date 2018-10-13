<?php

class Controller {

    public function init () {

        if(isset($_GET['page'])){ 
            $page = $_GET['page'];
        } else $page = '';

        switch ($page) {
            case 'history':
                break;
            default:
                $this->loadHome();
                break;
        }

    }

    private function loadHome() {
        require 'view/home.php';
    }

}

?>
