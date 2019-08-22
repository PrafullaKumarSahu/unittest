<?php

namespace App\Exceptions;

use Exception;

class NoCarouselFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('No carousel at this moment');
    }
}
