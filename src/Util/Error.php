<?php

namespace Msossai91\Easegex\Util;

use Exception;

class Error
{
    public function __construct()
    {

    }

    /**
     * Throw an exception
     * 
     * @param string $message
     * @param string $codeName
     * 
     * @return null
     */
    public static function throw(string $message, string $codeName = 'UNKNOWN_ERROR')
    {
        throw new Exception($message, (new Error())->getCode($codeName));
    }

    /**
     * Get a error code
     * 
     * @param string $codeName
     * 
     * @return int
     */
    private function getCode($codeName)
    {
        $codesArray = include(__DIR__ . '/ErrorsCodes.php');

        if(!array_key_exists($codeName, $codesArray))
        {
            return $codesArray['UNKNOWN_ERROR'];
        }

        return $codesArray[$codeName];
    }
}