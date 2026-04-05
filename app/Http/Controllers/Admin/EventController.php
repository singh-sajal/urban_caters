<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->latest()->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $categories = EventCategory::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'event_category_id' => 'nullable|exists:event_categories,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'body' => 'nullable|string',
            'hero_image' => 'nullable|image|max:4096',
            'is_featured' => 'nullable|boolean'
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('events', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');

        Event::create($data);
        return redirect()->route('admin.events.index')->with('status', 'Event created');
    }

    public function edit(Event $event)
    {
        $categories = EventCategory::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'event_category_id' => 'nullable|exists:event_categories,id',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'body' => 'nullable|string',
            'hero_image' => 'nullable|image|max:4096',
            'is_featured' => 'nullable|boolean'
        ]);

        if ($request->hasFile('hero_image')) {
            if ($event->hero_image) {
                Storage::disk('public')->delete($event->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('events', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');

        $event->update($data);
        return redirect()->route('admin.events.index')->with('status', 'Event updated');
    }

    public function destroy(Event $event)
    {
        if ($event->hero_image) {
            Storage::disk('public')->delete($event->hero_image);
        }
        $event->delete();
        return back()->with('status', 'Event deleted');
    }
}
