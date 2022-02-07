<link rel="stylesheet" type="text/css" href="style/style.css">
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
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
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
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=6&action=sup&idTM=".$unTypeMat['idTM']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=6&action=edit&idTM=".$unTypeMat['idTM']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>