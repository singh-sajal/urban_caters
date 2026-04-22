@extends('admin.layout')
@section('title','Message')
@section('content')
<div class="panel p-5 sm:p-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="text-sm text-slate-500">From</div>
            <div class="text-lg font-semibold">{{ $message->name }}</div>
            <div class="text-slate-600 text-sm">{{ $message->email }}</div>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-ghost text-center">Back to messages</a>
    </div>

    <div class="mt-5 grid sm:grid-cols-2 gap-3 text-sm">
        <div class="glass rounded-xl p-3">
            <div class="text-slate-500">Phone</div>
            <div class="font-medium">{{ $message->phone ?: '-' }}</div>
        </div>
        <div class="glass rounded-xl p-3">
            <div class="text-slate-500">Event Type</div>
            <div class="font-medium">{{ $message->event_type ?: '-' }}</div>
        </div>
    </div>

    <div class="mt-5 border border-slate-200/80 bg-white/80 rounded-xl p-4 whitespace-pre-line leading-relaxed">{{ $message->message }}</div>
</div>
@endsection
