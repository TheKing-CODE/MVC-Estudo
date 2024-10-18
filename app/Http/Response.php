<?php

namespace App\Http;


/**
 * Class responsável por retorna resposta às requisições
 */
class Response{

    /**
     * Código de status do http, da resposta. Se foi bem sucedida ou não
     * @var int
     */
    private $httpCode = 200;

    /**
     * Conteúdo do cabeçalho que é retornado ao navegador
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteúdo que irá ser retornado 
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Contéudo que deverá ser retornado
     * @var mixed 
     */
    private $content;

    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->contentType = $contentType;
    }

    public function setContentType($contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function addHeader($key, $value){
        $this->headers[$key] = $value;
    }


    /**
     * Método responsável por retorna o a resposta 
     * @return mixed
     */
    public function sendResponse(){
        switch($this->contentType){
            case 'text/html':
                return $this->content;            
        }
    }
}