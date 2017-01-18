<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;
?>
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="index.php?p=movies">Films</a>
            <ul>
                <li><a href="index.php?p=movies">Lister</a></li>
                <li><a href="index.php?p=movies&a=add">Ajouter</a></li>
            </ul>
        </li>
    </ul>
</div>