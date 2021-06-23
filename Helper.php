<?php

abstract class Helper
{
    public static function nf($value, $shorten = true, $decimals = 0, $decimalSeparator = ',', $thousandsSeparator = '.')
    {
        if($shorten) {
            if($value > 1000) return number_format($value / 1000, $decimals, $decimalSeparator, $thousandsSeparator) . 'K';
            if($value > 1000000) return number_format($value / 1000000, $decimals, $decimalSeparator, $thousandsSeparator) . 'M';

            return number_format($value, $decimals, $decimalSeparator, $thousandsSeparator);
        }

        return number_format($value, $decimals, $decimalSeparator, $thousandsSeparator);
    }

    public static function getMultiplier(int $bonus, int $researchLevel)
    {
        return 1 + (($bonus + ($researchLevel * 5)) / 100);
    }
}
