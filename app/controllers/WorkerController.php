<?php
namespace app\controllers;
use app\models\Worker;
use app\controllers\Controller;


class WorkerController extends Controller{
    public function __construct()
    {
        parent::__construct();
        $this->worker_model = Worker::Instance();
    }

    public function showWorkers()
    {
        $workers = $this->worker_model::select("SELECT * FROM workers LEFT JOIN department ON workers.department_id=department.id");
        echo json_encode($workers);
        
    }

    public function createWorker()
    {

    }

    public function updateWorker($id)
    {
        $data = [
            "first_name" => htmlspecialchars($_POST["first_name"]), 
            "last_name" => htmlspecialchars($_POST["last_name"]), 
            "address" => htmlspecialchars($_POST["address"]), 
            "phone" => htmlspecialchars($_POST["phone"]), 
            "email" => htmlspecialchars($_POST["email"]),
        ];
        try{
            $affectedRows = $this->worker_model::update($id, $data);
            if($affectedRows)
                echo json_encode(["success" => true, "rows" => $affectedRows, "message" => "Worker updated"]);
            else    
                echo json_encode(["success" => false, "Worker not updated"]);
        }
        catch(Exception $e){
            echo json_encode(["success" => false, "Worker not updated"]);
        }
    }

    public function deleteWorker($id)
    {
        try{
            $affectedRows = $this->worker_model::delete($id);   
            echo json_encode(["success" => true, "rows" => $affectedRows, "message" => "Worker deleted"]);
        
        }
        catch(Exception $e){
            echo json_encode(["success" => false, "Worker not deleted"]);
        }


    }
}

