<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">Name</label>
        <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" required class="field mt-1">
    </div>
    <div>
        <label class="text-sm text-slate-600">Role</label>
        <input type="text" name="role" value="{{ old('role', $member->role ?? '') }}" required class="field mt-1">
    </div>
</div>
<div>
    <label class="text-sm text-slate-600">Bio</label>
    <textarea name="bio" rows="4" class="field mt-1">{{ old('bio', $member->bio ?? '') }}</textarea>
</div>
<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">LinkedIn</label>
        <input type="url" name="linkedin" value="{{ old('linkedin', $member->linkedin ?? '') }}" class="field mt-1">
    </div>
    <div>
        <label class="text-sm text-slate-600">Twitter</label>
        <input type="url" name="twitter" value="{{ old('twitter', $member->twitter ?? '') }}" class="field mt-1">
    </div>
</div>
<div>
    <label class="text-sm text-slate-600">Photo</label>
    <input type="file" name="photo" class="field mt-1 !p-2">
    @if(!empty($member->photo))
        <img src="{{ asset('storage/'.$member->photo) }}" class="mt-2 h-20 rounded-lg border border-slate-200">
    @endif
</div>
@foreach ($errors->all() as $error)
    <p class="text-red-600 text-sm">{{ $error }}</p>
@endforeach
