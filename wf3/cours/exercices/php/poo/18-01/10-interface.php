<?php

interface Texture
{
    /**
     * @return string
     */
    public function getMatiere();

    public function getCouleur();

    /**
     * @param $couleur
     * @return string
     */
    public function setCouleur( $couleur );

}

interface Volume
{
    public function getForme();

    public function getContenance();
}

/**
 * Pour implémenter une interface, on doit définir les méthodes qu'elle contient
 */
class Objet implements Texture
{
    public function getMatiere()
    {
        return 'bois';
    }

    public function getCouleur()
    {
        return 'noir';
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
}

/**
 * On peut hériter d'une classe et implémenter une inteface
 */
class Carre extends Objet implements Volume
{
    public function getForme()
    {
        return 'carré';
    }
   
    public function getContenance()
    {
        return '50';
    }
}

class Rectangle implements Volume, Texture
{
    public function getForme()
    {
        return 'rectangle';
    }

    public function getCouleur()
    {
        return 'bleu';
    }

    public function setCouleur( $couleur )
    {
        $this->couleur = $couleur;
    }

    public function getContenance()
    {
        return 73;
    }

    public function getMatiere()
    {
        return 'laiton';
    }
}

function getFormeVolume( Volume $volume )
{
    /*
     * $volume est un objet d'une classe qui implemante l'interface Volume
     * dès lors que sa classe implémente cette interface, alors $volume a une méthode getForm()
     */
    return $volume->getForme();
}

$carre = new Carre();
$rectangle = new Rectangle();

echo getFormeVolume( $carre );
echo '<br />';
echo getFormeVolume( $rectangle );
