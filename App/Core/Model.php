<?php

namespace App\Core;

class Model {

    private static $instance;

    public static function getConnect() {

        if( !isset(self::$instance) ) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=teste;charset=utf8', 'root', '12345');
        }

        return self::$instance;

    }

}