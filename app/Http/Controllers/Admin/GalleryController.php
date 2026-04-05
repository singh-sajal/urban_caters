<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with('event', 'category')->latest()->paginate(20);
        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        $events = Event::all();
        $categories = EventCategory::all();
        return view('admin.gallery.create', compact('events', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'event_id' => 'nullable|exists:events,id',
            'event_category_id' => 'nullable|exists:event_categories,id',
            'image' => 'required|image|max:4096',
        ]);

        $path = $request->file('image')->store('gallery', 'public');
        $data['path'] = $path;
        GalleryImage::create($data);

        return redirect()->route('admin.gallery.index')->with('status', 'Image uploaded');
    }

    public function edit(GalleryImage $gallery)
    {
        $events = Event::all();
        $categories = EventCategory::all();
        return view('admin.gallery.edit', ['image' => $gallery, 'events' => $events, 'categories' => $categories]);
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'event_id' => 'nullable|exists:events,id',
            'event_category_id' => 'nullable|exists:event_categories,id',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->path);
            $data['path'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('status', 'Image updated');
    }

    public function destroy(GalleryImage $gallery)
    {
        Storage::disk('public')->delete($gallery->path);
        $gallery->delete();
        return back()->with('status', 'Image deleted');
    }
}
