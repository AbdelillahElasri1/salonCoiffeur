<?php
    header("Access-Control-Allow-Origin: *");
    header("content-type: Application/json");
class test extends Controller{
    private $model;
    function __construct()
    {
        $this->model=$this->model('navire');
    }

    function getnav(){
        $res=$this->model->getnav();
        echo json_encode($res);
    }
} 