@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('تفاصيل المجموعة') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $group->name }}</h5>
                <p class="card-text">
                    <strong>{{ __('الكُتَّاب:') }}</strong> {{ $group->kutab->name }}
                </p>
                <p class="card-text">
                    <strong>{{ __('الجنس:') }}</strong> {{ $group->for_sex ? __('ذكر') : __('أنثى') }}
                </p>
                @if ($group->weekDay)
                    <p class="card-text">
                        <strong>{{ __('اليوم:') }}</strong> {{ $group->weekDay->name }}
                    </p>
                @endif
                @if ($group->hour !== null && $group->minute !== null)
                    <p class="card-text">
                        <strong>{{ __('الوقت:') }}</strong> {{ sprintf('%02d:%02d', $group->hour, $group->minute) }}
                    </p>
                @endif

                <div class="d-grid gap-2">
                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning mobile-button">{{ __('تعديل') }}</a>
                    <a href="{{ route('groups.index', ['kutab_id' => $group->kutab_id]) }}" class="btn btn-secondary mobile-button">{{ __('عودة إلى قائمة المجموعات') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
