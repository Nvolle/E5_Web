<link rel="stylesheet" type="text/css" href="style/style.css">
<?php if (isset($_POST['SInscrire'])) echo "<h3> Création d'un compte utilisateur </h3>";
    else if($leClient!=null) echo " <h3> Modification d'un client </h3> ";
    else echo " <h3> Ajout d'un client </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Nom </td>
            <td><input type="text" name="nom" placeholder="MonNom"
            value="<?php if($leClient!=null) echo $leClient['nom']; ?>"></td>
        </tr>
        <tr>
            <td> Prénom </td>
            <td><input type="text" name="prenom" placeholder="MonPrénom"
            value="<?php if($leClient!=null) echo $leClient['prenom']; ?>"></td>
        </tr>
        <tr>
            <td> Adresse </td>
            <td><input type="text" name="adresse" placeholder="0 rue de la ville"
            value="<?php if($leClient!=null) echo $leClient['adresse']; ?>"></td>
        </tr>
        <tr>
            <td> Ville </td>
            <td><input type="text" name="ville" placeholder="MaVille"
            value="<?php if($leClient!=null) echo $leClient['ville']; ?>"></td>
        </tr>
        <tr>
            <td> Code postal</td>
            <td><input type="text" name="cp" placeholder="00000"
            value="<?php if($leClient!=null) echo $leClient['cp']; ?>"></td>
        </tr>
        <tr>
            <td> Société </td>
            <td><input type="text" name="societe" placeholder="MaSociété"
            value="<?php if($leClient!=null) echo $leClient['societe']; ?>"></td>
        </tr>
        <tr>
            <td> Mail</td>
            <td><input type="text" name="mail" placeholder="mail@mail.mail"
            value="<?php if($leClient!=null) echo $leClient['mail']; ?>"></td>
        </tr>
        <tr>
            <td> Téléphone </td>
            <td><input type="text" name="tel" placeholder="0XXXXXXXXX"
            value="<?php if($leClient!=null) echo $leClient['tel']; ?>"></td>
        </tr>
        <tr>
            <td> Nom d'utilisateur </td>
            <td><input type="text" name="username" placeholder="MonUsername"
            value="<?php if($leClient!=null) echo $leClient['username']; ?>"></td>
        </tr>
        <tr>
            <td> Mot de passe </td>
            <td><input type="password" name="mdp" placeholder="MonMotDePasse"
            value="<?php if($leClient!=null) echo $leClient['mdp']; ?>"></td>
        </tr>
        <?php if (isset($_SESSION['role'])) {
            if($_SESSION['role']!='user') {
                echo '
                    <tr>
                        <td> Rôle </td>
                        <td><input type="text" name="rol" placeholder="MonRole"
                        value="<?php if($leClient!=null) echo $leClient[\'role\']; ?>"></td>
                    </tr>
                ';
            }
        }
        ?>

        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td>
                <input type="submit"
                    <?php
                        if ($leClient!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>