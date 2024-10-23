<?php 

namespace App\Http;
use \Exception;
use App\Http\Response;

class Router{
    /**
     * Url completa do projeto (raiz)
     * @var 
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefixo = '';

    /**
     * Instancia da Request
     * @var array
     */
    private $routes = [];

    /**
     * Instancia da class Request 
     * @var 
     */
    private $request;

    private function sendPrefixo($url){
        //Quebra a url separando-a em partes
        $parseUrl = parse_url($this->url);

        //Pega apenas o prefixo da url
        $this->prefixo = $parseUrl['path'] ?? '';
    }

    private function addRouter($metodo, $route, $paramentros = []){        
        //Validação dos paramentros
        foreach($paramentros as $key=>$value){
            if($value instanceof \Closure){
                $paramentros['controler'] = $value;
                unset($paramentros[$key]);
                continue;
            }
        }

        //Padronização da URL
        $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

        //Add ao routes da class
        $this->routes[$patternRoute][$metodo] = $paramentros;
    }

    /**
     * Metodo responsável por defini uma rota com o método GET
     * @param mixed $route
     * @param mixed $parametros
     * @return void
     */
    public function get($route, $paramentros = []){
        return $this->addRouter('GET',$route, $paramentros);
    }

    /**
     * Método responsável por retorna os dados da rota atual
     * @return array
     */
    private function getRoute(){
        //Recupera a Uri sem o prefixo
        $uri = $this->getUri();       
        //Recupera o método que está sendo utilizando 
        $metodo = $this->request->getHttpMetodo();
        
        //Valida as rotas
        foreach($this->routes as $patternRoute=>$metodos){
            //Verifica se a URI bate com o Padrão que está em $patternRoute
            if(preg_match($patternRoute,$uri)){
                if($metodos[$metodo]){
                    return $metodos[$metodo];
                }

                //Método inválido
                throw new Exception("Método não encontrado", 405);
            }
        }

        //Uri não encontrada
        throw new Exception("Pág não encontrada", 404);
    }

    /**
     * Método responsável por retorna a URI. Desconsiderando o prefixo 
     * @return void
     */
    private function getUri(): string{
        $uri = $this->request->getUri();
        
        //Quebra a $uri em partes e retira o prefixo da string
        $xUri = strlen($this->prefixo)?explode($this->prefixo,$uri):[$uri];
        
        //Retorna a uri sem prefixo
        return end($xUri);
    }

    /**
     * Método responsável por executa a rota
     * @return Response
     */
    public function run() {
        try {
            $route = $this->getRoute();
           
        } catch (Exception $e) {
            // Log a exceção, se necessário
            error_log($e->getMessage());
            return new Response($e->getCode(), $e->getMessage());
        }
    }
    

    public function __construct($url) {
        $this->request = new request();
        $this->url = $url;
        $this->sendPrefixo($url);        
    }

    
}