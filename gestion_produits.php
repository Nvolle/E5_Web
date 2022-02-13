<?php 
    $unControleur->setTable("materiel");
    $where = array("nomM"=>$page);
    $lesProduits = $unControleur->selectWhere($where);
?>
<img src="images\products\<?php echo $page ?>.jpg" height="400" width="400" alt="<?php echo $page ?>">
<div>
    <?php 
        echo '
            <h2>'.$lesProduits['nomM'].'</h2>
            <h3>Prix : '.$lesProduits['prixM'].'€</h3>
            <h3>Quantité disponible : '.$lesProduits['qtStockM'].'</h3>
        ';
    ?>
</div>