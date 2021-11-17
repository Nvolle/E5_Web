<h2> Gestion des professeurs </h2>

<?php 
    $unControleur->setTable("professeur");
    
    if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {

        $leProfesseur = null;
        if (isset($_GET['action']) and isset($_GET['idprofesseur'])) {
            $action = $_GET['action'];
            $idprofesseur = $_GET['idprofesseur'];
            switch ($action) {
                case 'sup':
                    $where = array("idprofesseur"=>$idprofesseur);
                    $unControleur->delete($where);
                    break;
                case 'edit':
                    $where = array("idprofesseur"=>$idprofesseur);
                    $laClasse = $unControleur->selectWhere($where);
                    break;
            }
        }

        require_once("vue/vue_insert_professeur.php");

        if (isset($_POST["Modifier"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "email"=>$_POST['email'],
                "tel"=>$_POST['tel']
            );
            $where = array("idprofesseur"=> $_GET['idprofesseur']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=2");
        }

        if (isset($_POST["Valider"])) {
            $tab = array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "email"=>$_POST['email'],
                "tel"=>$_POST['tel']
            );
            $unControleur->insert($tab);
        }
    }

    if (isset($_POST['Rechercher'])) {
        $mot = $_POST['mot'];
        $like = array("nom", "prenom", "email", "tel");
        $lesProfesseurs = $unControleur->selectSearch($like, $mot);
    }else {
        $lesProfesseurs = $unControleur->selectAll();
    }
    require_once("vue/vue_les_professeurs.php");
?>