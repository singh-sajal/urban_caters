@extends('layouts.front')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-8">
    <div>
        <h1 class="text-3xl font-bold">Plan with Eventora</h1>
        <p class="text-slate-300 mt-3">Tell us about your date, location, audience, and goals. We respond in under 24 hours.</p>
        <div class="mt-6 space-y-4 text-slate-300 text-sm">
            <div class="flex items-center space-x-3"><span class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Concept & design decks</span></div>
            <div class="flex items-center space-x-3"><span class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Vendor & artist sourcing</span></div>
            <div class="flex items-center space-x-3"><span class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Production timelines & onsite run-of-show</span></div>
        </div>
        <div class="mt-6">
            <iframe class="w-full h-64 rounded-2xl border border-white/10" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.9121460619956!2d72.83106047535976!3d19.06858285278912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c90e5555f349%3A0x9df9bc2d054b0220!2sBandra%20Kurla%20Complex%2C%20Bandra%20East%2C%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <div class="glass rounded-3xl p-6 border border-white/10">
        @if(session('status'))
            <div class="mb-4 p-3 rounded-xl bg-green-500/20 text-green-200">{{ session('status') }}</div>
        @endif
        <form action="{{ route('contact.submit') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm text-slate-400">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                @error('name')<p class="text-red-300 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-slate-400">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                    @error('email')<p class="text-red-300 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm text-slate-400">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                </div>
            </div>
            <div>
                <label class="text-sm text-slate-400">Event Type</label>
                <input type="text" name="event_type" value="{{ old('event_type') }}" class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
            </div>
            <div>
                <label class="text-sm text-slate-400">Message</label>
                <textarea name="message" rows="4" class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none" required>{{ old('message') }}</textarea>
                @error('message')<p class="text-red-300 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button class="w-full gradient-btn px-4 py-3 rounded-2xl font-semibold">Send message</button>
        </form>
    </div>
</section>
@endsection
