<?php
namespace Database;
use Symfony\Component\Yaml\Yaml;

class DatabaseAccessor implements \Interfaces\iSingleton{
    private $db;
    private $dbData;
    private $dbConnection;
    
    private static $instance = null;

    private function __construct(){}
    
    private function __clone(){}

    public static function getInstance(){
        return self::$instance;
    }

    public static function newInstance(){
        if(self::$instance==null) {
            self::$instance=new self();
        }
        return self::$instance;
    }

    /**
     * 
     * @param type $db
     */
    public function initDb(){
        $this->setDatabase()
            ->linkDatabase();
    }
    
    /**
     * set database from config file
     * @return \Drakkar
     */
    public function setDatabase(){
        $this->dbData=Yaml::parse(PATH_CONFIG . 'database.yml');
        $this->dbConnection=$this->dbData['connections'][$this->dbData['default']];
        return $this;
    }
    
    /**
     * set connect to database 
     */
    public function linkDatabase(){
        $DB='\Database\Connect\Db'.ucfirst(strtolower($this->dbConnection['driver']));
        $DB::setConnect($this->dbConnection);
        $this->db=$DB::getConnect();
    }
    
    /**
     * @return type
     */
    public function getDb(){
        return $this->db;
    }
}