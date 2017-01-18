<?php

abstract class Vehicule
{
    final public function demarrer()
    {
        return 'je démarre';
    }

    public function getVitesseMax()
    {
        return 100;
    }

    abstract public function getCarburant();

}

class Moto extends Vehicule
{
    public function getCarburant()
    {
        return 'essence';
    }

    public function getVitesseMax()
    {
        return parent::getVitesseMax() + 60;
    }
}

class Voiture extends Vehicule
{
    public function getCarburant()
    {
        return 'diesel';
    }

    public function getVitesseMax()
    {
        return parent::getVitesseMax() + 30;
    }
}


$voiture = new Voiture();
echo 'Voiture démarre : ' . $voiture->demarrer() . '<br />';
echo 'Voiture carburant : ' . $voiture->getCarburant() . '<br />';
echo 'Voiture vitesse max : ' . $voiture->getVitesseMax() . '<br />';

echo '<hr />';

$moto = new Moto();
echo 'Mote démarre : ' . $moto->demarrer() . '<br />';
echo 'Mote carburant : ' . $moto->getCarburant() . '<br />';
echo 'Mote vitesse max : ' . $moto->getVitesseMax() . '<br />';
