<?php

class Home extends Controller{

    function index(){

        $song = $this->loadModel("song");
        $this->loadView("home");
    }
}