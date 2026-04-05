@extends('layouts.front')

@section('content')
@php use Illuminate\Support\Str; @endphp
<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold">Our Events</h1>
            <p class="text-slate-400">Browse recent productions across categories.</p>
        </div>
        <form method="get" class="flex items-center gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-4 py-2 rounded-full bg-white/10 border border-white/10 focus:border-cyan-300 outline-none">
            <select name="category" class="px-3 py-2 rounded-full bg-white/10 border border-white/10 focus:border-cyan-300">
                <option value="">All</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" @selected(request('category') === $cat->slug)>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button class="gradient-btn px-4 py-2 rounded-full">Filter</button>
        </form>
    </div>

    <div class="grid md:grid-cols-3 gap-6 mt-8">
        @foreach($events as $event)
            <a href="{{ route('events.show', $event) }}" class="block glass rounded-2xl overflow-hidden border border-white/10 hover:border-cyan-300/60">
                <div class="h-48 bg-cover bg-center" style="background-image:url('{{ $event->hero_image ? asset('storage/'.$event->hero_image) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=900&q=80' }}')"></div>
                <div class="p-4 space-y-2">
                    <div class="text-cyan-200 text-xs uppercase">{{ $event->category->name ?? 'Event' }}</div>
                    <div class="text-lg font-semibold">{{ $event->title }}</div>
                    <div class="text-slate-400 text-sm">{{ optional($event->event_date)->format('M d, Y') }} · {{ $event->location }}</div>
                    <p class="text-slate-400 text-sm">{{ Str::limit($event->summary, 90) }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>
</section>
@endsection
