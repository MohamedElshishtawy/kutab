@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('تعديل بيانات المجموعة') }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kutab_id" class="form-label">{{ __('الكُتَّاب') }}</label>
                        <select class="form-select @error('kutab_id') is-invalid @enderror" id="kutab_id" name="kutab_id" required>
                            <option value="">{{ __('اختر الكُتَّاب') }}</option>
                            @foreach ($kutabs as $kutab)
                                <option value="{{ $kutab->id }}" {{ $group->kutab_id == $kutab->id ? 'selected' : '' }}>
                                    {{ $kutab->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('kutab_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('اسم المجموعة') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $group->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="for_sex" class="form-label">{{ __('الجنس') }}</label>
                        <select class="form-select @error('for_sex') is-invalid @enderror" id="for_sex" name="for_sex" required>
                            <option value="1" {{ $group->for_sex ? 'selected' : '' }}>{{ __('ذكر') }}</option>
                            <option value="0" {{ !$group->for_sex ? 'selected' : '' }}>{{ __('أنثى') }}</option>
                        </select>
                        @error('for_sex')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="week_day_id" class="form-label">{{ __('يوم الأسبوع (اختياري)') }}</label>
                        <select class="form-select @error('week_day_id') is-invalid @enderror" id="week_day_id" name="week_day_id">
                            <option value="">{{ __('اختر يومًا') }}</option>
                            @isset($weekDays)
                                @foreach ($weekDays as $weekDay)
                                    <option value="{{ $weekDay->id }}" {{ old('week_day_id', $group->week_day_id) == $weekDay->id ? 'selected' : '' }}>
                                        {{ $weekDay->name }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @error('week_day_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hour" class="form-label">{{ __('الساعة (اختياري)') }}</label>
                            <input type="number" class="form-control @error('hour') is-invalid @enderror" id="hour" name="hour" value="{{ old('hour', $group->hour) }}" min="0" max="23">
                            @error('hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="minute" class="form-label">{{ __('الدقيقة (اختياري)') }}</label>
                            <input type="number" class="form-control @error('minute') is-invalid @enderror" id="minute" name="minute" value="{{ old('minute', $group->minute) }}" min="0" max="59">
                            @error('minute')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mobile-button">{{ __('تحديث') }}</button>
                        <a href="{{ route('groups.index', ['kutab_id' => $group->kutab_id]) }}" class="btn btn-secondary mobile-button">{{ __('إلغاء') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
