<?php


class Model
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = NULL;
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=food', 'root', '');
        }
        catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function login($tab)
    {
        if ($this->pdo != NULL) {
            $request = 'SELECT login(:email, :password) as login;';
            $data = array(':email' => $tab['email'], ':password' => $tab['password']);
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        } else {
            return NULL;
        }
    }
}
