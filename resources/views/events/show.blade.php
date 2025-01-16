@extends('layouts.app')

@section('title', $event->name)

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if($event->image_path)
                <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->name }}" class="img-fluid rounded mb-4">
            @endif

            <h1>{{ $event->name }}</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Детайли за събитието</h5>
                        <p class="mb-0">
                            <strong>Дата и час:</strong> {{ $event->start_time->format('d.m.Y H:i') }}<br>
                            <strong>Продължителност:</strong> {{ $event->duration }} минути<br>
                            <strong>Спорт:</strong> {{ $event->sport->name }}
                        </p>
                    </div>

                    @if($event->description)
                        <div class="mb-0">
                            <h5>Описание</h5>
                            <p class="mb-0">{{ $event->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Информация за организатора</h5>
                    <p class="mb-0">
                        <strong>Име:</strong> {{ $event->organizer->name }}<br>
                        <strong>Email:</strong> {{ $event->organizer->email }}<br>
                        <strong>Телефон:</strong> {{ $event->organizer->phone }}
                    </p>
                </div>
            </div>

            <a href="{{ route('events.index') }}" class="btn btn-secondary">
                Обратно към списъка
            </a>
        </div>
    </div>
@endsection