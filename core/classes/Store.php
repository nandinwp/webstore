<?php

namespace core\classes;

use Exception;

class Store{


    public static function Layout($estruturas, $dados = null){

        //Verifca se a estrutura é um array
        if(!is_array($estruturas)){
            throw new Exception("Coleção de estruturas invalidas");
        }

        //Variaveis
        if(!empty($dados) && is_array($dados)){
            extract($dados);
        }

        foreach($estruturas as $estrutura){
            include("../core/views/$estrutura.php");
        }

    }

}