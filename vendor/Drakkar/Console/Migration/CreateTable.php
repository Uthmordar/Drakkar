<?php
namespace Console\Migration;

class CreateTable{
    private $pdo;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    public function generateTable(array $params){
        if(!is_string($params['table'])){
            throw new \InvalidArgumentException('table name false');
        }
        
        $dbName=strip_tags($params['table']);
        $req="CREATE TABLE IF NOT EXISTS `".$dbName."` ";
        $columns=$this->generateColumn($params['columns']);
        $keys=$this->generateKeys($params['keys']);
        
        $req.='('.$columns.$keys.') ENGINE=InnoDB AUTO_INCREMENT=1';
        try{
            if($this->pdo->exec($req)==0){
                echo "Table " . $dbName . " created\n";
            }
        }catch(\PDOException $ex) {
            echo "Table " . $dbName . ' : ' . $ex->getMessage();
        }
    }
    
    protected function generateColumn(array $columns){
        $req='';
        foreach($columns as $column=>$param){
            $req.="`".strip_tags($column)."`";
            foreach($param as $key=>$adds){
                $req.=" $key " . implode(' ', explode('|', $adds)) . ",";
            }
        }
        return $req;
    }
    
    protected function generateKeys(array $keys){
        $req=[];
        foreach($keys as $key=>$col){
            if($key=='primary'){
               $req[]="PRIMARY KEY (`$col`)"; 
            }else if($key=='foreign'){
                if(empty($col['key']) || empty($col['table']) || empty($col['on'])){
                    throw new \PDOException('Foreign key declaration is invalid');
                }
                $delete=(!empty($col['delete']) && $col['delete']=='cascade')? 'ON DELETE CASCADE' : 'ON DELETE SET NULL';
                $req[]="CONSTRAINT `fk_" . $col['key'] . "_" . $col['on'] . "` FOREIGN KEY (`" . $col['key'] . "`) REFERENCES `" . $col['table'] . "` (`" . $col['on'] . "`) ".$delete;
            }
        }
        return implode(',', $req);
    }
}