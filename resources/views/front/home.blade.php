@extends('layouts.front')

@section('content')
@php
    $heroHeading = $siteSettings?->hero_main_heading ?: 'Designing elevated events that feel effortless.';
    $heroSubHeading = $siteSettings?->hero_sub_heading ?: 'We blend production, hospitality, and storytelling to craft weddings, corporate offsites, and experiential launches your guests remember.';
    $heroImage = !empty($siteSettings?->hero_image)
        ? asset('storage/'.$siteSettings->hero_image)
        : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=900&q=80';
@endphp

<section class="relative overflow-hidden">
    <div class="absolute inset-0 opacity-40" style="background: radial-gradient(circle at 20% 20%, rgba(138,92,246,0.25), transparent 25%), radial-gradient(circle at 80% 0%, rgba(0,194,255,0.2), transparent 30%), radial-gradient(circle at 50% 80%, rgba(255,255,255,0.06), transparent 30%);"></div>
    <div class="max-w-6xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-12 items-center relative z-10">
        <div>
            <p class="text-cyan-200 uppercase text-xs tracking-[0.3em]">Event Experience Studio</p>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mt-4">{{ $heroHeading }}</h1>
            <p class="text-slate-300 mt-4 text-lg">{{ $heroSubHeading }}</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="/contact" class="gradient-btn px-6 py-3 rounded-full font-semibold">Book an Event</a>
                <a href="/events" class="px-6 py-3 rounded-full border border-white/20 hover:border-white/50">View Our Work</a>
            </div>
            <div class="mt-8 flex items-center space-x-6 text-sm text-slate-400">
                <div><span class="text-white font-bold">150+</span> curated events</div>
                <div><span class="text-white font-bold">10yr</span> average experience</div>
                <div><span class="text-white font-bold">4.9/5</span> client rating</div>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -inset-4 bg-gradient-to-br from-cyan-500/30 to-purple-500/20 blur-3xl"></div>
            <div class="relative glass rounded-3xl p-4 border border-white/10 shadow-2xl">
                <img src="{{ $heroImage }}" alt="Hero event" class="rounded-2xl shadow-lg">
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-12" id="services">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Services crafted for impact</h2>
        <a href="/contact" class="text-cyan-300 text-sm">Plan with us ?</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach ([['Weddings','Tailored celebrations with couture aesthetics'],['Corporate','Offsites, townhalls, retreats with white-glove logistics'],['Concerts','Stage, lighting & artist hospitality turnkey']] as [$title,$desc])
            <div class="glass rounded-2xl p-5 border border-white/10 hover:border-cyan-300/50 transition">
                <div class="text-cyan-200 text-sm uppercase tracking-wide">{{ $title }}</div>
                <p class="text-lg font-semibold mt-2">{{ $desc }}</p>
                <p class="text-slate-400 mt-2 text-sm">Full-stack planning, vendor management, design direction, and onsite production.</p>
            </div>
        @endforeach
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-12" id="featured">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Featured moments</h2>
        <a href="/events" class="text-cyan-300 text-sm">View gallery ?</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($featuredEvents as $event)
            <a href="{{ route('events.show', $event) }}" class="block group glass rounded-2xl overflow-hidden border border-white/10 hover:border-cyan-300/60">
                <div class="h-48 bg-cover bg-center" style="background-image:url('{{ $event->hero_image ? asset('storage/'.$event->hero_image) : 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=900&q=80' }}')"></div>
                <div class="p-4 space-y-2">
                    <div class="text-cyan-200 text-xs uppercase">{{ $event->category->name ?? 'Signature' }}</div>
                    <div class="text-lg font-semibold group-hover:text-white">{{ $event->title }}</div>
                    <div class="text-slate-400 text-sm">{{ optional($event->event_date)->format('M d, Y') }} � {{ $event->location }}</div>
                </div>
            </a>
        @empty
            <p class="text-slate-400">No featured events yet.</p>
        @endforelse
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-6 items-center">
    <div>
        <h3 class="text-2xl font-bold">What clients feel working with us</h3>
        <p class="text-slate-300 mt-3">�They anticipated everything before we even asked. Our leadership offsite felt cinematic.�</p>
        <div class="mt-4 text-slate-400 text-sm">� Priya N., COO, Fintech Unicorn</div>
    </div>
    <div class="glass rounded-2xl p-6 border border-white/10">
        <div class="text-lg font-semibold">Snapshot metrics</div>
        <div class="mt-4 grid grid-cols-2 gap-4 text-center">
            <div class="p-4 rounded-xl bg-white/5">
                <div class="text-3xl font-bold">{{ $siteSettings?->metric_one_value ?: '150+' }}</div>
                <div class="text-slate-400 text-sm">{{ $siteSettings?->metric_one_label ?: 'Events delivered' }}</div>
            </div>
            <div class="p-4 rounded-xl bg-white/5">
                <div class="text-3xl font-bold">{{ $siteSettings?->metric_two_value ?: '500+' }}</div>
                <div class="text-slate-400 text-sm">{{ $siteSettings?->metric_two_label ?: 'Happy guests' }}</div>
            </div>
            <div class="p-4 rounded-xl bg-white/5">
                <div class="text-3xl font-bold">{{ $siteSettings?->metric_three_value ?: '10' }}</div>
                <div class="text-slate-400 text-sm">{{ $siteSettings?->metric_three_label ?: 'Years in craft' }}</div>
            </div>
            <div class="p-4 rounded-xl bg-white/5">
                <div class="text-3xl font-bold">{{ $siteSettings?->metric_four_value ?: '24/7' }}</div>
                <div class="text-slate-400 text-sm">{{ $siteSettings?->metric_four_label ?: 'Onsite support' }}</div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="glass rounded-3xl p-8 md:p-10 border border-white/10 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <div class="text-sm uppercase text-cyan-200">Ready to start?</div>
            <div class="text-2xl font-bold">Let's blueprint your next experience</div>
            <p class="text-slate-300 mt-2">Share your date, location, and vibe�we'll craft a tailored concept within 24 hours.</p>
        </div>
        <a href="/contact" class="gradient-btn px-6 py-3 rounded-full font-semibold mt-4 md:mt-0">Talk to a producer</a>
    </div>
</section>
@endsection
