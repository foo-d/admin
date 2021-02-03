<?php
    require_once('model/Model.php');

class Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function login($tab)
    {
        return $this->model->login($tab);
    }
}
