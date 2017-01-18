<?php

require_once 'Errors.php';

/**
 * Class Membre
 */
class Membre extends Errors
{
   private $pseudo;
   private $mdp;

    public function __construct( $pseudo = null, $mdp = null )
    {
        if( ! is_null( $pseudo ) ) {
            $this->setPseudo($pseudo);
        }

        if( ! is_null( $mdp ) ) {
            $this->setMdp($mdp);
        }
    }

   public function getPseudo()
   {
       return $this->pseudo;
   }

    /**
     *
     * Assigne un pseudo
     *  - minimum 3 caractères
     *  - maximum 15 caractères
     *  - caractères alphanumérique + tirets seulement
     *
     * @param $pseudo
     * @return $this
     */
   public function setPseudo( $pseudo )
   {
       try {
           if( preg_match( '/^([\w\d-]{3,15})$/i', $pseudo ) )
           {
               $this->pseudo = $pseudo;
           } else {
               $errorMessage = <<<EM
<p>Format du pseudo incorrect :</p>
<ul>
    <li>minimum 3 caractères</li>
    <li>maximum 15 caractères</li>
    <li>caractères alphanumérique + tirets seulement</li>
</ul>
EM;

               throw new Exception($errorMessage);
           }
       }
       catch( Exception $e)
       {
           Errors::show($e->getMessage());
       }

       return $this; # Interface fluide (fluent interface) ; On retourne $this pour pouvoir enchaîner les appels aux SETTERS
   }

    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     *
     * Assigne un mot de passe :
     *  - minimum 6 caractères
     *
     * @param $mdp
     * @return $this
     */
    public function setMdp( $mdp )
    {
       try {
           if( preg_match( '/^(.{6,})$/', $mdp ) )
           {
                   $this->mdp = $mdp;
           } else {
               $errorMessage = <<<EM
<p>Format du mot de passe incorrect :</p>
<ul>
    <li>minimum 6 caractères</li>
</ul>
EM;

               throw new Exception($errorMessage);
           }
       }
       catch( Exception $e)
       {
           Errors::show($e->getMessage());
       }

        return $this;
    }
}


$membre = new Membre( 'joli-pseudo', 'xez3' );
echo 'Login => ' . $membre->getPseudo() . ' : ' . $membre->getMdp();

echo '<hr />';

$membre2 = new Membre;
$membre2
    ->setPseudo('toto')
    ->setMdp('turlututu');
echo 'Login => ' . $membre2->getPseudo() . ' : ' . $membre2->getMdp();

