@extends('admin.layout')
@section('title','Team')
@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
    <h1 class="text-xl font-semibold">Team</h1>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary text-center">Add Member</a>
</div>
<div class="panel overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50/90">
                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200/75">
                @foreach($members as $member)
                    <tr class="hover:bg-white/80 transition">
                        <td class="px-4 py-3 font-semibold whitespace-nowrap">{{ $member->name }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $member->role }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-ghost !py-1.5">Edit</a>
                                <form action="{{ route('admin.team.destroy', $member) }}" method="post" class="inline" onsubmit="return confirm('Delete member?')">
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
@endsection
