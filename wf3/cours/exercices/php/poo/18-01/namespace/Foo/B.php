<?php

namespace Foo;

use Bar\A as toto;
use Bar\C;

class B extends toto
{
    public function displayVar()
    {
        echo $this->var;
    }

    public function now()
    {
        $now = new \DateTime();
        echo $now->format('d m Y');
    }

    public function bonjour()
    {
        C::hello();
    }

    public function bonjourD()
    {
        Baz\D::hello();
    }
}