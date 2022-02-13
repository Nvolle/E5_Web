<?php if (isset($_POST['SInscrire'])) echo "<h3> Création d'un compte utilisateur </h3>";
    else if($leClient!=null) echo " <h3> Modification d'un client </h3> ";
    else echo " <h3> Ajout d'un client </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td><input type="text" name="nom" placeholder="Nom"
            value="<?php if($leClient!=null) echo $leClient['nom']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="prenom" placeholder="Prénom"
            value="<?php if($leClient!=null) echo $leClient['prenom']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="adresse" placeholder="Adresse"
            value="<?php if($leClient!=null) echo $leClient['adresse']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="ville" placeholder="Ville"
            value="<?php if($leClient!=null) echo $leClient['ville']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="cp" placeholder="Code postal"
            value="<?php if($leClient!=null) echo $leClient['cp']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="societe" placeholder="Société"
            value="<?php if($leClient!=null) echo $leClient['societe']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="mail" placeholder="Mail"
            value="<?php if($leClient!=null) echo $leClient['mail']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="tel" placeholder="Téléphone"
            value="<?php if($leClient!=null) echo $leClient['tel']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="username" placeholder="Nom d'utilisateur"
            value="<?php if($leClient!=null) echo $leClient['username']; ?>"></td>
        </tr>
        <tr>
            <td><input type="password" name="mdp" placeholder="Mot de passe"
            value="<?php if($leClient!=null) echo $leClient['mdp']; ?>"></td>
        </tr>
        <?php if (isset($_SESSION['role']) && $_SESSION['role']=='superadmin') {
            echo '
            <tr>
                <td>
                    <select name="role">
                        <option value="user">Utilisateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </td>
            </tr>
            ';
        } else {
            $_POST['role'] = "user";
        }
        ?>

        <tr>
            <td>
                <input type="reset" name="Annuler" value="Annuler">
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