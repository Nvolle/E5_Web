<h2> Insertion d'un enseignement </h2>

<form action="" method="post">
    <table>
        <tr>
            <td> Matière </td>
            <td><input type="text" name="matiere"></td>
        </tr>
        <tr>
            <td> Nombre d'heures de l'enseignement </td>
            <td><input type="text" name="nbheures"></td>
        </tr>
        <tr>
            <td> Coefficient de la matière </td>
            <td><input type="text" name="coef"></td>
        </tr>
        <tr>
            <td> Professeur </td>
            <td>
                <select name="idprofesseur">
                    <?php
                        foreach ($lesProfesseurs as $unProfesseur) {
                            echo "<option value='".$unProfesseur['idprofesseur']."'>".$unProfesseur['nom']."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Classe </td>
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