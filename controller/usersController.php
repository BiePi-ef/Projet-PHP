<?php
include_once 'model/usersModel.php';
include './service/regexService.php';

class UsersController
{

    private $model;

    public function __construct()
    {
        $this->model = new UsersModel;
    }

    /**
     * Inscription
     */
    public function getFormInscription()
    {
        include 'view/inscription.php';
    }

    public function inscription()
    {
        if (isset($_POST['userName'])) {
            
            if (verifyUserName($_POST['userName'])) {
                $userName = $_POST['userName'];
            }
            else 
            {
                echo "User name invalid format (numerals, letters, _-!?. and whitespace only, 3 char min, 30 char max)";
            }

            if (verifyPassword($_POST['mdp'])) {
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);            }
            else 
            {
                echo "<br>password invalid format (numerals, letters, _-!?. and whitespace only, 10 char min, 30 char max)";
            }

            if (isset($userName) && isset($mdp))
            {
                if ($this->model->inscription($userName, $mdp)) {
                    echo "Inscription OK";
                    include_once './view/getBackAccueil.php';
                } else {
                    echo "Erreur d'inscription";
                    $this->getFormInscription();
                }
            } else
            {
                $this->getFormInscription();
            }
            
        } else {
            $this->getFormInscription();
        }
    }


    /**
     * Connexion
     */
    public function getFormConnexion()
    {
        include 'view/connexion.php';
    }

    public function connexion()
    {
        if (isset($_POST['userName'])) {
            $userName = $_POST['userName'];
            $user = $this->model->getUserByName($userName);
            $mdp = password_verify($_POST['mdp'], $user['mdp']);

            if ($mdp) {
                $_SESSION["userData"] = $user;
                header("Location: index.php");
                echo "Connexion OK";
            } else {
                echo "Erreur de connexion";
                $this->getFormConnexion();
            }
        } else {
            $this->getFormConnexion();
        }
    }
}