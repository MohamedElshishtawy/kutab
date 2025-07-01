@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('إدارة المجموعات') }}</h1>

        @if (session('success'))
            <div class="alert alert-success text-center mb-3">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <form action="{{ route('groups.index') }}" method="GET" class="d-grid gap-1">
                <label for="kutab_id" class="form-label mb-0">{{ __('عرض مجموعات الكُتَّاب:') }}</label>
                <select class="form-select" id="kutab_id" name="kutab_id" onchange="this.form.submit()">
                    <option value="">{{ __('عرض جميع الكتاتيب') }}</option>
                    @foreach ($kutabs as $kutab)
                        <option value="{{ $kutab->id }}" {{ $currentKutab && $currentKutab->id == $kutab->id ? 'selected' : '' }}>
                            {{ $kutab->name }}
                        </option>
                    @endforeach
                </select>

            </form>
        </div>

        @if ($currentKutab)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $currentKutab->name }}</h2>
                    <a href="{{ route('groups.create', ['kutab_id' => request('kutab_id')]) }}" class="btn btn-success btn-sm mobile-button">
                        <i class="fa fa-plus"></i>
                        {{ __('إضافة مجموعة') }}
                    </a>
                </div>
                <div class="card-body">
                    @forelse ($groups as $group)
                        <div class="card mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title">{{ $group->name }}</h6>
                                    <small class="text-muted">
                                        @if ($group->for_sex)
                                            <i class="fa fa-male"></i>
                                            {{ __('للذكران') }}
                                        @else
                                            <i class="fa fa-female"></i>
                                            {{ __('للإناث') }}
                                        @endif
                                        @if ($group->weekDay)
                                            - {{ __('اليوم:') }} {{ $group->weekDay->name }}
                                        @endif
                                        @if ($group->hour !== null && $group->minute !== null)
                                            - {{ __('الوقت:') }} {{ sprintf('%02d:%02d', $group->hour, $group->minute) }}
                                        @endif
                                    </small>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary btn-sm mobile-button">
                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                    </a>
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mobile-button confirm-btn">
                                            <i class="fa fa-xmark"></i> {{ __('حذف') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">{{ __('لا توجد مجموعات لهذا الكُتَّاب حتى الآن.') }}</p>
                    @endforelse
                    {{ $groups->links() }}
                </div>
            </div>
        @else
            @forelse ($groups as $group)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ __('المجموعة:') }} {{ $group->name }} - {{ __('الكُتَّاب:') }} {{ $group->kutab->name }}
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                {{ __('الجنس:') }} {{ $group->for_sex ? __('ذكر') : __('أنثى') }}
                                @if ($group->weekDay)
                                    - {{ __('اليوم:') }} {{ $group->weekDay->name }}
                                @endif
                                @if ($group->hour !== null && $group->minute !== null)
                                    - {{ __('الوقت:') }} {{ sprintf('%02d:%02d', $group->hour, $group->minute) }}
                                @endif
                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary btn-sm mobile-button">
                                <i class="fa fa-edit"></i> {{ __('تعديل') }}
                            </a>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mobile-button confirm-btn">
                                    <i class="fa fa-xmark"></i> {{ __('حذف') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">{{ __('لا توجد مجموعات حتى الآن.') }}</p>
            @endforelse
            {{ $groups->links() }}
        @endif
    </div>
@endsection
