<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

switch ($page) {
    case 'accueil':
        include_once 'controller/tacheController.php';
        $taches = new TacheController;
        $taches->getTachesFields();

        break;
    case 'message':
        include_once 'controller/tacheController.php';
        $taches = new TacheController;
        if (isset($_SESSION['userData']))
        {
            $taches->createTache();
        } else{
            ?>
            <h3>Vous devez vous connecter pour pouvoir écrire une tache !</h3>
            <?php
        }
        break;
    case 'inscription':
        include_once 'controller/usersController.php';
        $users = new UsersController;
        $users->inscription();
        break;
    case 'connexion':
        include_once 'controller/usersController.php';
        $users = new UsersController;
        $users->connexion();
        break;
    case 'deconnexion':
        session_unset();
        session_destroy();
        header("Location: index.php");
        break;

    default:
        include 'view/404.php';
}
