<?php

class HomeController extends BaseController {

    public $layout = 'base.layout';
    
    public $title = 'Сервис бронирования';
    
    public function __construct()
    {
        $this->afterFilter(function($router, $method, $response){
            //$response->header('Access-Control-Allow-Origin', 'http://api.appros');
        });
    }
    
    public function getIndex()
    {
        return Redirect::to('go');
    }

    public function getGo()
    {
        $this->layout->title = 'Поиск';
        $this->layout->content = View::make('base.search.index');
    }

}