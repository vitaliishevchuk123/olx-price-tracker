<?php

namespace App\Events;

use App\Models\Announcement;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PriceChanged
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Announcement $announcement,
        public array $newData
    ) {}
}
