<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;

    private function ligar(){
        $this->ligacao = new PDO(

            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
             MYSQL_USER,
             MYSQL_PASS,
             array(PDO::ATTR_PERSISTENT => true)
        );

        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    private function desligar(){
        $this->ligacao = null;
    }

    public function select($sql, $parametros=null){


        if(!preg_match("/^SELECT/i",$sql)){
            throw new Exception('Base de dados não é uma instrução select');
        }

        $this->ligar();

        $resultados = null;

        try{

            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }

        }catch(PDOException $e){
            return false;
        }

        $this->desligar();

        return $resultados;

    }

    public function insert($sql, $parametros=null){


        if(!preg_match("/^INSERT/i",$sql)){
            throw new Exception('Base de dados não é uma instrução insert');
        }

        $this->ligar();

        try{

            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        }catch(PDOException $e){
            return false;
        }

        $this->desligar();
    }

    public function update($sql, $parametros=null){


        if(!preg_match("/^UPDATE/i",$sql)){
            throw new Exception('Base de dados não é uma instrução UPDATE');
        }

        $this->ligar();

        try{

            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        }catch(PDOException $e){
            return false;
        }

        $this->desligar();
    }

    public function delete($sql, $parametros=null){


        if(!preg_match("/^DELETE/i",$sql)){
            throw new Exception('Base de dados não é uma instrução DELETE');
        }

        $this->ligar();

        try{

            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        }catch(PDOException $e){
            return false;
        }

        $this->desligar();
    }

    //Generica
    public function statement($sql, $parametros=null){


        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i",$sql)){
            throw new Exception('Base de dados não é uma instrução valida');
        }

        $this->ligar();

        try{

            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            }else{
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        }catch(PDOException $e){
            return false;
        }

        $this->desligar();
    }


}

/*
define('MYSQL_SERVER',      'localhost');
define('MYSQL_DATABASE',    'php_store');
define('MYSQL_USER',        'user_php_store');
define('MYSQL_PASS',        '3AXiz82oHaXade6im7r17iQ7363itI');
define('MYSQL_CHARSET',     'utf8');
*/
