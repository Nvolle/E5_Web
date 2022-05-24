<?php 
    $unControleur->setTable("materiel");
    $where = array("idM"=>$_GET['id']);
    $lesProduits = $unControleur->selectWhere($where);
    
    if (isset($_POST["Reserver"])) {
        $unControleur->setTable("contrat");
        $tab = array(
            "datedebut"=>date('Y-m-d'),
            "datedefin"=>null,
            "etat"=>"en_cours",
            "idC"=>$_SESSION['idC']
        );
        $unControleur->insert($tab);
        $idCo = $unControleur->selectMax("idCo"); //contrat créé

        $unControleur->setTable("location");
        $tab = array(
            "idCo"=>$idCo['max(idCo)'],
            "idM"=>$lesProduits['idM'],
            "qtM"=>$_POST['qtM']
        );
        $unControleur->insert($tab);

        $qtR = ($lesProduits['qtStockM'] - $_POST['qtM']);
        $unControleur->setTable("materiel");
        $tab = array(
            "prixM"=>$lesProduits['prixM'],
            "qtStockM"=>$qtR,
            "nomM"=>$lesProduits['nomM'],
            "idTM"=>$lesProduits['idTM']
        );
        $where = array("idM"=> $lesProduits['idM']);
        $unControleur->update($tab, $where);

        echo"<h3>Location enregistrée<h3>";
    }
    require_once("vue/vue_les_produits.php");
?>