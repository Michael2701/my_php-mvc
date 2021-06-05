<?php
namespace app\models;
use app\models\Model;

class Department extends Model{
    private function __construct(){}

    public static function Instance() : ?Department
    {
        if(!self::$instance)
          self::$instance = new Department();
       
        return self::$instance;        
    }


}
