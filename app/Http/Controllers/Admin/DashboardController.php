<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\GalleryImage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'events' => Event::count(),
            'messages' => ContactMessage::count(),
            'images' => GalleryImage::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentEvents = Event::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentEvents'));
    }
}
