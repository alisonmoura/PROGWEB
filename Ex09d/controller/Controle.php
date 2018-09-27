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
            case 'remover': $this->remover(); break;
            case 'editar': $this->editar(); break;
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
                if(isset($_POST['id'])) $id = $_POST['id'];
                else $id = null;
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $result = $this->factory->buscarPorEmail($email);

                if(count($result) == 0 && $id == "") {
                    $contato = new Contato("", $nome, $email);
                    $sucesso = $this->factory->salvar($contato);
                } else if(count($result) > 0 && $id != "") {
                    $contato = new Contato($id, $nome, $email);
                    $sucesso = $this->factory->atualizar($contato);
                } else {
                    $sucesso = false;
                    $msg = "O contato não foi adicionado";
                }
                
                $acao = $id != "" ? 'atualizado' : 'cadastrado';

                if($sucesso){
                    $msg = "O contato " . $nome . " (" . $email . ") foi " . $acao . "!";
                }else {
                    $msg = "Contato não foi " . $acao . ", tente novamente mais tarde";
                }
                
                unset($id);
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
    
    public function remover() {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            
            $result = $this->factory->buscar($id);
            if(count($result) == 0){
                $sucesso = false;
                $msg = "O contato não foi encontrado";
            } else {
                $contato = current($result);
                $sucesso = $this->factory->remover($contato);
                if($sucesso) $msg = "O contato foi removido com sucesso!";
                else $msg = "Não foi possível remover o contato " . $contato->getName();
            }
            
            require 'view/mensagem.php';
            
        } else {
            $this->home();
        }
    }
    
    public function editar() {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $result = $this->factory->buscar($id);
            if(count($result) == 0){
                $sucesso = false;
                $msg = "O contato não foi encontrado";
            } else {
                $contato = current($result);
                $modoEdicao = true;
                // $this->novo();
                require 'view/novo.php';
            }
        } else {
            $this->home();
        }
    }
    
}

?>
