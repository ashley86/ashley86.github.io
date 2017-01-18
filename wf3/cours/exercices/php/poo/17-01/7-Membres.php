<?php
/*
- Ecrire les getters et setters
  le pseudo ne doit pas etre vide
  le mdp doit faire au moins 6 caracteres

 - instancier un objet membre 
 - definir pseudo & mdp pour cette objet puis les afficher
*/
class Membre
{
    private $pseudo;
    private $mdp;
    protected $nom;

    // mehtod qui va appeler automatiquement au moment ou on va faire un new

    // constructeur de la class
    // des lors qu'on instancie la class, cette methode est appeler automatiquement,
    //parce qu'elle a ce nom: __construct
    public function __construct($pseudo = 'moi', $mdp = '123456')
    {
        $this->setPseudo($pseudo);
        $this->setMdp($mdp);
    }

    // GETTER : va retourné l'attribut
    public function getPseudo()
    {
        return $this->pseudo;
    }

    // SETTER : va prendre un parametre en entrée et va pouvoir le modifier seulement a mes conditions
    public function setPseudo($pseudo)
    {
        if(!empty($pseudo)){
            $this->pseudo = $pseudo;
        }
        // interface fluide ( fluent interface)
        // on retourne $this pour pouvoir enchainer les appels aux setters
        return $this;
    }

    // GETTER : va retourné l'attribut
    public function getMdp()
    {
        return $this->mdp;
    }

    // // SETTER : va prendre un parametre en entrée et va pouvoir le modifier seulement a mes conditions
    public function setMdp($mdp)
    {
        if(strlen($mdp) >= 6){
            $this->mdp = $mdp;
        }
    }

    // GETTER : va retourné l'attribut
    public function getNom()
    {
        return $this->nom;
    }

    // SETTER
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function accederbackoffice()
    {
        return false;
    }
}


class admin extends Membre
{

    public function displayPseudo()
    {
        // On ne peut pas utiliser $this->pseudo car $pseudo est un attribut privé de Membre
        echo $this->getPseudo();
    }

    public function displayNom()
    {
        // on peut utiliser $this->nom car $nom est un attribut protégé de Membre
        // donc accessible depuis les classes qui en heritent
        echo $this->nom;
    }

    /**
     * Surcharge la methode accederbackoffice() de membre // le concept est que l'enfant devient prioritaire par rapport au parents
     * quand on appelle la methode depuis un objet Admin, c'est cette methode et non celle de la classe mere qui est appelé
     *
     * @return boolean
     */
    public function accederbackoffice()
    {
        return true;
    }
}


/**
 * Classe non héritable
 *
 * Class SuperAdmin
 */
final class SuperAdmin extends Admin
{

}


/**
 * Interdit : Fatal ERROR
 * On ne peut pas hérite d'une classe déclarée "final"
 *
class Hyperadmin extends SuperAdmin
{

}
*/

$membre = new Membre('pseudo');
$admin = new Admin();
echo $admin->getPseudo() . ' : ' .$admin->getMdp();
echo "<hr>";
$admin->displayPseudo();

echo "<hr>";
echo get_class($membre) . '<br>';
echo get_class($admin) . '<br>';
echo "<hr>";

var_dump($admin instanceof admin);
// du fait de l'heritage, un objet admin est aussi un objet Membre
var_dump($admin instanceof Membre);

echo "<hr>";

$admin->setNom('Romain');
$admin->displayNom();

echo "<hr>";
var_dump($admin->accederbackoffice());

echo "<hr>";

// du fait de l'heritage, un objet SuperAdmin est aussi un objet Admin et un objet Membre
$superAdmin = new SuperAdmin();
var_dump($superAdmin instanceof Admin);
var_dump($superAdmin instanceof Membre);
// Comme SuperAdmin hérite d'admin, c'est la methode surchargée dans admin qui est appelee ici
var_dump($superAdmin->accederbackoffice());







// echo $admin->nom // Erreur un attribut protegé reste inaccessible depuis l'exterieur







/*
$membre->setPseudo('PSEUDO');
$membre->setMdp('MOT DE PASSE');

$membre2 = new Membre('test', 'blabla');


echo $membre->getPseudo() . ' : ' .$membre->getMdp();
echo "<hr>";
echo $membre2->getPseudo() . ' : ' .$membre2->getMdp();

$membre3 = new Membre();
// utilisation de l'interface fluide
$membre3
	->setPseudo('cestmoi') // setPseudo() renvoie notre $membre3 (grace au return $this dans la methode)
	->setMdp('cmonmdp') // et $membre3 appelle la methode setMdp
;
$membre4 = new Membre();
echo $membre4->getPseudo() . ' : ' .$membre4->getMdp();
*/