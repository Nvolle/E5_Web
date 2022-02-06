<?php if ($leMateriel!=null) echo " <h3> Modification d'un matériel </h3> ";
    else echo " <h3> Ajout d'un matériel </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Quantité </td>
            <td><input type="text" name="qtM" 
            value="<?php if($leMateriel!=null) echo $leMateriel['qtM']; ?>"></td>
        </tr>
        <tr>
            <td> Nom </td>
            <td><input type="text" name="nomM" 
            value="<?php if($leMateriel!=null) echo $leMateriel['nomM']; ?>"></td>
        </tr>
        <tr>
            <td> Type de matériel </td>
            <td>
                <select name="idTM">
                    <?php 
                        foreach ($lesTypeMats as $unTypeMat) {
                            echo "<option value='".$unTypeMat['idTM']."'>".$unTypeMat['designation']."</option>";
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
                        if ($leMateriel!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>