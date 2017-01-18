<?php
    session_start();

    // Init affichage form
    $placeholder = "Initialisation du mot à trouver";
    if (!empty($_GET['hide'])) {
        $typeMot = 'password';
    }

    // Efface le mot enregistré
    if( ! empty($_GET['del']) )
    {
        unset($_SESSION['mot']);
        unset($_SESSION['essai']);
        unset($_SESSION['insert']);
        unset($_SESSION['win']);
    }

    if( empty( $_SESSION['mot'] ) )
    {
        // Lance le jeu
        if( ! empty( $_POST['mot'] ) )
        {
            $mot = str_split( $_POST['mot'] );
            $is_valid_word = true;

            foreach( $mot as $lettre ){
                if( ! ctype_alpha( $lettre ) )
                {
                    $is_valid_word = false;
                    break;
                }
            }

            if( $is_valid_word ) {
                $_SESSION['win'] = false;
                $_SESSION['mot'] = strtoupper($_POST['mot']);
                $first_lettre = str_split( $_SESSION['mot'] )[0];
                $_SESSION['insert'] = [$first_lettre];
                $_SESSION['essai'] = 10;
                $placeholder = "Insérez UNE lettre";
                $typeMot = 'text';
            } else {
                echo "<p><strong>Merci de n'insérer que des lettres, sans tiret non plus...</strong></p>";
            }
        }
    } else {
        $placeholder = "Insérez UNE lettre";
        $typeMot = 'text';

        // KÉKONFÉ
        // Si la session est lancée
        if( isset( $_SESSION['essai'] ) && $_SESSION['essai'] > 0 )
        {
            // Si on a envoyé une lettre
            if( ! empty( $_POST['mot'] ) )
            {
                // On vérifie qu'on envoie une seule lettre
                if(strlen($_POST['mot']) > 1 )
                {
                    echo "<p><strong>Merci de n'insérer qu'un seul caractère à la fois !!!</strong></p>";
                }
                elseif( is_numeric( $_POST['mot'] ) )
                {
                    echo "<p><strong>Merci de n'utiliser que des lettres !!!</strong></p>";
                }
                else
                {
                    // On vérifie si le caractère inséré se trouve dans la chaîne de caractère
                    $mot = str_split( $_SESSION['mot'] );

                    if( ! in_array( strtoupper( $_POST['mot'] ), $_SESSION['insert'] ) ) {
                        $_SESSION['insert'][] = strtoupper( $_POST['mot'] );

                        if( ! in_array( strtoupper( $_POST['mot'] ), str_split( $_SESSION['mot'] ) ) )
                        {
                            // On retire un essai
                            $_SESSION['essai'] = $_SESSION['essai'] - 1;

                            if( $_SESSION['essai'] <= 0 )
                            {
                                echo '<p><strong>perdu</strong></p> ! :( <br /><br /> Le mot à trouver, était : <strong>' . $_SESSION['mot'] . '</strong>';
                            }
                        }
                    } else {
                        echo '<p>Cette lettre a déjà été utilisé !</p>';
                    }

//                    d($mot);
                }
            }
        } else {
            echo '<p><strong>PERDU  !!!</strong> :( <br /><br /> Le mot à trouver, était : <strong>' . $_SESSION['mot'] . '</strong></p>';
        }
    }

//    d($_SESSION);

    function d($msg, $exit = false)
    {
        echo '<pre>';
        var_dump($msg);
        echo '</pre>';
        if( $exit ) exit;
    }
?>


<?php

if( ! empty( $_SESSION['mot'] ) ) {
    $lettres_affichees = 0;

    echo '<div class="resultat">';
    foreach (str_split($_SESSION['mot']) as $lettre) {
        if(in_array($lettre, $_SESSION['insert'])) {
            $show_lettre = strtoupper($lettre);
            $lettres_affichees++;
        } else {
            $show_lettre = '';
        }
        echo '<input type="text" disabled value="' . $show_lettre . '" />';

        if( strlen($_SESSION['mot']) == $lettres_affichees )
        {
            $_SESSION['win'] = true;
        }
    }
    echo '</div>';

    if( $_SESSION['win'] === true )
    {
        echo '<p><strong>FELICITATIONS !!! VOUS AVEZ GAGNÉ !!!</strong></p>';
    }
}
?>

<form action="pendu.php" method="post">
<?php
    if(isset($_SESSION['essai'])) {
        echo "<p>Il vous reste <strong>" . $_SESSION['essai'] . "</strong> chances !</p>";
    }

    if( ! empty( $_SESSION['insert'] ) )
    {
        echo '<p>Lettre(s) déjà utilisées : ';
        foreach( $_SESSION['insert'] as $lettre ){
            echo "<strong>",strtoupper($lettre), '</strong>,';
        }
        echo '</p>';
    }
?>

    <input type="<?=$typeMot ?>" name="mot" autocomplete="off" placeholder="<?=$placeholder ?>" />
    <?php
        if( empty( $_SESSION['mot'] ) ) {
            if (empty($_GET['hide'])) { ?>
                <a href="pendu.php?hide=1">Cacher le contenu</a>
            <?php } else { ?>
                <a href="pendu.php">Afficher le contenu</a>
                <?php
            }
        }
    ?>
    <br /><br />
    <input type="submit" value="Envoyer" />
</form>
<a href="pendu.php?del=1">Recommencer</a>


<style type="text/css">
    * {
        box-sizing: border-box;
    }

    .resultat {
        width: 500px;
        margin: 30px auto;
    }

    input[disabled]{
        border:none;
        border-bottom: 1px solid #000;
        margin: 0 2px;
        width: 30px;
        height: 30px;
        line-height: 30;
        text-align: center;
        font-weight: bold;
    }
</style>