<h2> Gestion des étudiants </h2>

<?php 
    $unControleur->setTable("classe");
    $lesClasses = $unControleur->selectAll();
    $unControleur->setTable("etudiants_classes");

    if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {

        $leEtudiant = null;
        if (isset($_GET['action']) and isset($_GET['idetudiant'])) {
            $action = $_GET['action'];
            $idetudiant = $_GET['idetudiant'];
            switch ($action) {
                case 'sup':
                    $where = array("idetudiant"=>$idetudiant);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idetudiant"=>$idetudiant);
                    $laClasse = $unControleur->selectWhere($where);
                    break;
            }
        }

        require_once("vue/vue_insert_etudiant.php");
        
        if (isset($_POST["Modifier"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "email"=>$_POST['email'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "idclasse"=>$_POST['idclasse']
            );
            $where = array("idetudiant"=> $_GET['idetudiant']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=3");
        }

        if (isset($_POST["Valider"])) {
            $unControleur->setTable("etudiant");
            $tab = array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "email"=>$_POST['email'],
                "tel"=>$_POST['tel'],
                "adresse"=>$_POST['adresse'],
                "idclasse"=>$_POST['idclasse']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("nom", "prenom", "email", "tel", "adresse");
        $lesEtudiants = $unControleur->selectSearch($like, $mot);
    }else {
        $lesEtudiants = $unControleur->selectAll();
    }
    require_once("vue/vue_les_etudiants.php");
?>