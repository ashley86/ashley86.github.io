<?php

class A
{



    public static function qui()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::qui();
    }
}

class B extends A
{
    public static function qui()
    {
        echo __CLASS__;
    }
}

B::test();