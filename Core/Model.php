<?php 

namespace Core; 

use PDO; 
use PDOException;

/**
 * Base Model
 */
abstract class Model 
{

    /**
     * Get the PDO database connection
     * 
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = DB_HOST;
            $dbname = DB_NAME;
            $username = DB_ROOT_USER;
            $password = DB_ROOT_PWD;
        }

        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $db = new PDO($dsn, $username, $password);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        return $db;
    }
}