<h2> Insertion d'une classe </h2>

<form action="" method="post">
    <table>
        <tr>
            <td> Nom de la classe</td>
            <td><input type="text" name="nom" 
            value="<?php if($laClasse!=null) echo $laClasse['nom']; ?>"></td>
        </tr>
        <tr>
            <td> Salle de cours </td>
            <td><input type="text" name="salle" 
            value="<?php if($laClasse!=null) echo $laClasse['salle']; ?>"></td>
        </tr>
        <tr>
            <td> Diplôme préparé </td>
            <td><input type="text" name="diplome"
            value="<?php if($laClasse!=null) echo $laClasse['diplome']; ?>"></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td>
                <input type="submit"
                    <?php
                        if ($laClasse!=null) echo " name ='Modifier' value='Modifier'";
                        else echo " name='Valider' value='Valider'";
                    ?>
                >
            </td>
        </tr>
    </table>
</form>