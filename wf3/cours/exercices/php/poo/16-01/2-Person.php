<?php

/**
* Classe représentant un utilisateur
*/
class Person
{
    private $prenom;
    private $nom;

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
}

$personne = new Person();
var_dump($personne->getPrenom());

$personne->setPrenom('Ash');
var_dump($personne->getPrenom());

$personne->setPrenom(123);
var_dump($personne->getPrenom());

