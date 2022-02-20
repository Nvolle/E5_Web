<?php
    $unControleur->setTable("client");
    $nbClient = $unControleur->count();

    $unControleur->setTable("contrat");
    $nbContrat = $unControleur->count();
    
    $unControleur->setTable("facture");
    $nbFacture = $unControleur->count();
    
    $unControleur->setTable("location");
    $nbLocation = $unControleur->count();

    $unControleur->setTable("materiel");
    $nbMateriel = $unControleur->count();

    $unControleur->setTable("typeMat");
    $nbTypeMat = $unControleur->count();
    ?>


<table border="1">
    <tr>
        <th colspan="6" scope="col">Tableau de bord</td>
    </tr>
    <?php if (isset($_SESSION['username']) && $_SESSION['role']=="superadmin") {
        echo '
            <tr>
                <td>Nombre de Clients</td>
                <td>Nombre de Contrats</td>
                <td>Nombre de Factures</td>
                <td>Nombre de Locations</td>
                <td>Nombre de Matériels</td>
                <td>Types de Matériaux</td>
            </tr>
            <tr>
                <td>'.$nbClient['nb'].'</td>
                <td>'.$nbContrat['nb'].'</td>
                <td>'.$nbFacture['nb'].'</td>
                <td>'.$nbLocation['nb'].'</td>
                <td>'.$nbMateriel['nb'].'</td>
                <td>'.$nbTypeMat['nb'].'</td>
            </tr>
        ';
    } else {
        echo '
            <tr>
                <td>Locations en cours</td>
            </tr>
            <tr>
                <td>'.$nbContrat['nb'].'</td>
            </tr>
        ';        
    }
    ?>
</table>