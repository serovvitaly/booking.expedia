<?php

class HomeController extends BaseController {

    public $layout = 'base.layout';
    
    public $title = 'Сервис бронирования';
    
    public function __construct()
    {
        
        $this->afterFilter(function($router, $method, $response){
            $response->header('Access-Control-Allow-Origin', 'http://api.appros');
        });
    }
    
    public function getIndex()
    {
        //return View::make('hello');
    }

    public function getGo()
    {
        $this->layout->title = 'Поиск';
        $this->layout->content = View::make('base.search.index');
    }

}