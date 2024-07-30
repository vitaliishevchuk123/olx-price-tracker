<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Announcement */
class AnnouncementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'external_id' => $this->external_id,
            'title' => $this->title,
            'img' => $this->img,
            'sku' => $this->sku,
            'url' => $this->url,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y в H:i'),
            'prices' => AnnouncementPriceResource::collection($this->whenLoaded('prices')),
        ];
    }
}
