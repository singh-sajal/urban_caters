@extends('admin.layout')
@section('title','Gallery')
@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
    <h1 class="text-xl font-semibold">Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary text-center">Upload</a>
</div>
<div class="panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50/90">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Event</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200/75">
                @foreach($images as $img)
                    <tr class="hover:bg-white/80 transition">
                        <td class="px-4 py-3 whitespace-nowrap">{{ $img->title }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $img->category->name ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $img->event->title ?? '-' }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.gallery.edit', $img) }}" class="btn btn-ghost !py-1.5">Edit</a>
                                <form action="{{ route('admin.gallery.destroy', $img) }}" method="post" class="inline" onsubmit="return confirm('Delete image?')">
                                    @csrf @method('delete')
                                    <button class="btn btn-danger !py-1.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">{{ $images->links() }}</div>
@endsection
