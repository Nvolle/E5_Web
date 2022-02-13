<h3>Liste des contrats</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
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
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesContrats as $unContrat) {
            echo "<tr>";
            echo "  <td>" . $unContrat['idCo'] . "</td>
                    <td>" . $unContrat['datedebut'] . "</td>
                    <td>" . $unContrat['datedefin'] . "</td>
                    <td>" . $unContrat['idC'] . "</td>
                    <td>" . $unContrat['nom'] . "</td>
                    <td>" . $unContrat['societe'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "
                <td>
                    <a href='index.php?page=2&action=sup&idCo=".$unContrat['idCo']."'><img src = 'images/icons/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=2&action=edit&idCo=".$unContrat['idCo']."'><img src = 'images/icons/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>