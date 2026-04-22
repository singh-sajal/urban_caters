@extends('admin.layout')
@section('title','Add Team Member')
@section('content')
<form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-5">
    @csrf
    @include('admin.team.partials.form')
    <button class="btn btn-primary">Save</button>
</form>
@endsection
