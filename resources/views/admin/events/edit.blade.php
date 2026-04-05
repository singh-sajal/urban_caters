@extends('admin.layout')
@section('title','Edit Event')
@section('content')
<form action="{{ route('admin.events.update', $event) }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf @method('put')
    @include('admin.events.partials.form')
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
