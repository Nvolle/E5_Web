<?php if ($laFacture!=null) echo " <h3> Modification d'une facture </h3> ";
    else echo " <h3> Ajout d'une facture </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Montant HT (en €) </td>
            <td><input type="text" name="montantHT" 
            value="<?php if($laFacture!=null) echo $laFacture['montantHT']; ?>"></td>
        </tr>
        <tr>
            <td> Date </td>
            <td><input type="date" name="dateF" 
            value="<?php if($laFacture!=null) echo $laFacture['dateF']; ?>"></td>
        </tr>
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