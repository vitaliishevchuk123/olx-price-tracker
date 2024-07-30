<?php

namespace App\Actions;

use App\Events\PriceChanged;
use App\Models\Announcement;
use App\Services\OlxAnnouncementApi;

class TrackOlxPrice
{
    public function handle(Announcement $announcement): void
    {
        $data = app(OlxAnnouncementApi::class)->getData($announcement->external_id);
        $olxPrice = (int)$data['price'];
        $lastSavedPrice = $announcement->prices()->latest()->first()->price;
        if ($olxPrice !== $lastSavedPrice) {
            event(new PriceChanged($announcement, $data));
        }
    }
}
