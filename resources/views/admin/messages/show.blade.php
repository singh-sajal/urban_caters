@extends('admin.layout')
@section('title','Message')
@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm space-y-2">
    <div class="text-sm text-slate-500">From</div>
    <div class="text-lg font-semibold">{{ $message->name }} ({{ $message->email }})</div>
    <div class="text-slate-500">Phone: {{ $message->phone }}</div>
    <div class="text-slate-500">Type: {{ $message->event_type }}</div>
    <div class="mt-4 whitespace-pre-line">{{ $message->message }}</div>
</div>
@endsection
