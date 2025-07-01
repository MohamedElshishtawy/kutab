@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('تفاصيل الشيخ') }}</h1>

        <div class="card">
            <div class="card-body">
                @if ($sheikh->user)
                    <h5 class="card-title">{{ $sheikh->user->first_name }} {{ $sheikh->user->last_name }}</h5>
                    <p class="card-text">
                        <strong>{{ __('الهاتف:') }}</strong> {{ $sheikh->user->phone }}
                    </p>
                @else
                    <h5 class="card-title">{{ __('مستخدم غير مرتبط') }}</h5>
                @endif

                @if ($sheikh->groups->isNotEmpty())
                    <p class="card-text">
                        <strong>{{ __('المجموعات:') }}</strong>
                        @foreach ($sheikh->groups as $group)
                            <span class="badge bg-secondary">{{ $group->name }} ({{ $group->kutab->name }})</span>
                        @endforeach
                    </p>
                @else
                    <p class="card-text">{{ __('لا ينتمي إلى أي مجموعة حاليًا.') }}</p>
                @endif

                <div class="d-grid gap-2">
                    <a href="{{ route('sheikhs.edit', $sheikh->id) }}" class="btn btn-warning mobile-button">{{ __('تعديل') }}</a>
                    <a href="{{ route('sheikhs.index', ['group_id' => $sheikh->groups()->first()->id ?? null]) }}" class="btn btn-secondary mobile-button">{{ __('عودة إلى قائمة الشيوخ') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
