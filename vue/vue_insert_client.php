<link rel="stylesheet" type="text/css" href="style/style/style.css">
<?php if ($leClient!=null) echo " <h3> Modification d'un client </h3> ";
    else echo " <h3> Ajout d'un client </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Nom </td>
            <td><input type="text" name="nom" 
            value="<?php if($leClient!=null) echo $leClient['nom']; ?>"></td>
        </tr>
        <tr>
            <td> Adresse </td>
            <td><input type="text" name="adresse" 
            value="<?php if($leClient!=null) echo $leClient['adresse']; ?>"></td>
        </tr>
        <tr>
            <td> Ville </td>
            <td><input type="text" name="ville" 
            value="<?php if($leClient!=null) echo $leClient['ville']; ?>"></td>
        </tr>
        <tr>
            <td> Code postal</td>
            <td><input type="text" name="cp" 
            value="<?php if($leClient!=null) echo $leClient['cp']; ?>"></td>
        </tr>
        <tr>
            <td> Société </td>
            <td><input type="text" name="societe" 
            value="<?php if($leClient!=null) echo $leClient['societe']; ?>"></td>
        </tr>
        <tr>
            <td> Mail</td>
            <td><input type="text" name="mail" 
            value="<?php if($leClient!=null) echo $leClient['mail']; ?>"></td>
        </tr>
        <tr>
            <td> Téléphone </td>
            <td><input type="text" name="tel" 
            value="<?php if($leClient!=null) echo $leClient['tel']; ?>"></td>
        </tr>
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