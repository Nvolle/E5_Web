<h2> Gestion des Types de Matériels </h2>

<?php 
    $unControleur->setTable("typeMat");
    
    if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
        
        $leTypeMat = null;
        if (isset($_GET['action']) and isset($_GET['idTM'])) {
            $action = $_GET['action'];
            $idTM = $_GET['idTM'];
            switch ($action) {
                case 'sup':
                    $where = array("idTM"=>$idTM);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idTM"=>$idTM);
                    $leTypeMat = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_typeMat.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "designation"=>$_POST['designation']
            );
            $where = array("idTM"=> $_GET['idTM']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=admin&tab=typeMats");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "designation"=>$_POST['designation']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idTM", "designation");
        $lesTypeMats = $unControleur->selectSearch($like, $mot);
    }else {
        $lesTypeMats = $unControleur->selectAll();
    }
    require_once("vue/vue_les_typeMats.php");
?>