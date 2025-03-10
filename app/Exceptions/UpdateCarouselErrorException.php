<?php

namespace App\Exceptions;

use Exception;

class UpdateCarouselErrorException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Can not update carousel');
    }
}
