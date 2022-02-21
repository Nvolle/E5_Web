<h3>Liste des locations</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Id du contrat </td>
        <td> Id du matériel </td>
        <td> Quantité </td>
        <td> Nom du matériel </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesLocations as $uneLocation) {
            echo "<tr>";
            echo "  <td>" . $uneLocation['idL'] . "</td>
                    <td>" . $uneLocation['idCo'] . "</td>
                    <td>" . $uneLocation['idM'] . "</td>
                    <td>" . $uneLocation['qtStockM'] . "</td>
                    <td>" . $uneLocation['nomM'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "
                <td>
                    <a href='index.php?page=admin/locations&action=sup&idL=".$uneLocation['idL']."'><img src = 'images/icons/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=admin/locations&action=edit&idL=".$uneLocation['idL']."'><img src = 'images/icons/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>