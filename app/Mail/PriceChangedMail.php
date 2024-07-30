<?php

namespace App\Mail;

use App\Helpers\PriceFormatter;
use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PriceChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Announcement $announcement,
        public array        $newData
    )
    {
    }

    public function build()
    {
        return $this->subject('Ціну змінено на ' . $this->announcement->title)
            ->view('emails.price_changed')
            ->with([
                'announcement' => $this->announcement,
                'newPrice' => app(PriceFormatter::class)
                    ->getFormatPrice(
                        (int)$this->newData['price'],
                        $this->newData['currency']
                    ),
            ]);
    }
}
