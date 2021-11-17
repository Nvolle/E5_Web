<h2>Liste des professeurs</h2>

<form method="post" action="">
    Mot de recherche : <input type="text" name="mot">
    <input type="submit" name="Rechercher" value="Rechercher">
</form>

<table border="1">
    <tr>
        <td> ID Professeur </td>
        <td> Nom </td>
        <td> Prénom </td>
        <td> Email </td>
        <td> Téléphone </td>
        <td> Opérations </td>
    </tr>
    <?php
        foreach ($lesProfesseurs as $unProfesseur) {
            echo "<tr>";
            echo "  <td>" . $unProfesseur['idprofesseur'] . "</td>
                    <td>" . $unProfesseur['nom'] . "</td>
                    <td>" . $unProfesseur['prenom'] . "</td>
                    <td>" . $unProfesseur['email'] . "</td>
                    <td>" . $unProfesseur['tel'] . "</td>";
            echo "
            <td>
                <a href='index.php?page=2&action=sup&idprofesseur=".$unProfesseur['idprofesseur']."'><img src = 'images/sup.png' height='40' width='40'></a>
                <a href='index.php?page=2&action=edit&idprofesseur=".$unProfesseur['idprofesseur']."'><img src = 'images/edit.png' height='40' width='40'></a>
            </td>
            ";
            echo "</tr>";
        }
    ?>
</table>