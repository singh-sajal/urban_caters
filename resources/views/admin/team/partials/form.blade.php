<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">Name</label>
        <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" required class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div>
        <label class="text-sm text-slate-600">Role</label>
        <input type="text" name="role" value="{{ old('role', $member->role ?? '') }}" required class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
</div>
<div>
    <label class="text-sm text-slate-600">Bio</label>
    <textarea name="bio" rows="4" class="mt-1 w-full px-4 py-3 border rounded-lg">{{ old('bio', $member->bio ?? '') }}</textarea>
</div>
<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">LinkedIn</label>
        <input type="url" name="linkedin" value="{{ old('linkedin', $member->linkedin ?? '') }}" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div>
        <label class="text-sm text-slate-600">Twitter</label>
        <input type="url" name="twitter" value="{{ old('twitter', $member->twitter ?? '') }}" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
</div>
<div>
    <label class="text-sm text-slate-600">Photo</label>
    <input type="file" name="photo" class="mt-1 w-full">
    @if(!empty($member->photo))
        <img src="{{ asset('storage/'.$member->photo) }}" class="mt-2 h-20 rounded">
    @endif
</div>
@foreach ($errors->all() as $error)
    <p class="text-red-600 text-sm">{{ $error }}</p>
@endforeach
