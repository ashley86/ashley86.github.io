<?php
    require 'layout/top.php';
?>
<h2>Abonnés</h2>

<p><a href="<?=ABS_PATH ?>abonne-edit.php">Ajouter un abonné</a></p>

<div>
Filtrer :
    <ul style="display: inline-block; padding: 0;">
    <?php
        $alphabet = range('a','z');
        foreach( $alphabet as $letter )
        {
            echo '<li style="display: inline-block; margin-right: 5px;"><a href="' . ABS_PATH . 'abonne.php?filter=' . $letter . '">' . strtoupper($letter) . '</a></li>';
        }

    ?>
    </ul>
</div>
<div>
    <form action="<?=ABS_PATH ?>abonne.php" method="get">
        <label for="search">Recherche par nom :</label>
        <input type="text" name="search" id="search" />
        <button type="submit">Rechercher</button>
    </form>
</div>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th></th>
    </tr>
    <?php
        foreach( $abonnes as $abonne )
        {
            ?>
            <tr>
                <td><?= $abonne->getId() ?></td>
                <td><?= $abonne->getPrenom() ?></td>
                <td><?= $abonne->getNom() ?></td>
                <td><a href="<?=ABS_PATH ?>abonne-edit.php?id=<?=$abonne->getId() ?>">Modifier</a></td>
            </tr>
            <?php
        }
    ?>
</table>

<?php
    require 'layout/bottom.php';
?>