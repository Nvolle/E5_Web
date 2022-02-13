<h2> Gestion des Matériels </h2>

<?php 
    $unControleur->setTable("typeMat");
    $lesTypeMats = $unControleur->selectAll();
    $unControleur->setTable("materiel");
    
    if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
        
        $leMateriel = null;
        if (isset($_GET['action']) and isset($_GET['idM'])) {
            $action = $_GET['action'];
            $idM = $_GET['idM'];
            switch ($action) {
                case 'sup':
                    $where = array("idM"=>$idM);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idM"=>$idM);
                    $leMateriel = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_materiel.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "qtM"=>$_POST['qtM'],
                "nomM"=>$_POST['nomM'],
                "idTM"=>$_POST['idTM']
            );
            $where = array("idM"=> $_GET['idM']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=5");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "qtM"=>$_POST['qtM'],
                "nomM"=>$_POST['nomM'],
                "idTM"=>$_POST['idTM']
            );
            $unControleur->insert($tab);
        }
    }

    $unControleur->setTable("materiel_typeMat");
    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idM", "qtM", "nomM", "idTM", "designation");
        $lesMateriels = $unControleur->selectSearch($like, $mot);
    }else {
        $lesMateriels = $unControleur->selectAll();
    }
    require_once("vue/vue_les_materiels.php");
?>