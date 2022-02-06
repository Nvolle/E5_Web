<?php if ($laFacture!=null) echo " <h3> Modification d'une facture </h3> ";
    else echo " <h3> Ajout d'une facture </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Montant </td>
            <td><input type="text" name="montant" 
            value="<?php if($laFacture!=null) echo $laFacture['montant']; ?>"></td>
        </tr>
        <tr>
            <td> Date </td>
            <td><input type="text" name="dateF" 
            value="<?php if($laFacture!=null) echo $laFacture['dateF']; ?>"></td>
        </tr>
        <tr>
            <td> Id du contrat </td>
            <td><input type="text" name="idCo" 
            value="<?php if($laFacture!=null) echo $laFacture['idCo']; ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td>
                <input type="submit"
                    <?php
                        if ($laFacture!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>