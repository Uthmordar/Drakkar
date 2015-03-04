<?php
namespace Console;
use Symfony\Component\Yaml\Yaml;

abstract class Command{
    /**
     * check if file provided is YAML
     * @param type $file
     * @param type $path
     * @return boolean
     */
    protected function checkYml($file, $path){
        if(extension_loaded('fileinfo')){
            $finfo=finfo_open(FILEINFO_MIME_TYPE);
            if(!in_array(finfo_file($finfo, $path . DIRECTORY_SEPARATOR . $file), ['text/x-yaml', 'application/x-yaml'])){
                return false;
            }
            finfo_close($finfo);
        }else{
            if(!strripos($file, '.yml')){
                return false;
            }
        }
        return true;
    }
    
    /**
     * get params from yaml file && check them
     * @param type $file
     * @return type
     * @throws \InvalidArgumentException
     */
    protected function getYamlParams($file, $path){
        $params=Yaml::parse($path . DIRECTORY_SEPARATOR . $file);
        if(empty($params) || !is_string($params['table'])){
            throw new \InvalidArgumentException('unvalid table argument');
        }
        return $params;
    }
}