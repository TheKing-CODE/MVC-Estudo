<?php

namespace App\Controller\Pages;

use App\Utils\view;

/**
 * Class responsável por fazer renderizações na pages.html
 */
class page{
    /**
     * Retorna 'header.html' o conteúdo do header
     * @return string
     */
    public static function getHeader(){
        return view::render('pages/header');
    }

    /**
     * Retorna 'footer.html' o conteúdo do footer
     * @return string
     */
    public static function getFooter(){
        return view::render('pages/footer');
        
    }

    /**
     * Preencher o conteudo recebido no arguments dentro da 'pages.html'
     * @param mixed $vars conteudo para preencher
     * @return string
     */
    public static function getPage($title, $content): string{
        return view::render('pages/pages', [
            'title' => $title,
            'header' => self::getHeader(), 
            'container' => $content,
            'footer' => self::getFooter()]);
    }
}