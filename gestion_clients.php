<h2> Gestion des comptes clients <?php echo $_SESSION['role'] == "superadmin" ? "" : "de l'entreprise ".$_SESSION['societe']?></h2>

<?php 
    $unControleur->setTable("client");
    $lesClients = $unControleur->selectAll();
    
    if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
        
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
                "prenom"=>$_POST['prenom'],
                "adresse"=>$_POST['adresse'],
                "ville"=>$_POST['ville'],
                "cp"=>$_POST['cp'],
                "societe"=>$_POST['societe'],
                "mail"=>$_POST['mail'],
                "tel"=>$_POST['tel'],
                "username"=>$_POST['username'],
                "mdp"=>$_POST['mdp'],
                "role"=>$_POST['role']
            );
            $where = array("idC"=> $_GET['idC']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=admin&tab=clients");
        }
    
        if (isset($_POST["Valider"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "adresse"=>$_POST['adresse'],
                "ville"=>$_POST['ville'],
                "cp"=>$_POST['cp'],
                "societe"=>$_POST['societe'],
                "mail"=>$_POST['mail'],
                "tel"=>$_POST['tel'],
                "username"=>$_POST['username'],
                "mdp"=>$_POST['mdp'],
                "role"=>$_POST['role']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("idC", "nom", "adresse", "ville", "cp", "societe", "mail", "tel");
        $lesClients = $unControleur->selectSearch($like, $mot);
    } elseif ($_SESSION['societe']=='Null') {
        $lesClients = $unControleur->selectAll();
    } else {
        $mot = $_SESSION['societe'];
        $like = array("societe");
        $lesClients = $unControleur->selectSearch($like, $mot);
    }
    require_once("vue/vue_les_clients.php");
?>