<?php

namespace App;

class Config
{
    protected  static object $instance;
    public $data;
    private function __construct(){
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function getInstance(){
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

}