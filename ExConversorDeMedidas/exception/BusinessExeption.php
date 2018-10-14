<?php

/**
 * Classe para representação das exeções de regra de negócios.
 * Código retirado da documentação oficial do PHP e adaptado.
 * Fonte: https://secure.php.net/manual/pt_BR/language.exceptions.extending.php
 */

class BusinessException extends Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

?>