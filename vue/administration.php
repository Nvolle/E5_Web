<div>
    <ul class="menu">
        <?php if ($_SESSION['role']!="user") echo '<li> <a href="index.php?page=1">Gestion des clients</a> </li>'?>
        <li>
            <a href="index.php?page=2">Gestion des contrats</a>
        </li>
        <li>
            <a href="index.php?page=3">Gestion des factures</a>
        </li>
            <li>
            <a href="index.php?page=4">Gestion des locations</a>
        </li>
        <li>
            <a href="index.php?page=5">Gestion des materiels</a>
        </li>
        <li>
            <a href="index.php?page=6">Gestion des types de matériels</a>
        </li>
    </ul>
</div>
<?php 
    require_once("vue/tableaudebord.php");
?>