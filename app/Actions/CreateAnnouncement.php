<?php

namespace App\Actions;

use App\Models\Announcement;
use App\Models\User;
use App\Services\OlxAnnouncementApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Symfony\Component\DomCrawler\Crawler;

class CreateAnnouncement
{
    public function handle(array $data, User $user): Announcement
    {
        $sku = $this->extractSku($data['url']);
        $announcement = Announcement::query()->where('sku', $sku)->first();
        if ($announcement) {
            if ($announcement->users()->where('users.id', $user->id)->exists()) {
                throw ValidationException::withMessages(['Ви вже відстежуєте дане оголошення!']);
            }
            $announcement->users()->attach($user);
            return $announcement;
        }

        $response = Http::get($data['url']);
        $html = $response->body();
        $crawler = new Crawler($html);
        $announcementId = explode(' ', $crawler->filter('.css-12hdxwj')->text())[1];
        $data = app(OlxAnnouncementApi::class)->getData($announcementId);
        $data['sku'] = $sku;
        $announcement = $user->announcements()->create($data);
        $announcement->prices()->create($data);

        return $announcement;
    }

    public function extractSku(string $url): ?string
    {
        $pattern = '/\/obyavlenie\/([^\/]+)\.html/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }
}
