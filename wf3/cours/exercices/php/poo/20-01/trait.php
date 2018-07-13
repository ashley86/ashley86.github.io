<?php

trait TestTrait
{
    public function test()
    {
        return 'test';
    }
}

trait TestTrait2
{
    public function test2()
    {
        return 'test2';
    }
}

class test
{
    use testTrait, testTrait2;
}

$test = new Test();

echo $test->test();
echo '<hr />';
echo $test->test2();