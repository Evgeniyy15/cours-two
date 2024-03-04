<?php


namespace App;

class Db
{

    protected object $dbh;

    function __construct(){
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    function query($sql, $data = [], $class){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        /*
        $data =  $sth->fetchAll();
        $ret  = [];
        foreach ($data as $row){
            $item = new $class;
            foreach ($row as $key => $value){
                if(is_numeric($key)){
                    continue;
                }
                $item->$key = $value;
            }
            $ret[] = $item;
        }
        return $ret;
        */
    }

    function execute($query, $params = []){
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }


}