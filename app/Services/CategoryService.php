<?php

namespace App\Services;

class CategoryService
{
    public static function all()
    {
        return ['business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'];
    }
}
