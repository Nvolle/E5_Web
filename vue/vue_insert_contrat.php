<link rel="stylesheet" type="text/css" href="style/style/style.css">
<?php if ($leContrat!=null) echo " <h3> Modification d'un contrat </h3> ";
    else echo " <h3> Ajout d'un contrat </h3> ";?>

<form action="" method="post">
    <table>
        <tr>
            <td> Date de début </td>
            <td><input type="date" name="datedebut" 
            value="<?php if($leContrat!=null) echo $leContrat['datedebut']; ?>"></td>
        </tr>
        <tr>
            <td> Date de fin </td>
            <td><input type="date" name="datedefin" 
            value="<?php if($leContrat!=null) echo $leContrat['datedefin']; ?>"></td>
        </tr>
        <tr>
            <td> Client </td>
            <td>
                <select name="idC">
                    <?php 
                        foreach ($lesClients as $unClient) {
                            echo "<option value='".$unClient['idC']."'>".$unClient['nom']." / Société : ".$unClient['societe']."</option>";
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
                        if ($leContrat!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>