<?php
define('DATABASE_HOST','localhost');
define('DATABASE_NAME','potr');
define('DATABASE_USER','root');
define('DATABASE_PASS','');
define('DATABASE_CHAR','utf8');

class Database
{
    protected static $instance = null;
    private function __construct(){}
    private function __clone(){}

    public static function instance()
    {
        if(self::$instance === null){
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            );
            $dns = 'mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset='.DATABASE_CHAR;
            self::$instance = new PDO($dns,DATABASE_USER,DATABASE_PASS,$options);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $arguments)
    {
        return call_user_func_array(array(self::instance(),$method), $arguments);
    }

    public static function run($sql, $arguments = [])
    {
        if(!$arguments)
        {
            return self::instance()->query($sql);
        }
        $statement = self::instance()->prepare($sql);
        $statement->execute($arguments);
        return $statement;
    }
}