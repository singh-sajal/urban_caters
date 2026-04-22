@extends('admin.layout')
@section('title','Messages')
@section('content')
<div class="panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50/90">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Event Type</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200/75">
                @foreach($messages as $message)
                    <tr class="hover:bg-white/80 transition">
                        <td class="px-4 py-3 whitespace-nowrap">{{ $message->name }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $message->email }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $message->event_type ?: '-' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $message->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-ghost !py-1.5">View</a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="post" class="inline" onsubmit="return confirm('Delete message?')">
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
<div class="mt-4">{{ $messages->links() }}</div>
@endsection
