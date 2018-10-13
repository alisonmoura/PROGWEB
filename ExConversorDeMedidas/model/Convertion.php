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
 * Classe Convertion
 * @author Alison I. O. Moura
 * @version 1.0
 *
 */
class Convertion {

    private $id;
    private $unityFrom;
    private $unityTo;
    private $convertionValue;

    /**
     * Construtor de Convertion. Nesse contrutor foi utilizado o type hint.
     * @param string $id (opcional)
     * @param string $unityFrom
     * @param string $unityTo
     * @param float $convertionValue
     */
    public function __construct(string $id="", string $unityFrom, string $unityTo, $convertionValue) {
        $this->id = $id;
        $this->unityFrom = $unityFrom;
        $this->unityTo = $unityTo;
        $this->convertionValue = $convertionValue;
    }
	
	/**
     * Retorna o id da Convertion.
     * @return id - string
     */
    public function getId():string {
        return $this->id;
    }
    
    /**
     * Retorna a unidade de medida de origem da Convertion.
     * @return unityFrom - string
     */
    public function getUnityFrom():string {
        return $this->unityFrom;
    }

    /**
     * Retorna a unidade de medida de destino da Convertion.
     * @return unityTo - string
     */
    public function getUnityTo():string {
        return $this->unityTo;
    }

    /**
     * Retorna o resultado da conversão de uma unidade de origem 
     * para a proporção da unidade de destino (ex: 1 centímetro -> 2.54 polegadas)
     * @return unityTo - string
     */
    public function getConvertionValue():float {
        return $this->convertionValue;
    }
}

?>
