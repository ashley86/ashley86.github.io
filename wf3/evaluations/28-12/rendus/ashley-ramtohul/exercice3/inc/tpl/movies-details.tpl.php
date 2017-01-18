<?php



    $movie = get_movies( $movie_id );

    if( count( $movie ) === 0 )
    {
        echo 'Le film demandé est introuvable... <a href="index.php?p=movies">Retourner à la liste</a>';
    }

?>

<h1>Détails du film : <?php echo $movie['movie_title']; ?></h1>
<?php
    foreach( $movie as $type => $detail )
    {
        echo $type . ' : ' . $detail . '<br />';
    }
?>
