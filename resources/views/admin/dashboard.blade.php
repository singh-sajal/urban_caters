@extends('admin.layout')

@section('title','Dashboard')

@section('content')
<div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
    <div class="panel p-5">
        <div class="text-sm text-slate-500">Total events</div>
        <div class="text-3xl font-bold mt-1">{{ $stats['events'] }}</div>
    </div>
    <div class="panel p-5">
        <div class="text-sm text-slate-500">Messages</div>
        <div class="text-3xl font-bold mt-1">{{ $stats['messages'] }}</div>
    </div>
    <div class="panel p-5 sm:col-span-2 xl:col-span-1">
        <div class="text-sm text-slate-500">Gallery images</div>
        <div class="text-3xl font-bold mt-1">{{ $stats['images'] }}</div>
    </div>
</div>

<div class="mt-8 grid md:grid-cols-2 gap-6">
    <div class="panel p-5">
        <div class="font-semibold mb-3">Recent messages</div>
        <ul class="divide-y divide-slate-200/80">
            @foreach($recentMessages as $msg)
                <li class="py-3 text-sm">
                    <div class="font-semibold">{{ $msg->name }}</div>
                    <div class="text-slate-500">{{ $msg->event_type }} - {{ $msg->created_at->diffForHumans() }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="panel p-5">
        <div class="font-semibold mb-3">Recent events</div>
        <ul class="divide-y divide-slate-200/80">
            @foreach($recentEvents as $ev)
                <li class="py-3 text-sm flex items-center justify-between gap-3">
                    <span class="font-medium">{{ $ev->title }}</span>
                    <span class="text-slate-500 whitespace-nowrap">{{ optional($ev->event_date)->format('M d, Y') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
