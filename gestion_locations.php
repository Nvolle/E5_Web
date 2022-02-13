<h2> Gestion des Locations </h2>

<?php 
    $unControleur->setTable("contrat");
    $lesContrats = $unControleur->selectAll();
    $unControleur->setTable("materiel");
    $lesMateriels = $unControleur->selectAll();
    $unControleur->setTable("location");
    
    if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
        
        $laLocation = null;
        if (isset($_GET['action']) and isset($_GET['idL'])) {
            $action = $_GET['action'];
            $idL = $_GET['idL'];
            switch ($action) {
                case 'sup':
                    $where = array("idL"=>$idL);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idL"=>$idL);
                    $laLocation = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_location.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "idCo"=>$_POST['idCo'],
                "idM"=>$_POST['idM']
            );
            $where = array("idL"=> $_GET['idL']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=4");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "idCo"=>$_POST['idCo'],
                "idM"=>$_POST['idM']
            );
            $unControleur->insert($tab);
        }
    }

    $unControleur->setTable("location_materiel");
    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idL", "idCo", "idM");
        $lesLocations = $unControleur->selectSearch($like, $mot);
    }else {
        $lesLocations = $unControleur->selectAll();
    }
    require_once("vue/vue_les_locations.php");
?>