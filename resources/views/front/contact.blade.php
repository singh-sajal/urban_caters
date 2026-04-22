@extends('layouts.front')

@section('content')
    @php
        $waDigits = preg_replace('/\D+/', '', $siteSettings?->whatsapp_number ?? '');
        $waUrl = $waDigits ? 'https://wa.me/' . $waDigits : null;
    @endphp

    <section class="max-w-4xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-8">
        <div>
            <h1 class="text-3xl font-bold">Plan with Urban Caters</h1>
            <p class="text-slate-300 mt-3">Tell us about your date, location, audience, and goals. We respond in under 24
                hours.</p>
            <div class="mt-4 text-sm text-slate-300 space-y-1">
                <div><span class="font-semibold">Phone:</span> {{ $siteSettings?->contact_phone ?: '+1 (555) 123-4400' }}
                </div>
                @if (!empty($siteSettings?->whatsapp_number))
                    <div><span class="font-semibold">WhatsApp:</span> {{ $siteSettings->whatsapp_number }}</div>
                @endif
                <div><span class="font-semibold">Email:</span> {{ $siteSettings?->contact_email ?: 'hello@urbancaters.test' }}
                </div>
                <div><span class="font-semibold">Address:</span>
                    {{ $siteSettings?->contact_address ?: 'Mumbai - Remote worldwide' }}</div>
            </div>
            @if ($waUrl)
                <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex mt-4 items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-400/40 hover:bg-emerald-500/30">
                    <span>Chat on WhatsApp</span>
                </a>
            @endif
            <div class="mt-6 space-y-4 text-slate-300 text-sm">
                <div class="flex items-center space-x-3"><span class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Concept
                        & design decks</span></div>
                <div class="flex items-center space-x-3"><span class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Vendor
                        & artist sourcing</span></div>
                <div class="flex items-center space-x-3"><span
                        class="w-2 h-2 rounded-full bg-cyan-300"></span><span>Production timelines & onsite
                        run-of-show</span></div>
            </div>
            <div class="mt-6">
                <iframe class="w-full h-64 rounded-2xl border border-white/10"
                    src="https://www.google.com/maps?q=Rishikesh,Uttarakhand&output=embed" allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <div class="glass rounded-3xl p-6 border border-white/10">
            @if (session('status'))
                <div class="mb-4 p-3 rounded-xl bg-green-500/20 text-green-200">{{ session('status') }}</div>
            @endif
            <form action="{{ route('contact.submit') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm text-slate-400">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                    @error('name')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-slate-400">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                        @error('email')
                            <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                    </div>
                </div>
                <div>
                    <label class="text-sm text-slate-400">Event Type</label>
                    <input type="text" name="event_type" value="{{ old('event_type') }}"
                        class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
                </div>
                <div>
                    <label class="text-sm text-slate-400">Message</label>
                    <textarea name="message" rows="4"
                        class="mt-1 w-full px-4 py-3 rounded-2xl bg-white/10 border border-white/10 focus:border-cyan-300 outline-none"
                        required>{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button class="w-full gradient-btn px-4 py-3 rounded-2xl font-semibold">Send message</button>
            </form>
        </div>
    </section>
@endsection
