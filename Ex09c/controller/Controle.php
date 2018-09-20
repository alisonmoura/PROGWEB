<?php

require_once("model/Contato.php");
require_once("model/ContatoFactory.php");

/*
* Material utilizado para as aulas práticas da disciplinas da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Seu uso é permitido para fins apenas acadêmicos, todavia mantendo a
* referência de autoria.
*
* Classe controladora que define gerencia do fluxo da aplicação.
*
* @author Jane Eleutério
*
* @version 2.1 - 09/Out/2017
*/

class Controle {
    
    private $factory;
    
    public function __construct() { 
        $this->factory = new ContatoFactory();
    }
    
    public function init() {
        
        if (isset($_GET['funcao'])) {
            $f = $_GET['funcao'];
        } else {
            $f = "";
        }
        
        switch ($f) {
            case 'novo': $this->novo(); break;
            case 'cadastra': $this->cadastra(); break;
            case 'listar': $this->lista(); break;
            case 'limpar': $this->limpa(); break;
            default: $this->home(); break;
        }
    }
    
    public function home() {
        require 'view/home.php';
    }
    
    public function novo() {
        require 'view/novo.php';
    }
    
    public function lista() {
        $agendaContatos = $this->factory->listar();
        require 'view/lista.php';
    }
    
    public function cadastra() {
        
        if (isset($_POST['enviado'])) {
            try {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $result = $this->factory->buscar($email);

                if(count($result) == 0) {
                    $contato = new Contato($nome, $email);
                    $sucesso = $this->factory->salvar($contato);
                }else {
                    throw new Exception("O contato não foi adicionado");
                }
    
                if($sucesso){
                    $msg = "O contato " . $nome . " (" . $email . ") foi cadastrado!";
                }else {
                    $msg = "Contato não foi adicionado, tente novamente mais tarde";
                }
    
                unset($nome);
                unset($email);
            } catch(Exception $e) {
                $sucesso = false;
                $msg = $e->getMessage();
            }
            
        } else {
            $sucesso = false;
        }
        require 'view/mensagem.php';
    }
    
    public function limpa() {
        session_start();
        session_destroy();
        require 'view/home.php';
    }
    
    //aqui vai o restante do seu código..
    // precisa fazer os demais métodos...
    
}

?>
