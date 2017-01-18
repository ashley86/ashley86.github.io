<?php


/**
 * abstract : On peut pas instancier directement la classe / methode -> il faut obligatoirement l'hériter
 * interface :
 * final : classe non héritable, obligation de l'utiliser tel quel
 *
 * public : methode / propriete accessible à tout le monde
 * protected : methode / propriete accessible seulement aux méthodes de la classe et aux enfants qui héritent de la classe
 * private : methode / propriete accessible seulement aux méthodes de la classe
 */

abstract class Animal
{
    private $nom = 'animal';

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom( $nom )
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Méthode abstraite : Aucune définition à cet endroit, seul l'héritier peut définir son contenu
     *
     * @return mixed
     */
    abstract public function crie();
}

class Chat extends Animal
{
    protected $nom = 'chat';

    /**
     * héritage de la méthode parente abstraite
     * Comme Chat hérite d'Animal, il doit définir cette méthode ou être déclaré abstraite
     */
    public function crie()
    {
        echo 'Miaou !';
    }

    /**
     * Seule une classe abstraite peut déclarer une methode abstraite
     *
    abstract public function manger();
     **/
}

// Seul un héritier peut instancier cette classe
# $animal = new Animal();

$chat = new Chat();
echo $chat->getNom();
echo '<hr />';

//$chat->nom  = 'toto';
$chat->setNom('prout');
echo $chat->getNom();
echo '<hr />';
//echo $chat->getGenre();
echo '<hr />';
