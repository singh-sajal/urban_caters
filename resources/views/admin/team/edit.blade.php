@extends('admin.layout')
@section('title','Edit Team Member')
@section('content')
<form action="{{ route('admin.team.update', $member) }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf @method('put')
    @include('admin.team.partials.form')
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
