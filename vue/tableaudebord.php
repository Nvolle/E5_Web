<?php
    $unControleur->setTable("classe");
    $nbClasses = $unControleur->count();

    $unControleur->setTable("etudiant");
    $nbEtudiant = $unControleur->count();
    
    $unControleur->setTable("professeur");
    $nbProfesseur = $unControleur->count();
    
    $unControleur->setTable("enseignement");
    $nbEnseignement = $unControleur->count();
?>

<table border="1">
    <tr>
        <td>NB Classes</td>
        <td>NB Professeurs</td>
        <td>NB Etudiants</td>
        <td>NB Enseignements</td>
    </tr>
    <tr>
        <td><?=$nbClasses['nb']?></td>
        <td><?=$nbProfesseur['nb']?></td>
        <td><?=$nbEtudiant['nb']?></td>
        <td><?=$nbEnseignement['nb']?></td>
    </tr>
</table>