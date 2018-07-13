<?php

/**
 * Class Chat
 */
class Chat
{
    /**
     * Prénom du chat
     *
     * @var $prenom
     */
    protected $prenom;

    /**
     * Âge du chat
     *
     * @var $prenom
     */
    protected $age;

    /**
     * Couleur du chat
     *
     * @var $prenom
     */
    protected $couleur;

    /**
     * Prénom du chat
     *
     * @var $prenom
     */
    protected $sexe;

    /**
     * Race du chat
     *
     * @var $prenom
     */
    protected $race;

    
    /** 
     * Lors de l'instanciation
     */
    public function __construct($prenom, $age, $couleur, $sexe, $race)
    {
        $this->setPrenom($prenom);
        $this->setAge($age);
        $this->setCouleur($couleur);
        $this->setSexe($sexe);
        $this->setRace($race);
    }

    /**
     * Récupère le prénom du chat
     *
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Récupère l'âge du chat
     *
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Récupère la couleur du chat
     *
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Récupère le sexe du chat
     *
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Récupère la race du chat
     *
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Ajoute un prénom au chat
     *
     * @param $prenom
     * @return $this
     * @throws Exception
     */
    public function setPrenom( $prenom )
    {
        $prenom = trim( $prenom );

        if( strlen( $prenom ) <= 20 && strlen($prenom) >= 3 ){
            $this->prenom = $prenom;
        } else {
            throw new Exception( 'Le prénom doit être compris  3 et 20 caractères.' );
        }

        return $this;
    }

    /**
     * Ajoute un âge au chat
     *
     * @param $age
     * @return $this
     * @throws Exception
     */
    public function setAge( $age )
    {
        if( is_int( $age ) ){
            $this->age = $age;
        } else {
            throw new Exception( 'L\'âge doit être de type INT.' );
        }

        return $this;
    }

    /**
     * Ajoute une couleur au chat
     *
     * @param $couleur
     * @return $this
     * @throws Exception
     */
    public function setCouleur( $couleur )
    {
        $couleur = trim( $couleur );

        if( strlen( $couleur ) <= 10 && strlen( $couleur ) >= 3 ){
            $this->couleur = $couleur;
        } else {
            throw new Exception( 'La couleur doit être compris 3 et 20 caractères.' );
        }

        return $this;
    }

    /**
     * Selectionne le sexe du chat
     *
     * @param $sexe
     * @return $this
     * @throws Exception
     */
    public function setSexe( $sexe )
    {
        $sexe = strtolower( trim( $sexe ) );
        $sexes_autorises = ['male', 'femelle'];
        if( in_array($sexe, $sexes_autorises ) ){
            $this->sexe = $sexe;
        } else {
            throw new Exception( 'Le sexe doit être \'male\' ou \'femelle\'.' );
        }

        return $this;
    }

    /**
     * Ajoute une race au chat
     *
     * @param $race
     * @return $this
     * @throws Exception
     */
    public function setRace( $race )
    {
        $race = trim( $race );

        if( strlen( $race ) <= 20 && strlen( $race ) >= 3 ){
            $this->race = $race;
        } else {
            throw new Exception( 'La race doit être compris 3 et 20 caractères.' );
        }

        return $this;
    }

    /**
     * Retourne toutes les informations du chat
     *
     * @return array
     */
    public function getInfos()
    {
        return [
            'prenom'    =>  $this->getPrenom(),
            'age'       =>  $this->getAge(),
            'couleur'   =>  $this->getCouleur(),
            'sexe'      =>  $this->getSexe(),
            'race'      =>  $this->getRace(),
        ];
    }
}