<form action="" method="post">
    <table>
        <tr>
            <th>Formulaire de contact</th>
        </tr>
        <tr>
            <td><input type="text" name="nom" placeholder="Nom"
            value="<?php if($_SESSION['nom']!=null) echo $_SESSION['nom']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="prenom" placeholder="Prénom"
            value="<?php if($_SESSION['prenom']!=null) echo $_SESSION['prenom']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="message" placeholder="Votre message" value=""></td>
        </tr>
        <tr>
            <td>
                <input type="reset" name="Annuler" value="Annuler">
                <input type="submit" name='Valider' value='Valider'>
            </td>
        </tr>
    </table>
</form>