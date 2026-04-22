@extends('admin.layout')
@section('title','Edit Team Member')
@section('content')
<form action="{{ route('admin.team.update', $member) }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-5">
    @csrf @method('put')
    @include('admin.team.partials.form')
    <button class="btn btn-primary">Update</button>
</form>
@endsection
