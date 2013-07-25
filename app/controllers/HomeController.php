<?php

class HomeController extends BaseController {

    public $layout = 'base.layout';
    
    public $title = 'Сервис бронирования';
    
    public function __construct()
    {
        $self = $this;
        
        $this->afterFilter(function() use ($self){
            $self->layout->title = 500;
        });
    }
    
    
    public function getIndex()
    {
        //return View::make('hello');
    }

    public function getSearch()
    {
        $this->layout->title = 'Поиск';
        $this->layout->content = View::make('base.search.index');
    }

	public function getHotel()
	{
        $this->layout->title = 'Поиск';
		$this->layout->content = View::make('base.hotel.index');
	}

}