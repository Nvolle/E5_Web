<h3>Liste des clients</h3>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>
<br>

<table border="1">
    <tr>
        <td> Id</td>
        <td> Nom </td>
        <td> Adresse </td>
        <td> Ville </td>
        <td> Code Postal </td>
        <td> Société </td>
        <td> Mail </td>
        <td> Téléphone </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesClients as $unClient) {
            echo "<tr>";
            echo "  <td>" . $unClient['idC'] . "</td>
                    <td>" . $unClient['nom'] . "</td>
                    <td>" . $unClient['adresse'] . "</td>
                    <td>" . $unClient['ville'] . "</td>
                    <td>" . $unClient['cp'] . "</td>
                    <td>" . $unClient['societe'] . "</td>
                    <td>" . $unClient['mail'] . "</td>
                    <td>" . $unClient['tel'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']!="user") {
                echo "
                <td>
                    <a href='index.php?page=1&action=sup&idC=".$unClient['idC']."'><img src = 'images/icons/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=1&action=edit&idC=".$unClient['idC']."'><img src = 'images/icons/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>
<br>