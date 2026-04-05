@extends('admin.layout')

@section('title','Dashboard')

@section('content')
<div class="grid md:grid-cols-3 gap-4">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="text-sm text-slate-500">Total events</div>
        <div class="text-2xl font-bold">{{ $stats['events'] }}</div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="text-sm text-slate-500">Messages</div>
        <div class="text-2xl font-bold">{{ $stats['messages'] }}</div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="text-sm text-slate-500">Gallery images</div>
        <div class="text-2xl font-bold">{{ $stats['images'] }}</div>
    </div>
</div>

<div class="mt-8 grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="font-semibold mb-3">Recent messages</div>
        <ul class="divide-y">
            @foreach($recentMessages as $msg)
                <li class="py-2 text-sm">
                    <div class="font-semibold">{{ $msg->name }}</div>
                    <div class="text-slate-500">{{ $msg->event_type }} · {{ $msg->created_at->diffForHumans() }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="font-semibold mb-3">Recent events</div>
        <ul class="divide-y">
            @foreach($recentEvents as $ev)
                <li class="py-2 text-sm">{{ $ev->title }} <span class="text-slate-500">{{ optional($ev->event_date)->format('M d, Y') }}</span></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
