@extends('admin.layout')
@section('title','Gallery')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-semibold">Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Upload</a>
</div>
<table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden text-sm">
    <thead class="bg-slate-50">
        <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Event</th>
            <th class="px-4 py-2"></th>
        </tr>
    </thead>
    <tbody class="divide-y">
        @foreach($images as $img)
            <tr>
                <td class="px-4 py-2">{{ $img->title }}</td>
                <td class="px-4 py-2">{{ $img->category->name ?? '-' }}</td>
                <td class="px-4 py-2">{{ $img->event->title ?? '-' }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('admin.gallery.edit', $img) }}" class="text-indigo-600">Edit</a>
                    <form action="{{ route('admin.gallery.destroy', $img) }}" method="post" class="inline" onsubmit="return confirm('Delete image?')">
                        @csrf @method('delete')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">{{ $images->links() }}</div>
@endsection
