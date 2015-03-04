<?php
namespace Console\Migrate;
use Symfony\Component\Yaml\Yaml;
use Console\Message;

class DropTable extends \Console\Command{
    private $pdo;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    /**
     * drop specific table from db
     * @param type $table
     * @return boolean
     */
    public function dropTable($table){
        if(!is_string($table)){
            throw new \InvalidArgumentException('invalid table name');
        }
        
        $tableName=strip_tags($table);
               
        $req="DROP TABLE IF EXISTS `".$tableName."`";
        
        try{
            $this->pdo->exec($req);
            Message::renderMessage($tableName . " deleted with success.", 1);
        }catch(\PDOException $ex){
            Message::renderMessage('Error : ' . $ex->getMessage(), 0);
        }
    }
    
    /**
     * drop all tables with seeding file
     */
    public function dropAllTables(){
        $files=array_reverse(array_diff(scandir(PATH_TABLES), array('..', '.')));
        foreach($files as $file){
            try{
                $params=$this->getYamlParams($file, PATH_TABLES);
                $this->dropTable($params['table']);
            }catch(\Symfony\Component\Yaml\Exception\ParseException $e){
                Message::renderMessage('File ' . $file . ' in App\database\Seeds generate an error. Check yml conformance.', 0);
            }catch(\InvalidArgumentException $e){
                Message::renderMessage('File ' . $file . ' has ' . $e->getMessage(), 0);
            }
        }
        Message::renderMessage('Drop executed', "help");
    }
}