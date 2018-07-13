<?php

namespace App;

use PDO;

class Cnx
{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'root';
    const DB_NAME = 'wf3_library';

    /**
     * @var PDO
     */
    private static $instance;

    /**
     * Le constructeur est privé, pour qu'on ne puisse pas instancier la classe depuis l'extérieur
     */
    private function __construct(){}


    public static function getInstance() {

        if(is_null(self::$instance)) {
            self::$instance = new PDO(
                'mysql:dbname=' . self::DB_NAME . ';host=' . self::HOST,
                self::USER,
                self::PASSWORD,
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        }

        return self::$instance;
    }

}