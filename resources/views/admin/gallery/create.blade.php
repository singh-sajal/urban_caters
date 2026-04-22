@extends('admin.layout')
@section('title','Upload Image')
@section('content')
<form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-5">
    @csrf
    <div>
        <label class="text-sm text-slate-600">Title</label>
        <input type="text" name="title" class="field mt-1">
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="text-sm text-slate-600">Event</label>
            <select name="event_id" class="field mt-1">
                <option value="">--</option>
                @foreach($events as $ev)
                    <option value="{{ $ev->id }}">{{ $ev->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-sm text-slate-600">Category</label>
            <select name="event_category_id" class="field mt-1">
                <option value="">--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <label class="text-sm text-slate-600">Image</label>
        <input type="file" name="image" required class="field mt-1 !p-2">
    </div>
    <button class="btn btn-primary">Upload</button>
</form>
@endsection
