<img src="images\products\<?php echo $lesProduits['nomM'] ?>.jpg" height="400" width="400" alt="<?php echo $page ?>">
<div>
    <h2><?php echo $lesProduits['nomM'] ?></h2>
    <h3>Prix : <?php echo $lesProduits['prixM'] ?> €</h3>
    <h3>Quantité disponible : <?php echo $lesProduits['qtStockM'] ?></h3>
    <br/>
</div>
<form action="" method="POST">
    <table>
        <tr>
            <th scope="col">Passer une réservation : </th>
        </tr>
        <tr>
            <td> Quantité souhaitée 
                <select name="qtM">
                    <?php 
                        for($i = 1; $i <= $lesProduits['qtStockM']; $i++) {
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                    ?>
                </select>
                <input type="submit" name="Reserver" value="Réserver">
            </td>
        </tr>
    </table>
</form>