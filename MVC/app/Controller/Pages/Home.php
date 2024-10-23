<?php

namespace App\Controller\Pages;

use App\Utils\view;
use App\Model\Entidades\Organizacao;

/**
 * 
 */
class Home extends page{
    public static function getHome(): string{
        //Construindo e acessa o model; Esse model retorna informações do Banco de dados sobre a entidade 'Organizacao'
        $organizacao = new Organizacao();
        //Page home sem renderização
        $content = view::render('pages/home', [
            'name' => $organizacao->name,
            'description' => $organizacao->descricao
        ]); 
        
        //Return a page.html com conteudo renderizado que foi retornado no $content
        return parent::getPage('Novo Titutlo',$content);
    }
}