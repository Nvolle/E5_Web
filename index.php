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
        <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>
    <body>
        <h1>Besoin de matériels ? Roille SA est là pour vous accompagner !</h1>
        <center>
            <div class="main">
                <?php
                    
                    if (isset($_SESSION['username'])) {
                        echo '
                            <div>
                                <a href="index.php?page=home"><img src="images/icons/home.png" height="50" width="50"></a>
                                <a href="index.php?page=admin"><img src="images/icons/admin.png" height="50" width="50"></a>
                                <a href="index.php?page=exit"><img src="images/icons/deconnexion.png" height="50" width="50"></a><br/>
                            </div>
                        ';
                    }
                    if(isset($_GET['page'])) $page = $_GET['page'];
                    else $page = "home";
                    switch ($page) {
                        case "home": require_once ("home.php"); break;
                        case "exit": unset($_SESSION); session_destroy(); header("Location: index.php"); break;
                        case "contact": require_once ("vue/contact.php"); break;
                        //products
                        case "products" : require_once ("gestion_produits.php"); break;
                        //admin
                        case "admin":
                            require_once ("vue/administration.php");
                            if (isset($_GET['tab'])){
                                switch ($_GET['tab']) {
                                    case "clients": 
                                        require_once ("gestion_clients.php");
                                        break;
                                    case "contrats": 
                                        require_once ("gestion_contrats.php"); 
                                        break;
                                    case "factures": 
                                        require_once ("gestion_factures.php"); 
                                        break;
                                    case "locations": 
                                        require_once ("gestion_locations.php"); 
                                        break;
                                    case "materiels": 
                                        require_once ("gestion_materiels.php"); 
                                        break;
                                    case "typeMats": 
                                        require_once ("gestion_typeMats.php"); 
                                        break;
                                }
                            }
                            break;
                        
                    }
                    if (isset($_POST['SInscrire'])) {
                        $unControleur->setTable("client");
                        $leClient = null;
                        require_once("vue/vue_insert_client.php");
                    }
                    elseif (!isset($_SESSION['username'])) {
                        require_once("vue/vue_connexion.html");
                    }
                    if (isset($_POST['SeConnecter'])) {
                        $username = $_POST['username'];
                        $mdp = $_POST['mdp'];
                        $unControleur->setTable("client");
                        $where = array("username"=>$username, "mdp"=>$mdp);
                        $unUser = $unControleur->selectWhere($where);
                        if (isset($unUser['username'])) {
                            $_SESSION['idC'] = $unUser['idC'];
                            $_SESSION['username'] = $unUser['username'];
                            $_SESSION['nom'] = $unUser['nom'];
                            $_SESSION['prenom'] = $unUser['prenom'];
                            $_SESSION['role'] = $unUser['role'];
                            $_SESSION['societe'] = $unUser['societe'];
                            header("Location: index.php?page=home");
                        } else {
                            echo "<br/> <p>Erreur d'identifiants</p>";
                        }
                    }
                ?>
            </div>
            <footer>
                <div>
                    <h3>A propos</h3>
                    Le site de location de la société Roille SA est géré par la société Null. <br/>
                    Nous restons joignables <a href="index.php?page=contact">ici</a> ou par <a href="mailto:null@news.nll">mail</a>.
                </div>
            </footer>
        </center>
    </body>
</html>