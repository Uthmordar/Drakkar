![Build Status](https://travis-ci.org/Uthmordar/Drakkar.svg?branch=dev)
# Drakkar
## Requirements
* PHP >=5.4
* Symfony/Yaml
* Twig/Twig

DATABASE COMMANDS

use App\database\Tables and create yml file for db
    table: comments
        columns:
            id: 
                INT(11): unsigned|auto_increment
            article_id: 
                INT(11): unsigned|DEFAULT NULL
            content: 
                TEXT: not null
        keys:
            primary: id
            foreign: 
                key: article_id
                table: articles
                on: id
                delete: cascade

RUN MIGRATION
 php vendor\Drakkar\console\migration\migrate.php => create all table

 php vendor\Drakkar\console\migration\migrate.php drop => drop all table

 php vendor\Drakkar\console\migration\migrate.php drop comments => drop specific table