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
 * Classe Historic
 * @author Alison I. O. Moura
 * @version 1.0
 *
 */
class Historic {

    private  $id;
    private $valueFrom;
    private $valueTo;
    private $unityFrom;
    private $unityTo;

    /**
     * Construtor de Historic. Nesse contrutor foi utilizado o type hint.
     * @param string $id (opcional)
     * @param float $valueFrom
     * @param float $valueTo
     * @param string $unityFrom
     * @param string $unityTo
     */
    public function __construct(string $id="", float $valueFrom, string $unityFrom, float $valueTo, string $unityTo) {
        $this->id = $id;
        $this->valueFrom = $valueFrom;
        $this->valueTo = $valueTo;
        $this->unityFrom = $unityFrom;
        $this->unityTo = $unityTo;
    }
	
	/**
     * Retorna o id da Historic.
     * @return id - string
     */
    public function getId():string {
        return $this->id;
    }
    
    /**
     * Retorna o valor de origem da Historic.
     * @return valueFrom - float
     */
    public function getValueFrom():float {
        return $this->valueFrom;
    }

    /**
     * Retorna o valor de destino da Historic.
     * @return valueTo - float
     */
    public function getValueTo():float {
        return $this->valueTo;
    }
    
    /**
     * Retorna a unidade de medida de origem da Historic.
     * @return unityFrom - string
     */
    public function getUnityFrom():string {
        return $this->unityFrom;
    }

    /**
     * Retorna a unidade de medida de destino da Historic.
     * @return unityTo - string
     */
    public function getUnityTo():string {
        return $this->unityTo;
    }
}

?>
