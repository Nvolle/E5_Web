<h2>Liste des étudiants</h2>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<table border="1">
    <tr>
        <td> ID Etudiant </td>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Email </td>
        <td> Téléphone </td>
        <td> Adresse </td>
        <td> ID Classe </td>
        <td> Nom classe </td>
        <td> Opérations </td>
    </tr>
    <?php
        foreach ($lesEtudiants as $unEtudiant) {
            echo "<tr>";
            echo "  <td>" . $unEtudiant['idetudiant'] . "</td>
                    <td>" . $unEtudiant['nom'] . "</td>
                    <td>" . $unEtudiant['prenom'] . "</td>
                    <td>" . $unEtudiant['email'] . "</td>
                    <td>" . $unEtudiant['tel'] . "</td>
                    <td>" . $unEtudiant['adresse'] . "</td>
                    <td>" . $unEtudiant['idclasse'] . "</td>
                    <td>" . $unEtudiant['classe'] . "</td>";
            echo "
            <td>
                <a href='index.php?page=3&action=sup&idetudiant=".$unEtudiant['idetudiant']."'><img src = 'images/sup.png' height='40' width='40'></a>
                <a href='index.php?page=3&action=edit&idetudiant=".$unEtudiant['idetudiant']."'><img src = 'images/edit.png' height='40' width='40'></a>
            </td>
            ";
            echo "</tr>";
        }
    ?>
</table>