<?php

namespace App\Utils;

class view{
    /**
     * Retorna a view sem renderização
     * @param string $view
     * @return string
     */
    private static function getContentView($view): string{
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file):'retorno isso';        
    }


    /**
     * Renderização da view 
     * @param string $view
     * @param array $vars
     * @return string
     */
    public static function render($view, $vars = []): string{
        //Conteudo da view (Puro) sem renderização
        $contentView = self::getContentView($view);

        //Renderização do view
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        },$keys);


        //Retorna a view com conteudo renderizado
        return str_replace($keys, array_values($vars), $contentView);        
    }
}