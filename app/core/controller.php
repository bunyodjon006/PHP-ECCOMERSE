<?php

class Controller
{
    public function view($path, $data = [])
    {
        if (file_exists("../app/views/" . THEME . $path . ".php")) {
            include "../app/views/" . THEME . $path . ".php";
        }
    }

    public function load_model($model)
    {
        if (file_exists("../app/views/" . strtolower($model) . ".class.php")) {
            include "../app/views/" . strtolower($model) . ".class.php";
            return $a = new $model();
        }
        return false;
    }
}