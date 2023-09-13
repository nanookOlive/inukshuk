<?php 


class Autoloader
{

    public static function register(){

        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);

    }

    public static function autoload($className){

        $className=str_replace("\\",'/',$className);
        require __DIR__.'/'.lcfirst($className).".php";
    }



}