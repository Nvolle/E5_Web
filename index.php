<?php
    session_start();
    require_once("controleur/config_bdd.php");
    require_once("controleur/controleur.class.php");
    $unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Roille SA <?php if($_SESSION!=null) echo"- ".($_SESSION['nom']." ".$_SESSION['prenom']) ?></title>
</head>
<body>
    <h1>Besoin de matériels ? Roille SA est là pour vous accompagner !</h1>

    <?php
        if (!isset($_SESSION['username'])) {
            require_once("vue/vue_connexion.php");
        }
        if (isset($_POST['SeConnecter'])) {
            $username = $_POST['username'];
            $mdp = $_POST['mdp'];
            $unControleur->setTable("user");
            $where = array("username"=>$username, "mdp"=>$mdp);
            $unUser = $unControleur->selectWhere($where);
            if (isset($unUser['username'])) {
                $_SESSION['username'] = $unUser['username'];
                $_SESSION['nom'] = $unUser['nom'];
                $_SESSION['prenom'] = $unUser['prenom'];
                $_SESSION['role'] = $unUser['role'];
                header("Location: index.php?page=home");
            }else {
                echo "<br/> Erreur d'identifiants";
            }
        }
        if (isset($_SESSION['username'])) {
            echo '
                <a href="index.php?page=home"><img src="images/home.png" height="50" width="50"></a>
                <a href="index.php?page=exit"><img src="images/deconnexion.png" height="50" width="50"></a><br/>
                <div> Pages de gestion : <br/>
                    <a href="index.php?page=1"> Clients</a><br/>
                    <a href="index.php?page=2"> Contrats</a><br/>
                    <a href="index.php?page=3"> Factures</a><br/>
                    <a href="index.php?page=4"> Locations</a><br/>
                    <a href="index.php?page=5"> Materiels</a><br/>
                    <a href="index.php?page=6"> Types de matériels</a>
                </div>
            ';
        }
        if(isset($_GET['page'])) $page = $_GET['page'];
        else $page = "home";
        switch ($page) {
            case "home": require_once ("home.php"); break;
            case 1: require_once ("gestion_clients.php"); break;
            case 2: require_once ("gestion_contrats.php"); break;
            case 3: require_once ("gestion_factures.php"); break;
            case 4: require_once ("gestion_locations.php"); break;
            case 5: require_once ("gestion_materiels.php"); break;
            case 6: require_once ("gestion_typeMats.php"); break;
            case "exit": unset($_SESSION); session_destroy(); header("Location: index.php"); break;
        }
    ?>
</body>
</html>