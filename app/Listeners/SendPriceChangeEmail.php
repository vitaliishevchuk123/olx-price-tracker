<?php

namespace App\Listeners;

use App\Events\PriceChanged;
use App\Mail\PriceChangedMail;
use Illuminate\Support\Facades\Mail;

class SendPriceChangeEmail
{
    public function handle(PriceChanged $event)
    {
        $event->announcement->users()->chunk(30, function ($users) use ($event) {
            foreach ($users as $user) {
                Mail::to($user->email)
                    ->send(new PriceChangedMail(
                            $event->announcement,
                            $event->newData
                        )
                    );
            }
        });
    }
}
