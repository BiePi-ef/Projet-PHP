<?php
include_once 'bdd.php';

class UsersModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function inscription($userName, $mdp)
    {
        $user = $this->bdd->prepare("INSERT INTO users(userName,mdp) VALUES(?,?)");
        return $user->execute([$userName, $mdp]);
    }

    public function getUserByName($userName)
    {
        return $this->bdd->query("SELECT * FROM users WHERE userName='$userName'")->fetch(PDO::FETCH_ASSOC);
    }
}
