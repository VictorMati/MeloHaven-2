<?php 

class MainController extends Controller
{
    // Home page action
    public function index()
    {
        // Load the home page view
        $this->loadView('main_layout');
    }
}