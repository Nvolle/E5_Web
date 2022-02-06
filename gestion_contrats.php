<h2> Gestion des Contrats </h2>

<?php 
    $unControleur->setTable("contrat");
    
    if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
        
        $leContrat = null;
        if (isset($_GET['action']) and isset($_GET['idCo'])) {
            $action = $_GET['action'];
            $idCo = $_GET['idCo'];
            switch ($action) {
                case 'sup':
                    $where = array("idCo"=>$idCo);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idCo"=>$idCo);
                    $leContrat = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_contrat.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "datedebut"=>$_POST['datedebut'],
                "datedefin"=>$_POST['datedefin'],
                "idC"=>$_POST['idC']
            );
            $where = array("idCo"=> $_GET['idCo']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=2");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "datedebut"=>$_POST['datedebut'],
                "datedefin"=>$_POST['datedefin'],
                "idC"=>$_POST['idC']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idCo", "datedebut", "datedefin", "idC");
        $lesContrats = $unControleur->selectSearch($like, $mot);
    }else {
        $lesContrats = $unControleur->selectAll();
    }
    require_once("vue/vue_les_contrats.php");
?>