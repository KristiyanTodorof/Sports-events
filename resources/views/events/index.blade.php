@extends('layouts.app')

@section('title', 'Спортни събития')

@section('content')
   <h1 class="mb-4">Спортни събития и прояви</h1>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Филтриране на събития</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('events.index') }}" method="GET" class="row g-3">
        <div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Търсене на събития</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('events.index') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label for="sport_id" class="form-label fw-bold">Избери спорт</label>
                <select name="sport_id" id="sport_id" class="form-select">
                    <option value="">Всички спортове</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}" {{ request('sport_id') == $sport->id ? 'selected' : '' }}>
                            {{ $sport->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="organizer_id" class="form-label fw-bold">Избери организатор</label>
                <select name="organizer_id" id="organizer_id" class="form-select">
                    <option value="">Всички организатори</option>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ request('organizer_id') == $organizer->id ? 'selected' : '' }}>
                            {{ $organizer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="date" class="form-label fw-bold">Избери дата</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="bi bi-search"></i> Търси
                </button>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Изчисти
                </a>
            </div>
        </form>
    </div>
</div>

    <div class="row g-4">
        @forelse($events as $event)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if($event->image_path)
                        <img src="{{ Storage::url($event->image_path) }}" class="card-img-top" alt="{{ $event->name }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <div class="mb-3">
                            <div class="text-muted">
                                <div class="mb-1">
                                    <i class="bi bi-calendar"></i>
                                    {{ $event->start_time->format('d.m.Y H:i') }}
                                </div>
                                <div class="mb-1">
                                    <i class="bi bi-clock"></i>
                                    {{ $event->duration }} минути
                                </div>
                                <div class="mb-1">
                                    <i class="bi bi-trophy"></i>
                                    {{ $event->sport->name }}
                                </div>
                                <div>
                                    <i class="bi bi-building"></i>
                                    {{ $event->organizer->name }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-primary w-100">Детайли</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Няма намерени събития.
                </div><div class="alert alert-info">
        <h4 class="alert-heading">Няма намерени събития</h4>
        <p>В момента няма събития, отговарящи на зададените критерии.</p>
    </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
    {{ $events->links('pagination::simple-bootstrap-5') }}
</div>
@endsection