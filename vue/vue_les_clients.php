<h2>Liste des classes</h2>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<table border="1">
    <tr>
        <td> Nom </td>
        <td> Adresse </td>
        <td> Ville </td>
        <td> Code Postal </td>
        <td> Société </td>
        <td> Mail </td>
        <td> Téléphone </td>
        <?php
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesClients as $unClient) {
            echo "<tr>";
            echo "  <td>" . $unClient['nom'] . "</td>
                    <td>" . $unClient['adresse'] . "</td>
                    <td>" . $unClient['ville'] . "</td>
                    <td>" . $unClient['cp'] . "</td>
                    <td>" . $unClient['societe'] . "</td>
                    <td>" . $unClient['mail'] . "</td>
                    <td>" . $unClient['tel'] . "</td>
                ";
            if (isset($_SESSION['username']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=1&action=sup&idC=".$unClient['idC']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=1&action=edit&idC=".$unClient['idC']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>