<?php

namespace App\Models;

use App\Helpers\PriceFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnouncementPrice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'announcement_id',
        'price',
        'currency',
    ];

    public function getFormatPrice(): string
    {
        return app(PriceFormatter::class)->getFormatPrice($this->price, $this->currency);
    }
}
