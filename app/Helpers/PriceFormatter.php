<?php

namespace App\Helpers;

class PriceFormatter
{
    public function getFormatPrice(int $price, string $currency): string
    {
        $formatPrice = number_format($price, 0, '.', ' ');;
        return match ($currency) {
            'UAH' => $formatPrice . ' грн.',
            'USD' => '$ ' . $formatPrice,
            default => $formatPrice . ' ' .  $currency,
        };
    }
}
