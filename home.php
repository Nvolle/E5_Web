<h2>Bienvenue sur notre site</h2>
<?php if (isset ($_SESSION['username'])) :?>
<h3>Découvrez nos produits en location libre</h3>
<div>
    <a href="index.php?page=products&id=1"><img src="images/products/pelle.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=2"><img src="images/products/marteau.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=3"><img src="images/products/sac de ciment.jpg" height="200" width="200"></a>
    <a href="index.php?page=products&id=4"><img src="images/products/planches en bois.jpg" height="200" width="200"></a>
</div>
<?php endif ?>