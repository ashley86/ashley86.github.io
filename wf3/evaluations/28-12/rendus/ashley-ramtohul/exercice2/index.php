<?php
/**
 * -- Consigne --
 * Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains.
 * Cette fonction prendra deux paramètres :  ● Le montant de type int ou float ● La devise de sortie (uniquement EUR ou USD).
 * Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :  1 euro = 1.085965 dollars américains
 * Il faut effectuer les vérifications nécessaires afin de valider les paramètres
 */

    # Sert à afficher la valeur insérée par l'utilisateur
    $montant = ( ! empty( $_POST['montant'] ) ) ? (float) round( $_POST['montant'], 2 ) : '';   // Montant
    $devise = ( ! empty( $_POST['devise'] ) ) ? $_POST['devise'] : '';                          // Devise

    # Initialisation de la conversion
    $conversion = null;

    /**
     * Conversion de devise USD => EUR / EUR => USD
     */
    function conversion($montant, $devise)
    {
        if( ! check_devise( $devise ) )
        {
            return false;
        }

        $devise_euro = 0.95814;
        $devise_dollar = 1.04368;

        if( $devise == 'to-dollars' )
        {
            return round( $montant * $devise_dollar, 2 ) . '&dollar;';
        } elseif( $devise == 'to-euros' ) {
            return round( $montant * $devise_euro, 2 ) . '&euro;';
        } else {
            return false;
        }
    }

    # Vérifie si la devise est prise en charge par l'application
    function check_devise($devise)
    {
        # Array contenant les devises prises en charges
        $devise_valides = ['to-euros', 'to-dollars'];

        # Retourne un booléen : TRUE si pris en charge, sinon, FALSE
        return in_array( $devise, $devise_valides );
    }

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Conversion EUR / USD</title>
    <style type="text/css">
        body {
            background: #ddd;
        }
        main {
            width: 300px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,.25);
        }
        input {
            margin-bottom: 20px;
        }
        input[type=submit] {
            width: 150px;
            margin: auto;
            display: block;
        }
        .conversion {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

    <main>
        <!-- Création du formulaire -->
        <form action="index.php" method="post">

            <!-- Champ Montant -->
            <label for="montant"><strong>Montant :</strong></label>
            <input type="text" name="montant" id="montant" value="<?php echo $montant; ?>" placeholder="Montant à convertir" />

            <br />

            <!-- Champs selection de conversion -->
            <strong>Conversion : </strong>
            <label for="devise">
                <input type="radio" name="devise" id="devise-to-dollars" value="to-dollars" <?php echo ( $devise == 'to-dollars' ) ? 'checked="checked"' : ''; ?> />
                &euro; -> &dollar;
            </label>
            <label for="devise">
                <input type="radio" name="devise" id="devise-to-euros" value="to-euros" <?php echo ( $devise == 'to-euros' ) ? 'checked="checked"' : ''; ?> />
                &dollar; -> &euro;
            </label>

            <br />

            <!-- Bouton de validation du formulaire -->
            <input type="submit" value="Convertir">

        </form>
<?php
    # On fait la conversion, si on la demande
    if( is_numeric($montant) && $montant !== 0 && check_devise( $devise ) )
    {
        # On appelle la fonction de conversion
        $conversion = conversion($montant, $devise);

        # On affiche le tout proprement
        echo '<div class="conversion">Résultat de la conversion :<strong><br />';
        echo $montant . ( ( $devise == 'to-euros' ) ? '&dollar;' : '&euro;' ) . ' => ' . $conversion;
        echo '</strong></div>';
    }
?>
    </main>

</body>
</html>