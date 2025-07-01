@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('إدارة الشيوخ') }}</h1>

        @if (session('success'))
            <div class="alert alert-success text-center mb-3">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <form action="{{ route('sheikhs.index') }}" method="GET" class="d-grid align-items-center gap-2">
                <label for="group_id" class="form-label mb-0">{{ __('عرض شيوخ المجموعة:') }}</label>
                <select class="form-select" id="group_id" name="group_id" onchange="this.form.submit()">
                    <option value="">{{ __('عرض جميع الشيوخ') }}</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $currentGroup && $currentGroup->id == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>


            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>@if ($currentGroup){{ $currentGroup->name }}@else {{__('جميع المشايخ')}}@endif</h2>
                    <a href="{{ route('sheikhs.create', ['group_id' => request('group_id')]) }}" class="btn btn-success mobile-button">
                        <i class="fa fa-plus"></i>
                        {{ __('إضافة شيخ') }}
                    </a>
                </div>
                <div class="card-body">
                    @forelse ($sheikhs as $sheikh)
                        <div class="card mb-2">
                            <div class="card-body">
                                @if ($sheikh->user)
                                    <h5 class="card-title">
                                        @if($sheikh->user->sex) <i class="fa fa-user"></i> @else <i class="fa-solid fa-person-dress"></i> @endif
                                        {{ $sheikh->user->first_name }} {{ $sheikh->user->last_name }}
                                    </h5>
                                    <p class="card-text">
                                        <strong>{{ __('الهاتف:') }}</strong>
                                        {{ $sheikh->user->phone }}
                                        <a href="tel:{{ $sheikh->user->phone }}">
                                            <i class="fa fa-phone fa-sm"></i>
                                        </a>
                                    </p>
                                @else
                                    <h5 class="card-title">{{ __('مستخدم غير مرتبط') }}</h5>
                                @endif

                                <p class="card-text">
                                    <strong>{{ __('المجموعات:') }}</strong>
                                @if ($sheikh->groups->isNotEmpty())
                                    @foreach ($sheikh->groups as $group)
                                        <div class="d-flex align-items-center justify-content-start">
                                            <form action="{{ route('sheikh_groups.destroy') }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="sheikh_id" value="{{ $sheikh->id }}">
                                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm confirm-btn">
                                                    <i class="fa fa-xmark"></i>
                                                </button>
                                            </form>
                                            <span class="btn btn-secondary btn-sm">{{ $group->name }} ({{ $group->kutab->name }})</span>

                                        </div>
                                        @endforeach
                                        @else
                                            {{ __('لا ينتمي إلى أي مجموعة حاليًا.') }}
                                        @endif
                                        </p>

                                        <div class="d-flex gap-2 mt-3">
                                            <a href="{{ route('sheikhs.edit', $sheikh->id) }}" class="btn btn-primary btn-sm mobile-button">
                                                <i class="fa fa-edit"></i> {{ __('تعديل الشيخ') }}
                                            </a>
                                            <form action="{{ route('sheikhs.destroy', $sheikh->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mobile-button confirm-btn">
                                                    <i class="fa fa-trash"></i> {{ __('حذف الشيخ') }}
                                                </button>
                                            </form>
                                        </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">{{ __('لا يوجد شيوخ لهذه المجموعة حتى الآن.') }}</p>
                    @endforelse
                    {{ $sheikhs->links() }}
                </div>
            </div>
    </div>
@endsection
