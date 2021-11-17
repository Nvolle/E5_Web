<h2>Liste des classes</h2>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<table border="1">
    <tr>
        <td> ID Classe </td>
        <td> Nom de la classe </td>
        <td> Salle de cours </td>
        <td> Diplôme préparé </td>
        <?php
            if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesClasses as $uneClasse) {
            echo "<tr>";
            echo "  <td>" . $uneClasse['idclasse'] . "</td>
                    <td>" . $uneClasse['nom'] . "</td>
                    <td>" . $uneClasse['salle'] . "</td>
                    <td>" . $uneClasse['diplome'] . "</td>";
            if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=1&action=sup&idclasse=".$uneClasse['idclasse']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=1&action=edit&idclasse=".$uneClasse['idclasse']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>