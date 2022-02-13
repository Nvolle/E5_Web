<h3>Liste des factures</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Montant HT </td>
        <td> TVA </td>
        <td> Montant TTC </td>
        <td> Date </td>
        <td> Id du contrat </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesFactures as $uneFacture) {
            echo "<tr>";
            echo "  <td>" . $uneFacture['idF'] . "</td>
                    <td>" . $uneFacture['montantHT'] . " €</td>
                    <td>" . $uneFacture['TVA'] . " €</td>
                    <td>" . $uneFacture['montantTTC'] . " €</td>
                    <td>" . $uneFacture['dateF'] . "</td>
                    <td>" . $uneFacture['idCo'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "
                <td>
                    <a href='index.php?page=3&action=sup&idF=".$uneFacture['idF']."'><img src = 'images/icons/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=3&action=edit&idF=".$uneFacture['idF']."'><img src = 'images/icons/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>