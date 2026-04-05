@extends('admin.layout')
@section('title','Messages')
@section('content')
<table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden text-sm">
    <thead class="bg-slate-50">
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Event Type</th>
            <th class="px-4 py-2">Date</th>
            <th class="px-4 py-2"></th>
        </tr>
    </thead>
    <tbody class="divide-y">
        @foreach($messages as $message)
            <tr>
                <td class="px-4 py-2">{{ $message->name }}</td>
                <td class="px-4 py-2">{{ $message->email }}</td>
                <td class="px-4 py-2">{{ $message->event_type }}</td>
                <td class="px-4 py-2">{{ $message->created_at->format('M d, Y') }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('admin.messages.show', $message) }}" class="text-indigo-600">View</a>
                    <form action="{{ route('admin.messages.destroy', $message) }}" method="post" class="inline" onsubmit="return confirm('Delete message?')">
                        @csrf @method('delete')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">{{ $messages->links() }}</div>
@endsection
