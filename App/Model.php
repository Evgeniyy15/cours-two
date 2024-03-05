<?php

namespace App;

abstract class Model
{
    public $id;
    public static function findAll(){
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql,
            [],
            static::class
        );
    }

    public static function findById($id){
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id';
        $data = $db->query($sql, [':id' => $id, ], static::class);
        if(empty($data))
            return false;
        return $data[0];
    }

    public function insert()
    {
        $fields = get_object_vars($this);
        $columns = [];
        $params = [];
        foreach ($fields as $name => $value){
            if($name == 'id')
                continue;
            $columns[] = $name;
            $params[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . '
         (' . implode(',', $columns) . ')
          VALUES 
          (' . implode(', ', array_keys($params)) .');';
        $db = new Db();
        $db->execute($sql, $params);
        $this->id = $db->getLastId();
    }

    public function update(){
        $fields = get_object_vars($this);
        if(empty($fields['id']))
            return false;
        $columns = [];
        $params = [];
        foreach ($fields as $name => $value){
            $params[':' . $name] = $value;
            if($name != 'id')
                $columns[] = $name  . '= ' . ':' . $name;
        }
        $sql = 'UPDATE ' . static::TABLE . '
         SET ' . implode(', ', $columns) . '
         WHERE id = :id';
        $db = new Db();
        $db->execute($sql, $params);
    }

    public function save(){
        $fields = get_object_vars($this);
        if(empty($fields['id'])){
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete(){
        $fields = get_object_vars($this);
        $idParam[':id'] = $fields['id'] ;
        $sql = 'DELETE FROM '
            . static::TABLE .
       ' WHERE id = :id;';
        $db = new Db();
        $db->execute($sql, $idParam);
    }
}