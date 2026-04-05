@extends('admin.layout')
@section('title','Create Event')
@section('content')
<form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf
    @include('admin.events.partials.form')
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
