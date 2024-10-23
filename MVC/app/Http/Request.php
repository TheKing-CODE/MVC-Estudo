<?php

namespace App\Http;

/**
 * Class responsável por gerência as requisições que são feitas.
 */
class Request{
    /**
     * Método que foi utilizado para fazer a requisição
     * @var string
     */
    private $httpMetodo;
    /**
     * Url - caminho que foi feita a requisição
     * @var string
     */
    private $uri;

    /**
     * Parametros que foram passados atráves do GET
     * @var array
     */
    private $queryParamentros = [];
    /**
     * Variáveis que foram recebidas no POST
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalhos da requisição
     * @var array
     */
    private $headers = [];

    public function __construct() {
        $this->queryParamentros = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders() ?? '';
        $this->httpMetodo = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI']??'';
        
    }
    
    public function getHttpMetodo(){
        return $this->httpMetodo;
    }

    public function getUri(){
        return $this->uri;
    }

    public function getPostVars(){
        return $this->postVars;
    }

    public function getHeaders(){
        return $this->headers;
    }

}