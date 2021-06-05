<?php
require_once "../vendor/autoload.php";

use app\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// index route (main view)
Router::get('/', ['IndexController', 'Index']);

// worker routes
Router::get('/workers/show', ['WorkerController', 'showWorkers']);
Router::get('/workers/:id/get', ['WorkerController', 'getWorker']);
Router::post('/workers/create', ['WorkerController', 'createWorker']);
Router::post('/workers/:id/update', ['WorkerController', 'updateWorker']);
Router::get('/workers/:id/delete', ['WorkerController', 'deleteWorker']);


// departments routes
Router::get('/departments/show', ['DepartmentController', 'showDepartments']);
Router::post('/departments/create', ['DepartmentController', 'createDepartment']);
Router::post('/departments/:id/update', ['DepartmentController', 'updateDepartment']);
Router::post('/departments/:id/delete', ['DepartmentController', 'deleteDepartment']);
// Router::routes_list();



Router::navigate(function(){
    include(__DIR__."/../app/views/404.html");
});
