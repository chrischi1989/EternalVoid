<?php

class Helper
{
    public static function nf($value)
    {
        return number_format($value, '0', ',', '.');
    }
}