<?php 

namespace Sauim\Framework\Exceptions;

class HttpException extends \Exception
{
    public function __construct($message, $code, \Exception $pevious = null)
    {
        http_response_code($code);
        parent::__construct($message, $code, $pevious);
    }

}