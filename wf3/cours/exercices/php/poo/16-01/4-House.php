<?php

class House
{
    /*-----------------------------------------------
                ### DEFINE PROPERTIES ###
    -----------------------------------------------*/

    /**
     * Constante de classe
     * Comme une constante globale, sa valeur ne change jamais
     *
     * Conventionnellement, on l'écrit en MAJ
     */
    const HEIGHT = '6m';

    /**
     * Un attribut static appartient à la classe et non à aux objets qui l'instancient
     *
     * @var string
     */
    public static $size_area = '500m²';


    /**
     * Un attribut static peut être privé
     *
     * @var int
     */
    private static $nbRooms = 5;


    /**
     *
     * Valeur blanc par défaut pour l'attribut $color
     *
     * Ceci est un commentaire PHPDoc
     * @var string La couleur de la maison
     */
    private $color = 'blanc';

    /*-----------------------------------------------
                  ### DEFINE METHODS ###
    -----------------------------------------------*/
    /**
     * Getter de l'attribut $color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Setter de l'attribut $color
     *
     * @param $color
     * @return $this
     */
    public function setColor( $color )
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Une méthode statique est une méthode que l'on appelle via la classe, non par une de ses instances
     *
     * @return int
     */
    public static function getNbRooms()
    {
        return self::$nbRooms;
    }
}

$house = new House;
var_dump($house->setColor( 'rouge brique' ));
echo '<hr />';
var_dump($house::HEIGHT);
echo '<br />';
var_dump($house::$size_area);

echo '<hr />';
$house2 = new House;
$house2::$size_area = '300m²';

var_dump($house::$size_area);
echo '<br />';
var_dump($house2::$size_area);

echo '<hr />';
var_dump( $house::getNbRooms() );
echo '<br />';
var_dump( House::getNbRooms() ); //-> Bonne pratique