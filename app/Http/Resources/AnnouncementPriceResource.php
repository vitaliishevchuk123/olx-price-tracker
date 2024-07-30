<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\AnnouncementPrice */
class AnnouncementPriceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'format_price' => $this->getFormatPrice(),
            'currency' => $this->currency,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.y в H:i'),
        ];
    }
}
