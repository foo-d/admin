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

    public function selectAllOffer()
    {
        return $this->model->selectAllOffer();
    }

    public function insertOffer($tab)
    {
        $this->model->insertOffer($tab);
    }

    public function closeOffer($id)
    {
        $this->model->closeOffer($id);
    }

    public function selectWherePostulation($id)
    {
        return $this->model->selectWherePostulation($id);
    }

    public function addInterview($id, $date)
    {
        $this->model->addInterview($id, $date);
    }

    public function archivePostulation($id)
    {
        $this->model->archivePostulation($id);
    }

    public function acceptPostulation($id)
    {
        $this->model->acceptPostulation($id);
    }
}
