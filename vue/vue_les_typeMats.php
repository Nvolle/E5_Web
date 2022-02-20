<h3>Liste des types de matériels</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Désignation </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesTypeMats as $unTypeMat) {
            echo "<tr>";
            echo "  <td>" . $unTypeMat['idTM'] . "</td>
                    <td>" . $unTypeMat['designation'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "
                <td>
                    <a href='index.php?page=admin&tab=typeMats&action=sup&idTM=".$unTypeMat['idTM']."'><img src = 'images/icons/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=admin&tab=typeMats&action=edit&idTM=".$unTypeMat['idTM']."'><img src = 'images/icons/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>