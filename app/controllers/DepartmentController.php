<?php
namespace app\controllers;
use app\models\Department;
use app\controllers\Controller;


class DepartmentController extends Controller{
    public function __construct()
    {
        $this->dmodel = Department::Instance();
    }

    public function showDepartments()
    {
        $departments = $this->dmodel::select("SELECT * FROM department");
        echo json_encode($departments);
    }

    public function FetchUserByID($id)
    {
        $customer = $this->dmodel::select("SELECT * FROM department WHERE id=$id");

        $this->view("customer", ["customer" => $customer[0]]);
    }
}

