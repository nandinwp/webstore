<?php

// coleção de rotas

$rotas = [
    'inicio' => 'main@index',
    'loja'   => 'main@loja'
];

// ação padrão
$acao = 'inicio';

if(isset($_GET['a'])){

    if(!key_exists($_GET['a'], $rotas)){
        $acao='inicio';
    }else{
        $acao = $_GET['a'];
    }
}
// def rota
$partes = explode('@', $rotas[$acao]);

$controlador = 'core\\controller\\'.ucfirst($partes[0]);

$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();

