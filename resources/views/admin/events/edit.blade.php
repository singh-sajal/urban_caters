@extends('admin.layout')
@section('title','Edit Event')
@section('content')
<form action="{{ route('admin.events.update', $event) }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-5">
    @csrf @method('put')
    @include('admin.events.partials.form')
    <button class="btn btn-primary">Update</button>
</form>
@endsection
