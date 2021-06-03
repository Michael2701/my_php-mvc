<?php
namespace app\Models;

use \PDO;

class Model{
    protected static string $host = "localhost";
    protected static string $dbname = "meckano";
    protected static string $username = "root";
    protected static string $password = "rootroot";
    protected static string $charset = "utf8mb4";
    protected static ?PDO $conn = null;

    protected static $instance = null;

    private function __construct()
    {
        self::connect();
    }

    protected static function connect() 
    {
        $dsn = "mysql:host=".self::$host.";dbname=".self::$dbname.";charset=".self::$charset;

        try {
            self::$conn = new PDO($dsn, self::$username, self::$password, $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function Instance() : ?Model
    {
        if(!self::$instance)
          self::$instance = new Model();
       
        return self::$instance;        
    }

    public function getConnection() : ?PDO
    {
        if(!self::$conn)
            self::$connect();
        return self::$conn;
    }

    public static function disconnect()
    {
        self::$conn = NULL;
    }

    public static function select(string $sql)
    {
        $result = [];

        self::connect();
        $stmt = self::$conn->query($sql);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = $row;
        }
        
        self::disconnect();
        return $result;        
    }

    // public static function fetchAll()
    // {
    //     $result = [];

    //     self::connect();
    //     $stmt = self::$pdo->query('SELECT * FROM customers');
        
    //     while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    //     {
    //         $result[] = $row;
    //     }
        
    //     self::disconnect();
    //     return $result;
    // }

    // public static function update(string $name, int $id)
    // {
    //     $stmt = self::$pdo->prepare("UPDATE customers SET first_name = :first_name WHERE id = :id");
    //     $stmt->execute([':first_name' => $name, ':id' => $id]);
    //     $stmt = null;
    // }

    // public static function insert($name, $age)
    // {
    //     $stmt = self::$pdo->prepare("INSERT INTO myTable (name, age) VALUES (:name, :age)");
    //     $stmt->execute([':name' => $name, ':age' => $age]);
    //     $stmt = null;
    // }

    // public static function delete(int $id)
    // {
    //     $stmt = self::$pdo->prepare("DELETE FROM myTable WHERE id = :id");
    //     $stmt->execute([':id' => $id]);
    //     $stmt = null;
    // }


}
