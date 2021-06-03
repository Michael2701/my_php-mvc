<?php
namespace app\controllers;

class Controller{
    public function __construct()
    {
        $this->views_path = __DIR__."/../views/";
    }

    public function view($view_path, $data)
    {
        foreach($data as $dkey => $dval)
            ${$dkey} = $dval;
        
        $path = preg_replace("/\./", "/", $view_path);

        require_once($this->views_path.$path.".php");
    }
}