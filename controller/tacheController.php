<?php
include_once 'model/tacheModel.php';
include './service/regexService.php';

class TacheController
{

    private $model;

    public function __construct()
    {
        $this->model = new TacheModel;
    }

    public function getNewTache()
    {
        include_once './view/formNewTache.php';
    }

    /**
     * Creer une tache
     */
    public function createTache()
    {
        if (isset($_POST['tacheTitre']))
        {// validation des taches titre
            if (verifyTacheName($_POST['tacheTitre']))
            {
                $tache = $_POST['tacheTitre'];

                if ($this->model->createTache($tache)) {
                    echo "tache enregistré !";
                    include_once './view/getBackAccueil.php';
                } else {
                    echo "Erreur d'inscription";
                    $this->getNewTache();
                }
            }
            else
            {
                include_once './view/formNewTache.php';
                echo "La tache doit comprendre un titre, qui accepte seulement les lettres, chiffres, !, ?, -, ., (, ), \", '";
            }
        }
        else
        {
            $this->getNewTache();
        }
    }
    
    /**
     * Afficher les taches
     */
    public function getTachesFields()
    {
        $taches = $this->model->getTaches();
        $fields = $this->model->getFields();
        include_once './view/tache.php';
        
        if (!count($taches))
        {
            echo "<p>Il n'y a pas encore de taches. </p>";
        }
        $this->createFields();
    }

    function createFields(){
        $keys = array_keys($_POST);
        $lkey = preg_grep("/addField[0-9]+/", $keys);
        if ($lkey)
        {// validation des fields
            $key = $lkey[0];
            if (verifyTacheName($_POST[$key]))
            {
                $field = $_POST[$key];
                
                $tache_id = str_split($key);
                array_splice($tache_id, 0, 8);
                $tache_id = implode($tache_id);
                $tache_id = (int)$tache_id;
    
                if ($this->model->createField($tache_id, $field)) {
                    include_once './view/tache.php';
                } else {
                    echo "Field non ajouté, erreur lors de l'ajout.";
                }
            }
            // else
            // {
            //     include_once './view/tache.php';
            //     echo "Le field doit comprendre un titre, qui accepte seulement les lettres, chiffres, !, ?, -, ., (, ), \", '";
            // }
        }
        else
        {
            $this->getTachesFields();
        }
    }
}