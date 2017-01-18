<?php
session_start();

function getShowContent($content, $fieldSize)
{
    $length_content = strlen( $content );
    $before_content = (int) ( ($fieldSize - $length_content) / 2 );
    $after_content = $fieldSize - $length_content - $before_content;
    $show_content = '';
    for($i = 0; $i < $before_content; $i++)
    {
        $show_content .= ' ';
    }
    $show_content .= $content;
    for($i = 0; $i < $after_content; $i++)
    {
        $show_content .= ' ';
    }

    return $show_content;
}

function show_rayons( $articles )
{
    echo <<<START_RAYONS
+--------------------------------------------+
+                   RAYONS                   +
+--------------------------------------------+
+      Nom      +    Quantite   +    Prix    +
+--------------------------------------------+
START_RAYONS;

    foreach( $articles as $article )
    {
        $show_name = getShowContent( $article->getNom(), 15 );
        $show_quantity = getShowContent( $article->getQuantite(), 15 );
        $show_price = getShowContent( number_format( $article->getPrix(), 2 ) . '€', 14 );

        echo <<<ARTICLE

+$show_name+$show_quantity+$show_price+
ARTICLE;
    }
    echo <<<END_RAYONS

+--------------------------------------------+

END_RAYONS;

}

/**
 * Classe représentant un utilisateur
 */
class Person
{
    private $prenom;
    private $nom;
    /**
     * @var Panier
     */
    private $panier;

    public function __construct($prenom, $nom)
    {
        $this->panier = new Panier();
        $this
            ->setPrenom( $prenom )
            ->setNom( $nom );

        echo 'Bienvenue : <strong>' . $this->getNomComplet() . '</strong><br />';
    }

    # GETTER
    public function getPrenom()
    {
        return $this->prenom;
    }

    # SETTER
    public function setPrenom( $prenom )
    {
        if( is_string( $prenom ) ) {
            $this->prenom = $prenom;
        }

        return $this;
    }

    # GETTER
    public function getNom()
    {
        return $this->nom;
    }

    # SETTER
    public function setNom( $nom )
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNomComplet()
    {
        return ucfirst( $this->getPrenom() ) . ' ' . ucfirst( $this->getNom() );
    }

    public function getPanier()
    {
        return $this->panier;
    }

    public function setPanier( Panier $panier )
    {
        $this->panier = $panier;

        return $this;
    }

    public function addArticlePanier( Article $article, $quantite )
    {
        $this->getPanier()->addArticle( $article , $quantite  );
    }

}

class Panier
{
    private $articles = [];
    private $montant = 0;

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles( array $articles )
    {
        $this->articles = $articles;
    }

    public function addArticle( Article $article, $quantite )
    {
        /**
         * On calcul le nombre d'article récupérables en fonction du nombre d'articles disponibles dans le rayon
         */
        $nombre_articles = ( $article->getQuantite() > $quantite ) ? $quantite : $article->getQuantite();
        /**
         * Calcul du coût de l'article en fonction de la quantite
         */
        $prix = $article->getPrix() * $nombre_articles ;
        /**
         * On ajoute le montant au coût total du panier
         */
        $this->setMontant( $prix );
        /**
         * On supprime du rayon le nombre d'articles selectionnés
         */
        $article->reductionQuantite( $nombre_articles );

        /**
         * On ajoute l'article au panier
         */
        $this->articles[] = [ $article, $quantite, $prix ];

        return $this;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant( $montant )
    {
        $this->montant += $montant;
    }
}

class Article
{
    private $nom;
    private $prix;
    private $quantite;

