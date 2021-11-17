<h2> Gestion des enseignements </h2>

<?php 
    $unControleur->setTable("professeur");
    $lesProfesseurs = $unControleur->selectAll();
    $unControleur->setTable("classe");
    $lesClasses = $unControleur->selectAll();
    $unControleur->setTable("enseignements_classes_professeurs");

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

        require_once("vue/vue_insert_enseignement.php");

        if (isset($_POST["Modifier"])) {
            $tab = array(
                "matiere"=>$_POST['matiere'],
                "nbheures"=>$_POST['nbheures'],
                "coef"=>$_POST['coef'],
                "idclasse"=>$_POST['idclasse'],
                "idprofesseur"=>$_POST['idprofesseur']
            );
            $where = array("idetudiant"=> $_GET['idetudiant']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=4");
        }

        if (isset($_POST["Valider"])) {
            $unControleur->setTable("enseignement");
            $tab = array(
                "matiere"=>$_POST['matiere'],
                "nbheures"=>$_POST['nbheures'],
                "coef"=>$_POST['coef'],
                "idclasse"=>$_POST['idclasse'],
                "idprofesseur"=>$_POST['idprofesseur']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("matiere", "nbheures", "coef", "idclasse");
        $lesEnseignements = $unControleur->selectSearch($like, $mot);
    }else {
        $lesEnseignements = $unControleur->selectAll();
    }
    require_once("vue/vue_les_enseignements.php");
?>