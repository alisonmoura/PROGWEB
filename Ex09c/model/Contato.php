<?php

/*
 * Material utilizado para as aulas práticas das disciplinas da Faculdade de
 * Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
 * Seu uso é permitido para fins apenas acadêmicos, todavia mantendo a
 * referência de autoria.
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

    private  $nome;
    private  $email;

    /**
     * Construtor de contato. Nesse contrutor foi utilizado o type hint.
     * @param string $nome
     * @param string $email
     */
    public function __construct(string $nome, string $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    /**
     * Retorna o nome do contato. A declaração do método está usando o tipo de retorno.
     * @return nome - string
     */
    public function getNome(): string {
        return $this->nome;
    }

    /**
     * Retorna o email do contato. A declaração do método está usando o tipo de retorno.
     * @return email - string
     */
    public function getEmail(): string {
        return $this->email;
    }

}

?>
