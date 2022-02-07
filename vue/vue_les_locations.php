<link rel="stylesheet" type="text/css" href="style/style.css">
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
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
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
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=4&action=sup&idL=".$uneLocation['idL']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=4&action=edit&idL=".$uneLocation['idL']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>