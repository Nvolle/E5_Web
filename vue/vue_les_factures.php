<link rel="stylesheet" type="text/css" href="style/style/style.css">
<h3>Liste des factures</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id </td>
        <td> Montant </td>
        <td> Date </td>
        <td> Id du contrat </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesFactures as $uneFacture) {
            echo "<tr>";
            echo "  <td>" . $uneFacture['idF'] . "</td>
                    <td>" . $uneFacture['montant'] . " €</td>
                    <td>" . $uneFacture['dateF'] . "</td>
                    <td>" . $uneFacture['idCo'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=3&action=sup&idF=".$uneFacture['idF']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=3&action=edit&idF=".$uneFacture['idF']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>