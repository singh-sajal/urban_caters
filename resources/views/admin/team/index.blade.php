@extends('admin.layout')
@section('title','Team')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-semibold">Team</h1>
    <a href="{{ route('admin.team.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Add Member</a>
</div>
<table class="min-w-full bg-white rounded-xl shadow-sm overflow-hidden text-sm">
    <thead class="bg-slate-50">
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2"></th>
        </tr>
    </thead>
    <tbody class="divide-y">
        @foreach($members as $member)
            <tr>
                <td class="px-4 py-2 font-semibold">{{ $member->name }}</td>
                <td class="px-4 py-2">{{ $member->role }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('admin.team.edit', $member) }}" class="text-indigo-600">Edit</a>
                    <form action="{{ route('admin.team.destroy', $member) }}" method="post" class="inline" onsubmit="return confirm('Delete member?')">
                        @csrf @method('delete')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
