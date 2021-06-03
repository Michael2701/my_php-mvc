<?php
namespace app\controllers;
use app\models\Customer;
use app\controllers\Controller;


class IndexController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $this->view("index", []);
    }

}

