@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('إنشاء مستخدم جديد') }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('sheikhs.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="first_name" class="form-label">{{ __('الاسم الأول') }}</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="last_name" class="form-label">{{ __('اسم العائلة') }}</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('رقم الهاتف') }}</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="123456" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="sex" class="form-label">{{ __('الجنس') }}</label>
                            <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="" disabled selected>{{ __('اختر الجنس') }}</option>
                                <option value="1" {{ old('sex') ? 'selected' : '' }}>{{ __('ذكر') }}</option>
                                <option value="2" {{ old('sex') == 0  ? 'selected' : '' }}>{{ __('أنثى') }}</option>
                            </select>
                            @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">{{ __('المجموعات') }}</label>
                        @isset($groups)
                            @foreach ($groups as $group)
                                <div class=" d-flex justify-content-start gap-2">
                                    <input class="form-check-input" type="checkbox" name="groups[]" id="group_{{ $group->id }}" value="{{ $group->id }}" {{ in_array($group->id, old('groups', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="group_{{ $group->id }}">
                                        {{ $group->name }} ({{ $group->kutab->name }})
                                    </label>
                                </div>
                            @endforeach
                        @endisset
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success mobile-button">{{ __('إنشاء') }}</button>
                        <a href="{{ route('sheikhs.index') }}" class="btn btn-secondary mobile-button">{{ __('إلغاء') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
