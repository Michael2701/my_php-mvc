<?php
namespace app\models;
use app\models\Model;

class Worker extends Model{
    private function __construct(){}

    public static function Instance() : ?Worker
    {
        if(!self::$instance)
          self::$instance = new Worker();
       
        return self::$instance;        
    }


    public static function update(int $id, array $data) : int
    {
        self::connect();
        $stmt = self::$conn->prepare("UPDATE workers SET first_name=:first_name, last_name=:last_name, email=:email, phone=:phone, address=:address  WHERE id = :id");
        $affectedRows = $stmt->execute([
            ':first_name' => $data["first_name"], 
            ':last_name' => $data["last_name"], 
            ':address' => $data["address"], 
            ':phone' => $data["phone"], 
            ':email' => $data["email"], 
            ':id' => $id
        ]);
        
        self::disconnect();
        return $affectedRows;
    }

    public static function delete($id){
        self::connect();
        $stmt = self::$conn->prepare("DELETE FROM workers WHERE id = :id LIMIT 1");
        $affectedRows = $stmt->execute([':id' => $id]);
        self::disconnect();
        return $affectedRows;
    }

}
