<?php

namespace App\Exceptions;

use Exception;

class DeleteCarouselErrorException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('carousel can not be deleted');
    }
}
