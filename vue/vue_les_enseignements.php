<h2>Liste des enseignements</h2>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<table border="1">
    <tr>
        <td> ID Enseignement </td>
        <td> Matière </td>
        <td> Nombre d'heures </td>
        <td> Coefficient </td>
        <td> ID de la classe </td>
        <td> Nom classe </td>
        <td> ID Professeur</td>
        <td> Nom professeur </td>
        <td> Prénom professeur </td>
        <?php
            if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {
                echo "<td> Opérations </td>";
            }
        ?>
    </tr>
    <?php
        foreach ($lesEnseignements as $unEnseignement) {
            echo "<tr>";
            echo "  <td>" . $unEnseignement['idenseignement'] . "</td>
                    <td>" . $unEnseignement['matiere'] . "</td>
                    <td>" . $unEnseignement['nbheures'] . "</td>
                    <td>" . $unEnseignement['coef'] . "</td>
                    <td>" . $unEnseignement['idclasse'] . "</td>
                    <td>" . $unEnseignement['classe'] . "</td>
                    <td>" . $unEnseignement['idprofesseur'] . "</td>
                    <td>" . $unEnseignement['nom_professeur'] . "</td>
                    <td>" . $unEnseignement['prenom_professeur'] . "</td>";
            if (isset($_SESSION['email']) && $_SESSION['role']=="admin") {
                echo "
                <td>
                    <a href='index.php?page=4&action=sup&idenseignement=".$unEnseignement['idenseignement']."'><img src = 'images/sup.png' height='40' width='40'></a>
                    <a href='index.php?page=4&action=edit&idenseignement=".$unEnseignement['idenseignement']."'><img src = 'images/edit.png' height='40' width='40'></a>
                </td>
                ";
            }
            echo "</tr>";
        }
    ?>
</table>