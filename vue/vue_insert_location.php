<link rel="stylesheet" type="text/css" href="style/style/style.css">
<?php if ($laLocation!=null) echo " <h3> Modification d'une location </h3> ";
    else echo " <h3> Ajout d'une location </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Id du contrat </td>
            <td>
                <select name="idCo">
                    <?php
                        foreach ($lesContrats as $unContrat) {
                            echo "<option value='".$unContrat['idCo']."'>".$unContrat['idCo']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Id du matériel </td>
            <td>
                <select name="idM">
                    <?php
                        foreach ($lesMateriels as $unMateriel) {
                            echo "<option value='".$unMateriel['idM']."'>".$unMateriel['nomM']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td>
                <input type="submit"
                    <?php
                        if ($laLocation!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>