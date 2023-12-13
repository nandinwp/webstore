<?php

namespace core\controller;

use core\classes\Store;

class Main{
    
    public function index(){
        $clientes  = ['João', 'Ana', 'Carlos'];

        $dados = [
            'titulo'   => 'Este é o título',
            'clientes' => ['João', 'Ana', 'Carlos']
        ];

        Store::Layout([
            'layouts/html_header',
            'pagina_inicial',
            'layouts/html_footer',
        ], $dados);
    }

    public function loja(){
        echo 'loja';
    }

}