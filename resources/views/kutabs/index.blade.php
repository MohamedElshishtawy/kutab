@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">{{ __('الكتاتيب') }}</h1>

        @if (session('success'))
            <div class="alert alert-success text-center mb-3">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end   mb-3">
            <a href="{{ route('kutab.create') }}" class="btn btn-success mobile-button">
                <i class="fa fa-plus"></i>
                {{ __('إضافة كُتَّاب') }}
            </a>
        </div>

        @forelse ($kutabs as $kutab)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $kutab->name }}</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('kutab.edit', $kutab->id) }}" class="btn btn-primary mobile-button">
                            <i class="fa fa-edit"></i>
                            {{ __('تعديل') }}
                        </a>
                        <form action="{{ route('kutab.destroy', $kutab->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mobile-button confirm-btn">
                                <i class="fa fa-xmark"></i>
                                {{ __('حذف') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">{{ __('لا يوجد كتاتيب حتى الآن.') }}</p>
        @endforelse


    </div>

@endsection
