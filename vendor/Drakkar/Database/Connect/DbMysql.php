<?php
namespace Database\Connect;

class DbMysql implements \Interfaces\iDb{
    private static $pdo = null;

    /**
     * setConnect
     * 
     * @param type $database array(host, dbname, user, password)
     * @return Pdo object;
     */
    public static function setConnect(array $database) {
        try{
            if (!is_array($database)) {
                throw new Exception('Erreur lors de la connection à la DB.');
            }
            $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$database['charset']}", \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
            self::$pdo = new \PDO("{$database['driver']}:host={$database['host']};dbname={$database['database']}", $database['username'], $database['password'], $options);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    /**
     * 
     * @return type
     */
    public static function getConnect(){
        return self::$pdo;
    }
}