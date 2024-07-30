<?php

namespace App\Listeners;

use App\Events\PriceChanged;

class SaveNewPrice
{
    public function handle(PriceChanged $event)
    {
        $event->announcement
            ->prices()
            ->create(
                [
                    'price' => $event->newData['price'],
                    'currency' => $event->newData['currency'],
                ]
            );
    }
}
