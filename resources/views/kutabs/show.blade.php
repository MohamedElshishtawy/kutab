@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('تفاصيل الكُتَّاب') }}</h1>

        <div class="mb-3">
            <strong>{{ __('الاسم:') }}</strong> {{ $kutab->name }}
        </div>

        <div class="mb-3">
            <strong>{{ __('الشيخ المسؤول:') }}</strong> {{ $kutab->superSheikh ? $kutab->superSheikh->first_name . ' ' . $kutab->superSheikh->last_name : __('لا يوجد') }}
        </div>

        <a href="{{ route('kutab.edit', $kutab->id) }}" class="btn btn-warning">{{ __('تعديل') }}</a>
        <a href="{{ route('kutab.index') }}" class="btn btn-secondary">{{ __('عودة') }}</a>
    </div>
@endsection
