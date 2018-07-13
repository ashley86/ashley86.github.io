<?php

// Commentaire
#  Commentaire
/* Commentaires */

//    echo 'Hello world !', 'pouet';


class A{
    private $y;
    public $z;
    private $data = array();
    public function __set($name, $value){
        $this->data[$name] = $value;
        if( isset($this->{$name}) )
        { echo 'toto';
            $this->{$name} = $value;
        } else echo 'tata';

    }

    public function __isset($n)
    {
        var_dump('kakakakakakakkaa : ' . $n);
    }

    public function getData()
    {
        return $this->data;
    }
}
$a = new A();
var_dump($a);
$a->x = 1;
$a->y = 2;
$a->z = 3;
var_dump($a);

