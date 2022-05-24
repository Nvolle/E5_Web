<h2>Bienvenue sur notre site</h2>
<div style="width: 580px;  padding-top:10px; padding-bottom:10px;border: 3px solid #E7E9FF; text-align: center;background: #F3F4FF;border-radius: 30px;color:black;font-size: 24px;">
    <img src="images\Build.jpg" style="width:80%;height: 80%;border-radius: 15px;">
    <h2>Qui sommes nous ?</h2> 
    La société Roille SA est une société créée en 2000 composée de 48 employés,
    depuis maintenant 22 ans nous sommes spécialisés dans la location de matériel professionel à l'échelle nationale. <br><br>
    Notre siège social est situé au 15 place de la Liberté – 18010 Bourges Cedex
</div>
<?php if (isset ($_SESSION['username'])) :?>
<h3>Découvrez nos produits en location libre</h3>
<p>Cliquez sur l'image du produit qui vous intéresse</p>
<div>
    <a href="index.php?page=products&id=1"><img src="images/products/pelle.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=2"><img src="images/products/marteau.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=3"><img src="images/products/sac de ciment.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=4"><img src="images/products/planches en bois.jpg" height="200" width="200"></a>
</div>
<?php endif ?>