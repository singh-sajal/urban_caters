@extends('admin.layout')
@section('title','Events')
@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
    <h1 class="text-xl font-semibold">Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary text-center">Add Event</a>
</div>
<div class="panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50/90 text-left">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Featured</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200/75">
                @foreach($events as $event)
                    <tr class="hover:bg-white/80 transition">
                        <td class="px-4 py-3 font-semibold whitespace-nowrap">{{ $event->title }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $event->category->name ?? '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ optional($event->event_date)->format('M d, Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $event->is_featured ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $event->is_featured ? 'Yes' : 'No' }}</span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-ghost !py-1.5">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="post" class="inline" onsubmit="return confirm('Delete event?')">
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
<div class="mt-4">{{ $events->links() }}</div>
@endsection
