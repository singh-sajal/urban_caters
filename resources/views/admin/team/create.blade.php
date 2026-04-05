@extends('admin.layout')
@section('title','Add Team Member')
@section('content')
<form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm space-y-4">
    @csrf
    @include('admin.team.partials.form')
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
