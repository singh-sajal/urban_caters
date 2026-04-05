<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">Title</label>
        <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" required class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div>
        <label class="text-sm text-slate-600">Category</label>
        <select name="event_category_id" class="mt-1 w-full px-4 py-3 border rounded-lg">
            <option value="">--</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('event_category_id', $event->event_category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="text-sm text-slate-600">Date</label>
        <input type="date" name="event_date" value="{{ old('event_date', optional($event->event_date ?? null)->format('Y-m-d')) }}" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
    <div>
        <label class="text-sm text-slate-600">Location</label>
        <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="mt-1 w-full px-4 py-3 border rounded-lg">
    </div>
</div>
<div>
    <label class="text-sm text-slate-600">Summary</label>
    <textarea name="summary" rows="3" class="mt-1 w-full px-4 py-3 border rounded-lg">{{ old('summary', $event->summary ?? '') }}</textarea>
</div>
<div>
    <label class="text-sm text-slate-600">Body</label>
    <textarea name="body" rows="5" class="mt-1 w-full px-4 py-3 border rounded-lg">{{ old('body', $event->body ?? '') }}</textarea>
</div>
<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="text-sm text-slate-600">Hero image</label>
        <input type="file" name="hero_image" class="mt-1 w-full">
        @if(!empty($event->hero_image))
            <img src="{{ asset('storage/'.$event->hero_image) }}" class="mt-2 h-24 rounded">
        @endif
    </div>
    <div class="flex items-center space-x-2 mt-6 md:mt-10">
        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $event->is_featured ?? false)) class="h-4 w-4">
        <label class="text-sm text-slate-700">Featured on homepage</label>
    </div>
</div>
@foreach ($errors->all() as $error)
    <p class="text-red-600 text-sm">{{ $error }}</p>
@endforeach
