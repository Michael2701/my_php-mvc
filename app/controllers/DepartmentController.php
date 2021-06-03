<?php
namespace app\controllers;
use app\models\Customer;
use app\controllers\Controller;


class DepartmentController extends Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cmodel = Customer::Instance();
    }

    public function Index()
    {
        $customers = $this->cmodel::select("SELECT * FROM customers");

        $this->view("index", ["customer" => $customers]);
    }

    public function FetchUserByID($id)
    {
        $customer = $this->cmodel::select("SELECT * FROM customers WHERE id=$id");

        $this->view("customer", ["customer" => $customer[0]]);
    }
}

