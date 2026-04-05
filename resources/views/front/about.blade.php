@extends('layouts.front')

@section('content')
@php use Illuminate\Support\Str; @endphp
<section class="max-w-5xl mx-auto px-4 py-10">
    <div class="glass rounded-3xl p-8 border border-white/10">
        <div class="text-cyan-200 text-xs uppercase tracking-[0.3em]">About Us</div>
        <h1 class="text-3xl font-bold mt-3">Eventora is a boutique team of producers, designers, and technologists.</h1>
        <p class="text-slate-300 mt-3">We operate as your embedded event squad—balancing budget discipline with imaginative staging, environmental design, and guest journeys.</p>
        <div class="grid md:grid-cols-4 gap-4 mt-6">
            <div class="p-4 rounded-2xl bg-white/5 text-center">
                <div class="text-3xl font-bold">{{ $eventCount }}</div>
                <div class="text-slate-400 text-sm">Events delivered</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 text-center">
                <div class="text-3xl font-bold">{{ $clientCount }}</div>
                <div class="text-slate-400 text-sm">Clients partnered</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 text-center">
                <div class="text-3xl font-bold">{{ $years }}+</div>
                <div class="text-slate-400 text-sm">Years experience</div>
            </div>
            <div class="p-4 rounded-2xl bg-white/5 text-center">
                <div class="text-3xl font-bold">4.9</div>
                <div class="text-slate-400 text-sm">Satisfaction score</div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-10">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Meet the team</h2>
        <span class="text-slate-400 text-sm">Humans behind the scenes</span>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @forelse($team as $member)
            <div class="glass rounded-2xl p-5 border border-white/10">
                <img src="{{ $member->photo ? asset('storage/'.$member->photo) : 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=80' }}" class="w-full h-48 object-cover rounded-xl" alt="{{ $member->name }}">
                <div class="mt-3 text-lg font-semibold">{{ $member->name }}</div>
                <div class="text-cyan-200 text-sm">{{ $member->role }}</div>
                <p class="text-slate-400 text-sm mt-2">{{ Str::limit($member->bio, 100) }}</p>
                <div class="mt-3 flex space-x-3 text-sm text-cyan-200">
                    @if($member->linkedin)<a href="{{ $member->linkedin }}" target="_blank">LinkedIn</a>@endif
                    @if($member->twitter)<a href="{{ $member->twitter }}" target="_blank">Twitter</a>@endif
                </div>
            </div>
        @empty
            <p class="text-slate-400">Add team members from admin to showcase your crew.</p>
        @endforelse
    </div>
</section>
@endsection
