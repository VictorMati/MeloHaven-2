<?php

class controller{

    public function __construct() {
        // constructor code
    }

    protected function loadView($view){

        if (file_exists("../app/views/pages/".$view.".php")){

            include("../app/views/pages/".$view.".php");
        }
        else{
            include("../app/views/404.php");
        }
    }

    protected function loadModel($model){

        if (file_exists("../app/models/".$model.".php")){

            include("../app/models/".$model.".php");

            return $model = new $model();
        }
        else{
            return false;
        }
    }

    protected function redirectTo($location) {
        header("Location: $location");
        exit();
    }
}