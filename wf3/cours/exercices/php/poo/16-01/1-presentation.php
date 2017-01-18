<?php

# Création d'une classe
class Panier
{
    # Déclaration d'une propriété publique : accessible depuis l'exterieur de la classe
    public $utilisateur;
    # Assignation d'une valeur à une propriété lors de la déclaration
    public $nbProduits = 1;
    # Déclaration d'une propriété privée : non accessible à l'exterieur de la classe
    private $articles;

    # Déclaration d'une méthode : fonction définie spécifiquement pour cette classe
    public function ajouterArticle()
    {

        # Valeur de retour
        return 'Article ajouté';
    }

    # Déclaration d'une méthode privée
    private function retirerArticle()
    {
        return 'article retiré';
    }

    public function afficheUtilisateur()
    {
        # $this fait référence à l'objet instancié de la classe
        echo $this->utilisateur;
    }

    # Appeler une méthode privée depuis l'exterieur
    public function enleverArticle()
    {
        return $this->retirerArticle();
    }
}

# Instanciation d'un objet
$panier = new Panier();

# Assignation d'une valeur à la propriété de mon objet
$panier->nbProduits = 12;

var_dump( $panier->nbProduits );

# Assignation d'un nouvel objet
$panier2 = new Panier();
var_dump( $panier2->nbProduits ); //-> La valeur est différente du premier objet

echo '<hr />';

$panier->utilisateur = 'Toto';

# Appel d'une méthode publique
echo 'Utilisateur : ';
$panier->afficheUtilisateur();

echo '<hr />';

# Appel d'une méthode privée ...
//$panier->retirerArticle(); //->Fatal Error
# ...via une méthode publique
echo $panier->enleverArticle();

