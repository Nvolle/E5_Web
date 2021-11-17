<h2> Gestion des enseignements </h2>

<?php 
    $unControleur->setTable("professeur");
    $lesProfesseurs = $unControleur->selectAll();
    $unControleur->setTable("classe");
    $lesClasses = $unControleur->selectAll();

    if (isset($_POST["Valider"])) {
        $unControleur->setTable("enseignement");
        $tab = array("matiere"=>$_POST['matiere'],
                    "nbheures"=>$_POST['nbheures'],
                    "coef"=>$_POST['coef'],
                    "idclasse"=>$_POST['idclasse'],
                    "idprofesseur"=>$_POST['idprofesseur']);
        $unControleur->insert($tab);
    }

    $unControleur->setTable("enseignements_classes_professeurs");

    require_once("vue/vue_insert_enseignement.php");

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("matiere", "nbheures", "coef", "idclasse");
        $lesEnseignements = $unControleur->selectSearch($like, $mot);
    }else {
        $lesEnseignements = $unControleur->selectAll();
    }
    require_once("vue/vue_les_enseignements.php");
?>