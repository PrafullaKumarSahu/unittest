<?php

namespace App\Exceptions;

use Exception;

class CreateCarouselErrorException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Can not create carousel');
    }
}
