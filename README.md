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

use App\database\Seeds and create yml files for db seeding
    
    table: articles
        seeds:
            0: 
                name: toto
                password: toto
                email: toto@mail.com
                status: admin
            1: 
                name: titi
                password: titi
                email: titi@mail.com
                status: visitor

RUN MIGRATION
 php vendor\Drakkar\console\seafarer.php pour commande database puis arguments :
    
    use file from App\database\tables
    migrate:create => create all table
    migrate:drop => drop all table
    migrate:drop table => drop table

    use seed from App\database\seeds
    seed:seed => seed all tables 
    seed:seed table => seed table
    seed:truncate => truncate all table
    seed:truncate table => truncate table