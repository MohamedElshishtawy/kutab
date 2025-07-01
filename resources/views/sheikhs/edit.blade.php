@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('تعديل بيانات الشيخ') }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('sheikhs.update', $sheikh->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="first_name" class="form-label">{{ __('الاسم الأول') }}</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $sheikh->user->first_name ?? '') }}" required>
                            @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="last_name" class="form-label">{{ __('اسم العائلة') }}</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $sheikh->user->last_name ?? '') }}" required>
                            @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('رقم الهاتف') }}</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $sheikh->user->phone ?? '') }}" required>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('اترك الحقل فارغًا لعدم التغيير') }}">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="sex" class="form-label">{{ __('الجنس') }}</label>
                            <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="" disabled >{{ __('اختر الجنس') }}</option>
                                <option value="1" {{ old('sex', $sheikh->user->sex ?? '') == '1' ? 'selected' : '' }}>{{ __('ذكر') }}</option>
                                <option value="2" {{ old('sex', $sheikh->user->sex ?? '') == '2' ? 'selected' : '' }}>{{ __('أنثى') }}</option>
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
                                    <input class="form-check-input" type="checkbox" name="groups[]" id="group_{{ $group->id }}" value="{{ $group->id }}" {{ in_array($group->id, old('groups', $sheikh->groups->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="group_{{ $group->id }}">
                                        {{ $group->name }} ({{ $group->kutab->name }})
                                    </label>
                                </div>
                            @endforeach
                        @endisset
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary mobile-button">{{ __('تحديث') }}</button>
                        <a href="{{ route('sheikhs.index') }}" class="btn btn-secondary mobile-button">{{ __('إلغاء') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
