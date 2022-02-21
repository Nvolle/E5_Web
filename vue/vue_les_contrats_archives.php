<h3>Liste des contrats archivés</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="RechercherA" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Date de début </td>
        <td> Date de fin </td>
        <td> Id du client </td>
        <td> Nom du client </td>
        <td> Société du client </td>
    </tr>
    <?php
    if (!$lesContratsArchives) {
        echo "<tr>
                    <td colspan=6>Aucun contrat archivé</td>
            </tr>";
    } else {
        foreach ($lesContratsArchives as $unContratArchive) {
            echo "<tr>
                    <td>" . $unContratArchive['idCo'] . "</td>
                    <td>" . $unContratArchive['datedebut'] . "</td>
                    <td>" . $unContratArchive['datedefin'] . "</td>
                    <td>" . $unContratArchive['idC'] . "</td>
                    <td>" . $unContratArchive['nom'] . "</td>
                    <td>" . $unContratArchive['societe'] . "</td>
                </tr>";
        }
    }
    ?>
</table>
<br>