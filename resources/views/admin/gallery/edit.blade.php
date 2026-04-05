@extends('admin.layout')
@section('title','Edit Image')
@section('content')
<form action="{{ route('admin.gallery.update', $image) }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf @method('put')
    <div>
        <label class="text-sm text-slate-600">Title</label>
        <input type="text" name="title" value="{{ old('title', $image->title) }}" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-600">Event</label>
            <select name="event_id" class="mt-1 w-full px-4 py-3 border rounded-lg">
                <option value="">--</option>
                @foreach($events as $ev)
                    <option value="{{ $ev->id }}" @selected($image->event_id == $ev->id)>{{ $ev->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-slate-600">Category</label>
            <select name="event_category_id" class="mt-1 w-full px-4 py-3 border rounded-lg">
                <option value="">--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($image->event_category_id == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <label class="text-sm text-slate-600">Replace image</label>
        <input type="file" name="image" class="mt-1 w-full">
        <img src="{{ asset('storage/'.$image->path) }}" class="mt-2 h-24 rounded">
    </div>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
