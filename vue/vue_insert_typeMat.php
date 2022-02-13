<?php if ($leTypeMat!=null) echo " <h3> Modification d'un type de matériel </h3> ";
    else echo " <h3> Ajout d'un type de matériel </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Désignation </td>
            <td><input type="text" name="designation" 
            value="<?php if($leTypeMat!=null) echo $leTypeMat['designation']; ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td>
                <input type="submit"
                    <?php
                        if ($leTypeMat!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>