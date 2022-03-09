<?php

namespace App\Services;

class CountryService
{
    public static function all()
    {
        return [
            'nl' => 'Netherlands',
            'au' => 'Australia',
            'ca' => 'Canada',
            'gb'=> 'United Kingdom',
            'us' => 'United States'
        ];
    }
}
