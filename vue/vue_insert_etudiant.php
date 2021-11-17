<h2> Insertion d'un étudiant </h2>

<form action="" method="post">
    <table>
        <tr>
            <td> Nom de l'étudiant</td>
            <td><input type="text" name="nom"></td>
        </tr>
        <tr>
            <td> Prénom de l'étudiant </td>
            <td><input type="text" name="prenom"></td>
        </tr>
        <tr>
            <td> Email </td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td> Téléphone </td>
            <td><input type="text" name="tel"></td>
        </tr>
        <tr>
            <td> Adresse </td>
            <td><input type="text" name="adresse"></td>
        </tr>
        <tr>
            <td> Classe de l'étudiant </td>
            <td>
                <select name="idclasse">
                    <?php
                        foreach ($lesClasses as $uneClasse) {
                            echo "<option value='".$uneClasse['idclasse']."'>".$uneClasse['nom']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" name="Valider" value="Valider"></td>
        </tr>
    </table>
</form>