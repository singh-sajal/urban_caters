@extends('admin.layout')
@section('title','Upload Image')
@section('content')
<form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf
    <div>
        <label class="text-sm text-slate-600">Title</label>
        <input type="text" name="title" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-600">Event</label>
            <select name="event_id" class="mt-1 w-full px-4 py-3 border rounded-lg">
                <option value="">--</option>
                @foreach($events as $ev)
                    <option value="{{ $ev->id }}">{{ $ev->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-slate-600">Category</label>
            <select name="event_category_id" class="mt-1 w-full px-4 py-3 border rounded-lg">
                <option value="">--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <label class="text-sm text-slate-600">Image</label>
        <input type="file" name="image" required class="mt-1 w-full">
    </div>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Upload</button>
</form>
@endsection
