@extends('admin.layout')
@section('title','Create Event')
@section('content')
<form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-5">
    @csrf
    @include('admin.events.partials.form')
    <button class="btn btn-primary">Save</button>
</form>
@endsection
