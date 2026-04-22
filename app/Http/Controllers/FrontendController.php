<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\GalleryImage;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class FrontendController extends Controller
{
    public function index()
    {
        $featuredEvents = Event::with('category')->where('is_featured', true)->latest()->take(3)->get();
        $categories = EventCategory::withCount('events')->get();
        $gallery = GalleryImage::latest()->take(8)->get();

        return view('front.home', compact('featuredEvents', 'categories', 'gallery'));
    }

    public function about()
    {
        $team = TeamMember::all();
        $eventCount = Event::count();
        $clientCount = ContactMessage::count();
        $years = 10; // could be dynamic

        return view('front.about', compact('team', 'eventCount', 'clientCount', 'years'));
    }

    public function events(Request $request)
    {
        $categories = EventCategory::all();
        $query = Event::with('category')->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->get('category'));
            });
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->get('search') . '%');
        }

        $events = $query->paginate(9)->withQueryString();

        return view('front.events', compact('events', 'categories'));
    }

    public function showEvent(Event $event)
    {
        $event->load('galleryImages', 'category');
        $related = Event::where('event_category_id', $event->event_category_id)
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('front.event_show', compact('event', 'related'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:30',
            'event_type' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        $recipient = config('mail.from.address');

        if (is_string($recipient) && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            try {
                Mail::raw('New contact message from ' . $message->name . "\n" . $message->message, function ($mail) use ($message, $recipient) {
                    $mail->to($recipient)
                        ->subject('New event inquiry: ' . Str::limit($message->event_type ?? 'General', 40));
                });
            } catch (Throwable $e) {
                Log::warning('Contact message stored but notification email failed to send.', [
                    'contact_message_id' => $message->id,
                    'error' => $e->getMessage(),
                ]);
            }
        } else {
            Log::warning('Contact message stored but notification email skipped due to invalid recipient address.', [
                'contact_message_id' => $message->id,
                'recipient' => $recipient,
            ]);
        }

        return back()->with('status', 'Thanks! Your message has been sent.');
    }
}
