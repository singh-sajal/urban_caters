@extends('admin.layout')
@section('title','Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data" class="panel p-5 sm:p-6 space-y-6">
    @csrf
    @method('put')

    <div>
        <h2 class="text-lg font-semibold">Branding</h2>
        <p class="text-sm text-slate-500">Update logo assets shown on frontend and admin pages.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-4">
        <div>
            <label class="text-sm text-slate-600">Logo</label>
            <input type="file" name="logo" class="field mt-1 !p-2">
            @if(!empty($settings->logo))
                <img src="{{ asset('storage/'.$settings->logo) }}" alt="Logo" class="mt-2 h-16 rounded-lg border border-slate-200/80">
            @endif
        </div>
        <div>
            <label class="text-sm text-slate-600">Short Logo</label>
            <input type="file" name="short_logo" class="field mt-1 !p-2">
            @if(!empty($settings->short_logo))
                <img src="{{ asset('storage/'.$settings->short_logo) }}" alt="Short Logo" class="mt-2 h-16 rounded-lg border border-slate-200/80">
            @endif
        </div>
        <div>
            <label class="text-sm text-slate-600">Hero Section Image</label>
            <input type="file" name="hero_image" class="field mt-1 !p-2">
            @if(!empty($settings->hero_image))
                <img src="{{ asset('storage/'.$settings->hero_image) }}" alt="Hero" class="mt-2 h-16 rounded-lg border border-slate-200/80">
            @endif
        </div>
    </div>

    <div>
        <h2 class="text-lg font-semibold">Hero Content</h2>
        <div class="grid md:grid-cols-2 gap-4 mt-3">
            <div>
                <label class="text-sm text-slate-600">Main Heading</label>
                <input type="text" name="hero_main_heading" value="{{ old('hero_main_heading', $settings->hero_main_heading) }}" class="field mt-1">
            </div>
            <div>
                <label class="text-sm text-slate-600">Sub Heading</label>
                <textarea name="hero_sub_heading" rows="3" class="field mt-1">{{ old('hero_sub_heading', $settings->hero_sub_heading) }}</textarea>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-lg font-semibold">Snapshot Metrics</h2>
        <div class="grid md:grid-cols-2 gap-4 mt-3">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-slate-600">Metric 1 Value</label>
                    <input type="text" name="metric_one_value" value="{{ old('metric_one_value', $settings->metric_one_value) }}" class="field mt-1">
                </div>
                <div>
                    <label class="text-sm text-slate-600">Metric 1 Label</label>
                    <input type="text" name="metric_one_label" value="{{ old('metric_one_label', $settings->metric_one_label) }}" class="field mt-1">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-slate-600">Metric 2 Value</label>
                    <input type="text" name="metric_two_value" value="{{ old('metric_two_value', $settings->metric_two_value) }}" class="field mt-1">
                </div>
                <div>
                    <label class="text-sm text-slate-600">Metric 2 Label</label>
                    <input type="text" name="metric_two_label" value="{{ old('metric_two_label', $settings->metric_two_label) }}" class="field mt-1">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-slate-600">Metric 3 Value</label>
                    <input type="text" name="metric_three_value" value="{{ old('metric_three_value', $settings->metric_three_value) }}" class="field mt-1">
                </div>
                <div>
                    <label class="text-sm text-slate-600">Metric 3 Label</label>
                    <input type="text" name="metric_three_label" value="{{ old('metric_three_label', $settings->metric_three_label) }}" class="field mt-1">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-sm text-slate-600">Metric 4 Value</label>
                    <input type="text" name="metric_four_value" value="{{ old('metric_four_value', $settings->metric_four_value) }}" class="field mt-1">
                </div>
                <div>
                    <label class="text-sm text-slate-600">Metric 4 Label</label>
                    <input type="text" name="metric_four_label" value="{{ old('metric_four_label', $settings->metric_four_label) }}" class="field mt-1">
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-lg font-semibold">Contact Information</h2>
        <div class="grid md:grid-cols-4 gap-4 mt-3">
            <div>
                <label class="text-sm text-slate-600">Contact Number</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" class="field mt-1">
            </div>
            <div>
                <label class="text-sm text-slate-600">WhatsApp Number</label>
                <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" class="field mt-1" placeholder="e.g. +15551234400">
            </div>
            <div>
                <label class="text-sm text-slate-600">Contact Email</label>
                <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" class="field mt-1">
            </div>
            <div>
                <label class="text-sm text-slate-600">Address</label>
                <input type="text" name="contact_address" value="{{ old('contact_address', $settings->contact_address) }}" class="field mt-1">
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-lg font-semibold">About Us Section</h2>
        <div class="grid md:grid-cols-2 gap-4 mt-3">
            <div>
                <label class="text-sm text-slate-600">About Heading</label>
                <input type="text" name="about_heading" value="{{ old('about_heading', $settings->about_heading) }}" class="field mt-1">
            </div>
            <div>
                <label class="text-sm text-slate-600">About Content</label>
                <textarea name="about_content" rows="4" class="field mt-1">{{ old('about_content', $settings->about_content) }}</textarea>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="rounded-lg border border-red-300 bg-red-50 text-red-700 p-3 text-sm">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <button class="btn btn-primary">Save Settings</button>
</form>
@endsection
