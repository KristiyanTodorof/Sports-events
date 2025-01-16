@extends('layouts.app')

@section('title', 'Начало')
<style>
.shadow-hover {
    transition: all 0.3s ease;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card img {
    border-radius: 8px;
}
</style>

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold">Добре дошли в СпортАрена</h1>
            <p class="lead">Вашият надежден източник за информация за спортни събития в България</p>
            
            <div class="mt-4">
                @auth
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg me-2">Разгледай събития</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Вход</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Регистрация</a>
                @endauth
            </div>
        </div>
        <div class="col-md-6">
        <img src="{{ asset('images/logo.png') }}" alt="Sports" class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Features Section -->
    <div class="row py-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
                <h3 class="h5 card-title mb-3">Разнообразие от спортове</h3>
                <p class="card-text mb-4">Открийте събития от различни спортове на едно място</p>
            </div>
            <img src="{{ asset('images/variant.png') }}" class="card-img-bottom" alt="Разнообразие от спортове" style="height: 200px; object-fit: cover;">
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
                <h3 class="h5 card-title mb-3">Лесно търсене</h3>
                <p class="card-text mb-4">Филтрирайте събития по спорт, дата и организатор</p>
            </div>
            <img src="{{ asset('images/search.png') }}" class="card-img-bottom" alt="Лесно търсене" style="height: 200px; object-fit: cover;">
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center">
                <h3 class="h5 card-title mb-3">Актуална информация</h3>
                <p class="card-text mb-4">Винаги актуални данни за предстоящи събития</p>
            </div>
            <img src="{{ asset('images/information.png') }}" class="card-img-bottom" alt="Актуална информация" style="height: 200px; object-fit: cover;">
        </div>
    </div>
</div>

    <!-- Latest Events Section -->
    <div class="py-5">
        <h2 class="mb-4">Предстоящи събития</h2>
        <div class="row">
            @foreach($latestEvents ?? [] as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">
                                <strong>Дата:</strong> {{ $event->start_time->format('d.m.Y H:i') }}<br>
                                <strong>Спорт:</strong> {{ $event->sport->name }}
                            </p>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary">Детайли</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection