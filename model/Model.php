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
            $data = array(':email' => $tab['email'],
                ':password' => $tab['password']);
            $select = $this->pdo->prepare($request);
            $select->execute($data);
            return $select->fetchAll();
        } else {
            return NULL;
        }
    }

    public function selectAllOffer()
    {
        if ($this->pdo != NULL) {
            $request = 'SELECT * FROM offer;';
            $select = $this->pdo->prepare($request);
            $select->execute();
            return $select->fetchAll();
        } else {
            return NULL;
        }
    }

    public function closeOffer($id)
    {
        if ($this->pdo != NULL) {
            $request = 'UPDATE offer SET availability = 0, end_date = CURDATE() WHERE id = :id;';
            $data = array(':id' => $id);
            $select = $this->pdo->prepare($request);
            $select->execute($data);
        }
    }

    public function insertOffer($tab)
    {
        if ($this->pdo != NULL) {
            $request = 'INSERT INTO offer VALUES (NULL, :name, :descrption, 1, :contract, :hourly_wage, CURDATE(), NULL);';
            $data = array(':name' => $tab['name'],
                ':descrption' => $tab['description'],
                ':contract' => $tab['contract'],
                ':hourly_wage' => $tab['hourly_wage']);
            $select = $this->pdo->prepare($request);
            $select->execute($data);
        }
    }
}
