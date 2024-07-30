<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OlxAnnouncementApi
{
    const BASE_URL = "https://olx.ua/api/v1/targeting/data/";

    public function getData(string $announcementId): array
    {
        $res = Http::get(self::BASE_URL, [
            'page' => 'ad',
            'params' => [
                'advertising_test_token' => null,
                'dfp_user_id' => 0,
                'ad_id' => $announcementId,
            ]
        ]);
        $data = $res->json()['data']['targeting'];

        return [
            'external_id' => $data['ad_id'],
            'title' => $this->formatTitle($data['ad_title']),
            'img' => $data['ad_img'],
            'price' => $data['ad_price'],
            'url' => $data['ad_url'],
            'currency' => $data['currency'],
        ];
    }

    public function formatTitle(string $input): string
    {
        return str($input)
            ->replace('---', '***')
            ->replace('-', ' ')
            ->replace('***', ' - ')
            ->ucfirst()
            ->toString();
    }
}
