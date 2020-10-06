<?php
namespace MyApp\controllers;

class Home{
    protected $container;
    public function __construct($container){
        $this->container = $container;
    }

    public function index($request, $response){

        $r = $this->container->get('request');
        return $response->write('Teste index');
    }
}