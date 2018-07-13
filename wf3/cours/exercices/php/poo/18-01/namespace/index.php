<?php

include 'autoload.php';

//include 'Foo/A.php';
//include 'Bar/A.php';
//include 'Bar/C.php';
//include 'Foo/Baz/D.php';
//include 'Foo/B.php'; // Attention à l'ordre d'inclusion pour l'héritage

//use Bar\A;

/**
 * On accède à la classe A de Foo
 */
$a = new Foo\A();
echo $a->var;


/**
 * Si la class A de Bar n'a pas de namespace,
 * on accède à la classe A de Bar
 */
//$a = new A();
echo '<hr />';
/**
 * Avec un namespace à la classe A de bar,
 * on accède à la classe A de Bar
 */
$a2 = new Bar\A();
echo $a2->var;


echo '<hr />';


$b = new Foo\B();
$b->displayVar();
echo '<br />';
$b->now();


echo '<hr />';

$b->bonjour();
echo '<br />';
$b->bonjourD();