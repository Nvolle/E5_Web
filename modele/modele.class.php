<?php
class Controleur
{
    private $unPdo, $uneTable;

    public function __construct($serveur, $bdd, $user, $mdp){
        $this->unPdo= null;
        try {
            $this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion : " . $exp ->getMessage();
        }
    }
    
    public function selectAll()
    {
        $requete = "select * from " . $this->uneTable . ";";
        $select = $this->unPdo->prepare($requete);
        $select->execute();
        return $select->fetchAll(); 
    }

    public function selectWhere($where)
    {
        $donnees = array();
        $champs = array();
        foreach ($where as $cle => $valeur) {
            $champs[] = $cle." = :".$cle;
            $donnees [":".$cle] = $valeur;
        }
        $chaineWhere = implode (" and ", $champs);
        $requete = "select * from " . $this->uneTable . " where ".$chaineWhere.";";
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        return $select->fetch(); //un seul resultat
    }

    public function setTable($uneTable)
    {
        $this->uneTable = $uneTable;
    }

    public function selectSearch($like, $mot)
    {
        $champs = array();
        $donnees = array(":mot"=>"%".$mot."%");
        foreach ($like as $cle) {
            $champs[] = $cle." like :mot ";
        }
        $chaineWhere = implode(" or ", $champs);
        $requete = "select * from   " . $this->uneTable . " where " .$chaineWhere;
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
        return $select->fetchAll();
    }

    public function insert($tab)
    {
        $donnees = array();
        $champs = array();
        foreach ($tab as $cle => $valeur) {
            $champs[] = ":".$cle ;
            $donnees[":".$cle] = $valeur;
        }
        $chaineChamps = implode (",", $champs);
        $requete = "insert into ".$this->uneTable." values (null, ".$chaineChamps.");";
        $select = $this->unPdo->prepare($requete);
        $select->execute($donnees);
    }
    
    public function delete($where)
    {
        $donnees = array();
        $champs = array();
        foreach ($where as $cle => $valeur) {
            $champs[] = $cle." =:".$cle ;
            $donnees[":".$cle] = $valeur;
        }
        $chaineWhere = implode (" and ", $champs);
        $requete = "delete from ".$this->uneTable." where ".$chaineWhere.";";
        $delete = $this->unPdo->prepare($requete);
        $delete->execute($donnees);
    }

    public function update($tab, $where)
    {
        $donnees = array();
        $champs = array();
        foreach ($tab as $cle => $valeur) {
            $champs[] = $cle."= :".$cle ;
            $donnees[":".$cle] = $valeur;
        }
        $chaineChamps = implode (",", $champs);
        $champs2 = array();
        foreach ($where as $cle => $valeur) {
            $champs2[] = $cle." =:".$cle ;
            $donnees[":".$cle] = $valeur;
        }
        $chaineWhere = implode (" and ", $champs2);
        $requete = "update ".$this->uneTable." set ".$chaineChamps." where ".$chaineWhere.";";
        echo $requete;
        $update = $this->unPdo->prepare($requete);
        $update->execute($donnees);
    }

    public function count()
    {
        $requete = "select count(*) as nb from ".$this->uneTable.";";
        $count = $this->unPdo->prepare($requete);
        $count->execute();
        return $count->fetch();
    }

    public function callProcedure($procedure)
    {
        $requete = 'CALL '.$procedure.'()';
        $call = $this->unPdo->prepare($requete);
        $call->execute();
    }
}
?>