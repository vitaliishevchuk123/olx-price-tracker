<?php

namespace App\Console\Commands;

use App\Actions\TrackOlxPrice;
use App\Models\Announcement;
use Illuminate\Console\Command;

class OlxPriceTrackCommand extends Command
{
    protected $signature = 'olx:price-track';

    protected $description = 'Tracking prices';

    public function handle()
    {
        Announcement::query()->chunk(30, function ($announcements) {
            foreach ($announcements as $announcement) {
                app(TrackOlxPrice::class)->handle($announcement);
            }
        });
        return self::SUCCESS;
    }
}
