<h2> Gestion des comptes client de l'entreprise <?php echo $_SESSION['societe']?></h2>

<?php 
    $unControleur->setTable("client");
    
    if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
        
        $leClient = null;
        if (isset($_GET['action']) and isset($_GET['idC'])) {
            $action = $_GET['action'];
            $idC = $_GET['idC'];
            switch ($action) {
                case 'sup':
                    $where = array("idC"=>$idC);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idC"=>$idC);
                    $leClient = $unControleur->selectWhere($where);
                    break;
            }
        }
        
        require_once("vue/vue_insert_client.php");
    
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "adresse"=>$_POST['adresse'],
                "ville"=>$_POST['ville'],
                "cp"=>$_POST['cp'],
                "societe"=>$_POST['societe'],
                "mail"=>$_POST['mail'],
                "tel"=>$_POST['tel']
            );
            $where = array("idC"=> $_GET['idC']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=1");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "adresse"=>$_POST['adresse'],
                "ville"=>$_POST['ville'],
                "cp"=>$_POST['cp'],
                "societe"=>$_POST['societe'],
                "mail"=>$_POST['mail'],
                "tel"=>$_POST['tel']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idC", "nom", "adresse", "ville", "cp", "societe", "mail", "tel");
        $lesClients = $unControleur->selectSearch($like, $mot);
    }else {
        $mot = $_SESSION['societe'];
        $like = array("societe");
        $lesClients = $unControleur->selectSearch($like, $mot);;
    }
    require_once("vue/vue_les_clients.php");
?>