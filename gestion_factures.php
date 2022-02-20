<h2> Gestion des Factures </h2>

<?php 
    $unControleur->setTable("contrat");
    $lesContrats = $unControleur->selectAll();
    $unControleur->setTable("facture");
    
    if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
        
        $laFacture = null;
        if (isset($_GET['action']) and isset($_GET['idF'])) {
            $action = $_GET['action'];
            $idF = $_GET['idF'];
            switch ($action) {
                case 'sup':
                    $where = array("idF"=>$idF);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idF"=>$idF);
                    $laFacture = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_facture.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "montantHT"=>$_POST['montantHT'],
                "TVA"=>"",
                "montantTTC"=>"",
                "dateF"=>$_POST['dateF'],
                "idCo"=>$_POST['idCo']
            );
            $where = array("idF"=> $_GET['idF']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=admin&tab=factures");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "montantHT"=>$_POST['montantHT'],
                "TVA"=>"",
                "montantTTC"=>"",
                "dateF"=>$_POST['dateF'],
                "idCo"=>$_POST['idCo']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idF", "montantHT", "TVA", "montantTTC", "dateF", "idCo");
        $lesFactures = $unControleur->selectSearch($like, $mot);
    }else {
        $lesFactures = $unControleur->selectAll();
    }
    require_once("vue/vue_les_factures.php");
?>