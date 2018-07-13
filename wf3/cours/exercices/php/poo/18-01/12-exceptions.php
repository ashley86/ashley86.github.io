<?php

class MonException extends Exception
{
    protected $message = 'Mon message d\'exception !!!  ';
}

class Demo
{
    public function accepteDix( $int )
    {
        if( ! is_int( $int ) )
        {
            throw new InvalidArgumentException( $int . ' n\'est pas un nombre entier' );
        }

        if( 11 == $int )
        {
            throw new MonException();
        }

        if( $int != 10 )
        {
            throw new Exception( $int . ' ne vaut pas 10' );
        }
    }
}

//$pdo = new PDO(); # try/catch
$demo = new Demo();

try { // si une exception est jetée à l'intérieur du try, alors on rentre dans le catch
//    $pdo->beginTransaction(); # try/catch
//    $pdo->query('INSERT INTO...'); # try/catch
    $demo->accepteDix( 11 );
    /**
     * Si une exception est 'jetée', la suite du block n'est pas executée
     */

//    $pdo->commit(); # try/catch
}
catch(MonException $e)
{
    echo 'Je génère ma propre exception... ';
    echo $e->getMessage();
}
catch(InvalidArgumentException $e)
{
    echo 'Mauvais argument !!!!';
    echo $e->getMessage();
    var_dump($e->getTrace());
}
catch(Exception $e)
{
//    $pdo->rollBack(); # try/catch
    echo $e->getMessage();
}