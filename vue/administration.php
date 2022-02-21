<div>
    <ul class="menu">
        <?php if ($_SESSION['role']!="user") echo '<li> <a href="index.php?page=admin&tab=clients">Gestion des clients</a> </li>'?>
        <li>
            <a href="index.php?page=admin&tab=contrats">Gestion des contrats</a>
        </li>
        <li>
            <a href="index.php?page=admin&tab=factures">Gestion des factures</a>
        </li>
            <li>
            <a href="index.php?page=admin&tab=locations">Gestion des locations</a>
        </li>
        <li>
            <a href="index.php?page=admin&tab=materiels">Gestion des materiels</a>
        </li>
        <li>
            <a href="index.php?page=admin&tab=typeMats">Gestion des types de matériels</a>
        </li>
    </ul>
</div>
<?php 
    require_once("vue/tableaudebord.php");
?>