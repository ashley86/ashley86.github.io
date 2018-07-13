<?php

namespace Model;

use App\Cnx;
use PDO;

class Abonne
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $nom;


    public function getId()
    {
        return $this->id;
    }

    public function setId( $id )
    {
        $this->id = $id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom( $prenom )
    {
        $this->prenom = $prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom( $nom )
    {
        $this->nom = $nom;
    }

    public static function fetchAll()
    {
        $cnx = Cnx::getInstance();

        $stmt = $cnx->query( 'SELECT * FROM abonne' );

        return $stmt->fetchAll( PDO::FETCH_CLASS, self::class );
    }

    public static function find( $id )
    {
        $cnx = Cnx::getInstance();

        try {
            $stmt = $cnx->query('SELECT * FROM abonne WHERE id = ' . $id);
            $stmt->fetchObject(self::class);
        } catch (\PDOException $e) {
            var_dump($e);
        }
        var_dump($stmt->fetchObject( self::class ));

        return $stmt->fetchObject( self::class );
    }

    /**
     * Filtrer par nom
     *
     * @param $filter
     * @return array
     */
    public static function filterByFirstLetterOfName( $filter )
    {
        $cnx = Cnx::getInstance();

        $stmt = $cnx->query( "SELECT * FROM abonne WHERE nom LIKE '" . $filter . "%'" );

        return $stmt->fetchAll( PDO::FETCH_CLASS, self::class );
    }

    /**
     * Recherche
     *
     * @param $search
     * @return array
     */
    public static function search( $search )
    {
        $cnx = Cnx::getInstance();

        $stmt = $cnx->query( "SELECT * FROM abonne WHERE nom LIKE '%" . $search . "%'" );

        return $stmt->fetchAll( PDO::FETCH_CLASS, self::class );
    }

    public static function validatePrenom( $prenom, &$msg )
    {
        if( empty( $prenom ) ) {
            $msg = 'Le prénom est obligatoire';
            return false;
        } elseif( strlen( $prenom ) > 50 ) {
            $msg = 'Le prénom ne doit pas faire plus de 50 caractères';
            return false;
        }

        return true;
    }

    public static function validateNom( $nom, &$msg )
    {
        if( empty( $nom ) )
        {
            $msg = 'Le nom est obligatoire';
            return false;
        } elseif( strlen( $nom ) > 50 ) {
            $msg = 'Le nom ne doit pas faire plus de 50 caractères';
            return false;
        }

        return true;
    }

    public function update(&$msg)
    {
        $cnx = Cnx::getInstance();

        $sql = "UPDATE abonne SET nom = :nom, prenom = :prenom WHERE id = :id";
        $datas = [
            'id' => $this->getId(),
            'prenom' => $this->getPrenom(),
            'nom' => $this->getNom()
        ];

        $stmt = $cnx->prepare( $sql );

        $stmt->execute( $datas );

        $msg = "L'utilisateur a bien été mis à jour";

        return true;
    }

    public function insert(&$msg)
    {
        $cnx = Cnx::getInstance();

        $sql = "INSERT into abonne (nom, prenom) VALUES(:nom, :prenom)";
        $datas = [
            'prenom'    => $this->getPrenom(),
            'nom'       => $this->getNom()
        ];

        $stmt = $cnx->prepare( $sql );

        $stmt->execute( $datas );

        $this->setId( $cnx->lastInsertId() );

        $msg = "L'utilisateur a bien été enregistré";

        return true;
    }
}