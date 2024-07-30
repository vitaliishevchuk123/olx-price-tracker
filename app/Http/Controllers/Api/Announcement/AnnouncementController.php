<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Actions\CreateAnnouncement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\StoreRequest;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::query()
            ->with('prices')
            ->orderBy(
                $request->get('sort', $request->get('sort', 'created_at')),
                $request->get('direction', $request->get('direction', 'desc'))
            )
            ->paginate($request->get('perPage', 25));


        return [
            'announcements' => AnnouncementResource::collection($announcements),
            'total' => $announcements->total(),
            'currentPage' => $announcements->currentPage(),
            'perPage' => $announcements->perPage(),
        ];
    }

    public function store(StoreRequest $request)
    {
        return AnnouncementResource::make(app(CreateAnnouncement::class)->handle(
            $request->validated(),
            auth()->user()));
    }
}
