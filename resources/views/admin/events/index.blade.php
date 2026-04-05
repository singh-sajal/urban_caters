@extends('admin.layout')
@section('title','Events')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-semibold">Events</h1>
    <a href="{{ route('admin.events.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Add Event</a>
</div>
<table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden">
    <thead class="bg-slate-50 text-left text-sm">
        <tr>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2">Featured</th>
            <th class="px-4 py-2"></th>
        </tr>
    </thead>
    <tbody class="text-sm divide-y">
        @foreach($events as $event)
            <tr>
                <td class="px-4 py-2 font-semibold">{{ $event->title }}</td>
                <td class="px-4 py-2">{{ $event->category->name ?? '-' }}</td>
                <td class="px-4 py-2">{{ optional($event->event_date)->format('M d, Y') }}</td>
                <td class="px-4 py-2">{{ $event->is_featured ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('admin.events.edit', $event) }}" class="text-indigo-600">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="post" class="inline" onsubmit="return confirm('Delete event?')">
                        @csrf @method('delete')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">{{ $events->links() }}</div>
@endsection
