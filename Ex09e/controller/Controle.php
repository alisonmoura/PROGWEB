<?php


require_once("model/ContatoManager.php");



/*
* Material utilizado para as aulas práticas da disciplinas da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Seu uso é permitido para fins apenas acadêmicos, todavia mantendo a
* referência de autoria.
*
*
*
* Classe Controle - controladora que define gerencia do fluxo da aplicação.
* Essa classe segue o padrão arquitetural MVC, no qual assume o papel de
* controller.
*
* @author Jane Eleutério
*
* @version 3.0 - 03/Out/2018
*/

class Controle {

    private $manager;

    public function __construct() {

        $this->manager = new ContatoManager();
    }

    public function init() {

        if (isset($_GET['funcao'])) {
            $f = $_GET['funcao'];
        } else {
            $f = "";
        }

        switch ($f) {
            case 'novo':
            $this->novoContato();
            break;
            case 'cadastra':
            $this->cadastraContato();
            break;
            case 'listar':
            $this->listaContatos();
            break;
            case 'remover':
            $this->excluiContato();
            break;
            case 'editar':
            $this->editaContato();
            break;
            default:
            $this->home();
            break;
        }
    }

    public function home() {
        require 'view/home.php';
    }

    public function novoContato() {
        require 'view/novo.php';
    }

    public function cadastraContato() {
        if (isset($_POST['enviado'])) {

            $nome = $_POST['nome'];
            $email = $_POST['email'];

            try {

				$msg = $this->manager->cadastra($nome, $email);
				$sucesso = true;

            } catch (Exception $e) {
                $sucesso = false;
                $msg = $e->getMessage();

            }
            require 'view/mensagem.php';
        }
    }


	public function listaContatos() {

        $agendaContatos = $this->manager->lista();
        require 'view/lista.php';
    }

    public function excluiContato() {

		try{

			$id = $_GET['id'];
			$msg = $this->manager->exclui($id);
			$sucesso = true;

		} catch (Exception $e) {
                $sucesso = false;
                $msg = $e->getMessage();
        }
        require 'view/mensagem.php';
    }

	public function editaContato() {

		//Se a função edita não vier com os dados do formulário,
		// então busca o objeto para edição,
		// caso contrário, atualiza os dados editados do objeto.
        if (!isset($_POST['enviado'])) {
			try{

				$id = $_GET['id'];

				//busca o objeto pelo id
				$contato = $this->manager->busca($id);
				require 'view/edita.php';


			} catch (Exception $e) {
				$sucesso = false;
				$msg = $e->getMessage();
				require 'view/mensagem.php';
			}

		}else{
            try {
				$id = $_POST['id'];
				$nome = $_POST['nome'];
				$email = $_POST['email'];

				$msg = $this->manager->atualiza($id, $nome, $email);
				$sucesso = true;

            } catch (Exception $e) {
                $sucesso = false;
                $msg = $e->getMessage();

            }
            require 'view/mensagem.php';
        }
    }

}













?>
