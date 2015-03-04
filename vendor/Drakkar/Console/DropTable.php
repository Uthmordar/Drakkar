<?php
namespace Console\Migration;

class DropTable{
    private $pdo;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    public function dropTable($table){
        if(!is_string($table)){
            throw new \InvalidArgumentException('table name false');
        }
        
        $dbName=strip_tags($table);
        $req="DROP TABLE IF EXISTS `".$dbName."`";
        
        try{
            $this->pdo->exec($req);
            echo $dbName . " deleted with success.\n";
        }catch(\PDOException $ex){
            echo "Error : " . $ex->getMessage();
        }
    }
    
    public function dropYamlTable(array $params){
        if(!is_string($params['table'])){
            throw new \InvalidArgumentException('table name false');
        }
        
        $dbName=strip_tags($params['table']);
        $req="DROP TABLE IF EXISTS `".$dbName."`";
        
        try{
            $this->pdo->exec($req);
            echo $dbName . " deleted with success.";
        }catch(\PDOException $ex){
            echo "Error : " . $ex->getMessage();
        }
    }
}