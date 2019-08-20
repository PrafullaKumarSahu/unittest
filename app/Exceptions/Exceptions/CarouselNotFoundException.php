<?php

namespace App\Exceptions;

use Exception;

class CarouselNotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Could not find this carousel');
    }
}
