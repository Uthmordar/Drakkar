<?php
namespace Console\Seed;
use Symfony\Component\Yaml\Yaml;
use Console\Message;

class TruncateTable extends \Console\Command{
    private $pdo;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    /**
     * truncate table by tablename
     * @param type $table
     * @return boolean
     */
    public function truncateTable($table){
        if(!is_string($table)){
            throw new \InvalidArgumentException('invalid table name');
        }
        
        $tableName=strip_tags($table);
                
        $req1="DELETE FROM `$tableName`;";
        $req2="SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE `$tableName`; SET FOREIGN_KEY_CHECKS = 1;";
        
        try{
            $this->pdo->beginTransaction();
            $this->pdo->exec($req1);
            $this->pdo->exec($req2);
            $this->pdo->commit();
            Message::renderMessage($tableName . " truncated with success.", 1);
        }catch(\PDOException $ex){
            Message::renderMessage("Error : " . $ex->getMessage(), 0);
        }
    }
    
    /**
     * parse all seed dir && truncate table based on these files
     */
    public function truncateAllTables(){
        $files=array_reverse(array_diff(scandir(PATH_SEEDS), array('..', '.')));
        foreach($files as $file){
            try{
                $params=$this->getYamlParams($file, PATH_SEEDS);
                $this->truncateTable($params['table']);
            }catch(\Symfony\Component\Yaml\Exception\ParseException $e){
                Message::renderMessage('File ' . $file . ' in App\database\Seeds generate an error. Check yml conformance.', 0);
            }catch(\InvalidArgumentException $e){
                Message::renderMessage('File ' . $file . ' has ' . $e->getMessage(), 0);
            }
        }
        Message::renderMessage('Truncate over', "help");
    }
}