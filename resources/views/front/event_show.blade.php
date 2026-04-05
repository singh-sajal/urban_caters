@extends('layouts.front')

@section('content')
<section class="max-w-5xl mx-auto px-4 py-10">
    <div class="glass rounded-3xl overflow-hidden border border-white/10">
        <div class="h-72 bg-cover bg-center" style="background-image:url('{{ $event->hero_image ? asset('storage/'.$event->hero_image) : 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=1200&q=80' }}')"></div>
        <div class="p-6 space-y-3">
            <div class="text-cyan-200 text-xs uppercase">{{ $event->category->name ?? 'Signature Event' }}</div>
            <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
            <div class="text-slate-400 text-sm">{{ optional($event->event_date)->format('M d, Y') }} · {{ $event->location }}</div>
            <p class="text-slate-300">{{ $event->summary }}</p>
            <div class="prose prose-invert max-w-none">{!! nl2br(e($event->body)) !!}</div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-10">
    <h2 class="text-xl font-semibold mb-4">Gallery</h2>
    <div class="grid md:grid-cols-3 gap-4">
        @forelse($event->galleryImages as $img)
            <a href="{{ asset('storage/'.$img->path) }}" target="_blank" class="block rounded-xl overflow-hidden hover:opacity-90">
                <img src="{{ asset('storage/'.$img->path) }}" class="w-full h-48 object-cover" alt="{{ $img->title }}">
            </a>
        @empty
            <p class="text-slate-400">Images coming soon.</p>
        @endforelse
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 pb-16">
    <h2 class="text-xl font-semibold mb-3">Related events</h2>
    <div class="grid md:grid-cols-3 gap-4">
        @foreach($related as $item)
            <a href="{{ route('events.show', $item) }}" class="glass rounded-2xl border border-white/10 overflow-hidden">
                <div class="h-32 bg-cover bg-center" style="background-image:url('{{ $item->hero_image ? asset('storage/'.$item->hero_image) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=600&q=80' }}')"></div>
                <div class="p-3 text-sm">
                    <div class="font-semibold">{{ $item->title }}</div>
                    <div class="text-slate-400">{{ optional($item->event_date)->format('M d, Y') }}</div>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection
