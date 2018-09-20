<?php

/*
 * Material utilizado para as aulas pr�ticas das disciplinas da Faculdade de
 * Computa��o da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
 * Seu uso � permitido para fins apenas acad�micos, todavia mantendo a
 * refer�ncia de autoria.
 * Created on : 20/09/2013
 * Author     : Prof. Jane Eleutério
 */

/**
 * Classe Contato
 * @author Prof. Jane Eleutério
 * @version 1.0
 *
 */
class Contato {


    private $nome;
    private $email;

    /**
     * Construtor de contato.
     * @param string $nome
     * @param string $email
     */
    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    /**
     * Retorna o nome do contato.
     * @return nome - string
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Retorna o email do contato.
     * @return email - string
     */
    public function getEmail() {
        return $this->email;
    }

}

?>