    /**
     * Méthode "magique" appelée quand on essaie d'afficher l'objet
     * DOIT retourner une chaîne de caractères
     *
     * @return string La représentation en chaîne de caractères de l'objet
     */
    public function __toString()
    {
        return $this->nom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom( $nom )
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix( $prix )
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite( $quantite )
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function reductionQuantite( $quantite )
    {
        $this->quantite -= $quantite;

        return $this;
    }
}

class Admin extends Person
{

}



















/**
 * On récupère la marchandise du camion de livraison
 */
//unset($_SESSION['stock']);
if( empty( $_SESSION['stock'] ) || isset($_GET['stock']) ) {
    $_SESSION['stock'] =
        [
            'pomme' => [            // Nom
                'quantite' => 30,   // Quantite
                'prix' => 1.25      // Prix Unitaire
            ],
            'banane' => [
                'quantite' => 30,
                'prix' => 1.4
            ],
            'litchie' => [
                'quantite' => 30,
                'prix' => 2.5
            ],
            'mangue' => [
                'quantite' => 30,
                'prix' => 3.5
            ],
            'fraise' => [
                'quantite' => 30,
                'prix' => 1.6
            ],
            'kiwi' => [
                'quantite' => 30,
                'prix' => 2.1
            ],
            'ananas' => [
                'quantite' => 30,
                'prix' => 3
            ]
        ];
}

echo '<pre>';

echo '<h1>Bienvenue chez votre maraîcher préféré !!</h1>';

/**
 * On rempli le rayon
 */
foreach( $_SESSION['stock'] as $nom => $article )
{
    ${ strtolower( $nom ) } =  new Article;
    ${ strtolower( $nom ) } -> setNom( $nom );
    ${ strtolower( $nom ) } -> setQuantite( $article['quantite'] );
    ${ strtolower( $nom ) } -> setPrix( $article['prix'] );
}
/**
 * Ohhh, le beau rayon tout rempli !!
 */
show_rayons([$pomme, $banane, $litchie, $mangue, $fraise, $kiwi, $ananas]);

//var_dump($_SESSION['stock']);
//--------------------------------------


if( ! empty( $_POST ) )
{
//var_dump($_POST);
    echo '<hr />';
    echo '<h2>Un client est rentré dans le magasin</h2>';
    echo '<hr />';

    /**
     * Une personne rentre dans le magasin
     */
    $person = new Person( htmlentities( htmlspecialchars( trim( $_POST['prenom'] ) ) ), htmlentities( htmlspecialchars( trim( $_POST['nom'] ) ) ) );

    /**
     * Elle prend un panier
     */
    $person->setPanier( new Panier );

    echo '<hr />';
    echo '<h2>Balade dans les rayons</h2>';
    echo '<hr />';



    echo '<hr />';
    echo '<h2>Passage en caisse</h2>';
    echo '<hr />';

    /**
     * On lui ajoute OBLIGATOIREMENT 2 articles dans son panier
     */
#$person->getPanier()->setArticles( [ $banane, $fraise ] );

    /**
     * Elle remplit son panier
     */
    //-> a modifier
    foreach( $_POST as $nom => $value )
    {
        if( $nom == 'prenom' || $nom == 'nom' ) {
            continue;
        }
        $fruit = substr( $nom, 8 );

        $quantite = (int) $value;
        if( $quantite <= 0 ) {
            continue;
        }

        $person->addArticlePanier( ${$fruit}, $quantite );
        $new_stock = $_SESSION['stock'][$fruit]['quantite'] - $quantite;
        $new_stock = ( $new_stock < 0 ) ? 0 : $new_stock;
        $_SESSION['stock'][$fruit]['quantite'] = $new_stock;
    }

    /**
     * Elle dépose le contenu de son panier sur le tapis
     */
#var_dump($person->getPanier()->getArticles());

    /**
     * La caissière lui donne le montant à payer
     */
#var_dump($person->getPanier()->getMontant());


    /**
     * Affichage du ticket de caisse
     */
    $date = date( 'd/m/Y à H:i:s' );
    echo <<<TICKET
+----------------------------------+
+            TICKET                +
+----------------------------------+
+       $date      +
+----------------------------------+

TICKET;

    $panier_final = $person->getPanier();
    foreach( $panier_final->getArticles() as $article )
    {
//    echo 'toto';
//    var_dump($article);
        $show_name = $article[0]->getNom();
        $show_quantity = $article[1];
        $show_price = number_format( $article[2], 2);
        $show_line = getShowContent("$show_name         $show_quantity       $show_price €", 36);
        echo <<<ARTICLE
+                                  +
+$show_line+
+                                  +

ARTICLE;
    }


    $total = $panier_final->getMontant();
    $show_total = getShowContent("Total                  $total €", 34);
    echo <<<END_TICKET
+----------------------------------+
+ $show_total +
+----------------------------------+

END_TICKET;

    foreach( $_SESSION['stock'] as $nom => $article )
    {
        $new_stock = $_SESSION['stock'][$nom]['quantite'] - (int) $_POST['article_' . $nom];
        $new_stock = ( $new_stock < 0 ) ? 0 : $new_stock;
        $_SESSION['stock'][$nom]['quantite'] = $new_stock;
    }

    echo '<hr />';
    echo '<h2>Retour en rayons</h2>';
    echo '<hr />';
    show_rayons([$pomme, $banane, $litchie, $mangue, $fraise, $kiwi, $ananas]);


}






?>

<form action="" method="post">

    <label for="prenom">Comment vous appelez-vous ?</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom" />
    <input type="text" name="nom" id="nom" placeholder="Nom" />

    <label for="article">Que désirez-vous acheter ?</label>
    <table>
        <?php
            foreach( $_SESSION['stock'] as $nom => $article )
            {
                echo '<tr>';
                echo '<td>' . $nom . ' => ' . $article['prix'] . '&euro;</td>';
                $select_quantite = '<td><select name="article_' . $nom . '" id="article"><option value="">0</option>';
                for($i = 1; $i <= $article['quantite']; $i++) {
                    $select_quantite .= '<option value="' . $i . '">' . $i . '</option>';
                }
                $select_quantite .= '</select></td>';
                echo $select_quantite;
                echo '</tr>';
            }
        ?>
    </table>

    <input type="submit" value="Acheter">

</form>


<a href="?stock=1">Remplir les stocks</a>