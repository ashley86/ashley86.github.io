<?php
    // On récupère tous les films dans la BDD
    $movies = get_movies();
?>

<table>
    <tr>
        <th>Titre</th>
        <th>Réalisateur</th>
        <th>Année</th>
        <th></th>
    </tr>
<?php
foreach( $movies as $movie_id => $movie)
{
    echo '<tr>';
    echo '    <td>' . $movie['movie_title'] . '</td>';
    echo '    <td>' . $movie['movie_director'] . '</td>';
    echo '    <td>' . $movie['movie_year_of_prod'] . '</td>';
    echo '    <td><a href="index.php?p=movies&a=details&id=' . $movie_id . '">Voir les détails</a></td>';
    echo '</tr>';
}
?>
</table>
