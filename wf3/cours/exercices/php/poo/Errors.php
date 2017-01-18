<?php

class Errors
{
    public static function show( $message )
    {
        echo <<<ERROR_MESSAGE
        <div class="error-message" style="background-color:lightsalmon;">
            $message
        </div>
ERROR_MESSAGE;

    }
}