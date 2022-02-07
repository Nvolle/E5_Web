<link rel="stylesheet" type="text/css" href="style/style.css">
<h3>Liste des matériels</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Quantité </td>
        <td> Nom </td>
        <td> Type de matériel </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesMateriels as $unMateriel) {
            echo "<tr>";
            echo "  <td>" . $unMateriel['idM'] . "</td>
                    <td>" . $unMateriel['qtM'] . "</td>
                    <td>" . $unMateriel['nomM'] . "</td>
                    <td>" . $unMateriel['designation'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=5&action=sup&idM=".$unMateriel['idM']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=5&action=edit&idM=".$unMateriel['idM']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>