<?php
namespace Console\Seed;
use Symfony\Component\Yaml\Yaml;
use Console\Message;

class SeedTable extends \Console\Command{
    private $pdo;
    private $files;
    
    public function __construct(\PDO $pdo){
        $this->pdo=$pdo;
    }
    
    /**
     * get seeding files from App\database\seed
     */
    public function getFiles(){
        $this->files=array_diff(scandir(PATH_SEEDS), array('..', '.'));
    }
    
    /**
     * seeds tables $this->files
     */
    public function seedTables(){
        foreach($this->files as $file){
            $this->seedTable($file);
        }
    }
    
    /**
     * seed table from filename
     * @param type $file
     * @return boolean
     */
    public function seedTable($file){
        try{
            if(!$this->checkYml($file, PATH_SEEDS)){
                Message::renderMessage('File ' . $file . ' in App\database\Seeds is not an YAML file.', 0);
                return false;
            }
            $tableName=$this->generateSeed(Yaml::parse(PATH_SEEDS . DIRECTORY_SEPARATOR . $file));
            if($tableName){
                Message::renderMessage('Table ' . $tableName . ' has been seeded.', 1);
            }
        }catch(\Symfony\Component\Yaml\Exception\ParseException $e){
            Message::renderMessage('File ' . $file . ' in App\database\Seeds generate an error. Check yml conformance.', 0);
        }catch(\InvalidArgumentException $e){
            Message::renderMessage('File ' . $file . ' in App\database\Seeds has ' . $e->getMessage(), 0);
        }
    }
    
    /**
     * check seed file paramaeters conformance
     * @param array $params
     * @return type
     * @throws \InvalidArgumentException
     */
    private function generateSeed(array $params){
        if(empty($params['table'])){
            throw new \InvalidArgumentException('no table name');
        }
        
        $tableName=strip_tags($params['table']);
                
        if(empty($params['seeds'])){
            throw new \InvalidArgumentException('no seeds');
        }
        foreach($params['seeds'] as $seed){
            try{
                $this->insertEntry($tableName, $seed);
            }catch(\PDOException $e){
                throw new \InvalidArgumentException($e->getMessage());
            }
        }
        return $tableName;
    }
    
    /**
     * insert seed in table
     * @param type $tableName
     * @param array $entry
     * @return type
     */
    private function insertEntry($tableName, array $entry){
        $arraySql=$this->generateSql($tableName, $entry);
        $stmt=$this->pdo->prepare($arraySql['sql']);
        for($i=0; $i<count($arraySql['values']); $i++){
            $stmt->bindValue($arraySql['bind'][$i], $arraySql['values'][$i]);
        }
        return $stmt->execute();
    }
    
    /**
     * generate sql code for seed insert
     * @param type $tableName
     * @param array $entry
     * @return type
     */
    private function generateSql($tableName, array $entry){
        $req="INSERT INTO `".$tableName."` ";
        $keys=[];
        $bind=[];
        $values=[];
        foreach($entry as $k=>$v){
            $keys[]="`" . strip_tags($k) . "`";
            $bind[]=':' . strip_tags($k);
            $values[]=(is_numeric($v))? $v : "$v";
        }
        $req.="(" . implode(',', $keys) . ") VALUES (" . implode(',', $bind) . ")";
        return ['sql'=>$req, 'values'=>$values, 'bind'=>$bind];
    }
}