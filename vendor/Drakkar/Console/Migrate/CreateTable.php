<?php
namespace Console\Migrate;
use Symfony\Component\Yaml\Yaml;
use Console\Message;

class CreateTable extends \Console\Command{
    private $pdo;
    private $files;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    /**
     * 
     */
    public function setFiles(){
        $this->files=array_diff(scandir(PATH_TABLES), array('..', '.'));
    }
    
    /**
     * parse files && check yml conformance
     * @return boolean
     */
    public function generateTables(){
        foreach($this->files as $file){
            try{
                if(!$this->checkYml($file, PATH_TABLES)){
                    Message::renderMessage('File ' . $file . ' in App\database\Migration is not an YAML file.', 0);
                    return false;
                }
                if($this->generateTable(Yaml::parse(PATH_TABLES . DIRECTORY_SEPARATOR . $file))){
                    Message::renderMessage('File ' . $file . ' in App\database\Seeds has been seeded.', 1);
                }
            }catch(\Symfony\Component\Yaml\Exception\ParseException $e){
                Message::renderMessage('File ' . $file . ' in App\database\Migration generate an error. Check yml conformance.', 0);
            }catch(\InvalidArgumentException $e){
                Message::renderMessage('File ' . $file . ' in App\database\Migration has ' . $e->getMessage(), 0);
            }
        }
    }
    
    /**
     * create table from params
     * @param type $params
     * @throws \InvalidArgumentException
     */
    public function generateTable($params){
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
                Message::renderMessage("Table " . $dbName . " created", 1);
            }
        }catch(\PDOException $ex) {
            throw new \InvalidArgumentException($ex->getMessage());
        }
    }
    
    /**
     * create column paramaters for sql syntax
     * @param array $columns
     * @return string
     */
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
    
    /**
     * create foreign key params for sql syntax
     * @param array $keys
     * @return type
     * @throws \PDOException
     */
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