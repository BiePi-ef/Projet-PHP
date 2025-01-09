<?php
include_once 'bdd.php';

class TacheModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    /**
     * Submit taches
     */
    public function createTache($tache)
    {
        $userId = $_SESSION['userData']['user_id'];
        $tacheQuery = $this->bdd->prepare("INSERT INTO taches(tache_name,user_id) VALUES(?,?)");
        return $tacheQuery->execute([$tache, $userId]);
    }

    /**
     * retrieve all messages (sorted by date !)
     */
    public function getTaches()
    {
        if (isset($_SESSION["userData"]))
        {
            $userId = $_SESSION['userData']['user_id'];
            return $this->bdd->query("SELECT t.tache_id, t.tache_name, t.tache_date, u.userName FROM taches AS t JOIN users AS u ON t.user_id = u.user_id WHERE t.user_id = $userId ORDER BY tache_date DESC;")->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return [];
        }
    }

    public function createField($tache_id, $field)
    {
        $tacheQuery = $this->bdd->prepare("INSERT INTO fields(tache_id, field_name) VALUES(?,?)");
        return $tacheQuery->execute([$tache_id, $field]);
    }

    public function getFields()
    {
        return $this->bdd->query("SELECT * FROM fields AS f;")->fetchAll(PDO::FETCH_ASSOC);
    }
}


// $userId = $_SESSION['userData']['user_id'];
// $tacheQuery = $this->bdd->prepare("SELECT t.tache_id, t.tache_name, t.tache_date, u.userName FROM taches AS t JOIN users AS u ON t.user_id = u.user_id WHERE t.user_id = ? ORDER BY tache_date DESC;");
// $tacheQuery->bind_param($userId);
// $tacheQuery->execute();
// $result= $tacheQuery->get_result();
// return $result->fetchAll(PDO::FETCH_ASSOC);