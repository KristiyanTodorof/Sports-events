@extends('layouts.admin')

@section('title', 'Редактирай събитие')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Редактирай събитие</h1>

        <div class="card">
            <div class="card-body">
            <div class="alert alert-info mb-4">
               <small>* Всички полета маркирани със звездичка са задължителни</small>
            </div>
                <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Име на събитието</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $event->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sport_id" class="form-label">Спорт</label>
                        <select class="form-control @error('sport_id') is-invalid @enderror" id="sport_id" name="sport_id" required>
                            <option value="">Избери спорт</option>
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}" {{ (old('sport_id', $event->sport_id) == $sport->id) ? 'selected' : '' }}>
                                    {{ $sport->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sport_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="organizer_id" class="form-label">Организатор</label>
                        <select class="form-control @error('organizer_id') is-invalid @enderror" id="organizer_id" name="organizer_id" required>
                            <option value="">Избери организатор</option>
                            @foreach($organizers as $organizer)
                                <option value="{{ $organizer->id }}" {{ (old('organizer_id', $event->organizer_id) == $organizer->id) ? 'selected' : '' }}>
                                    {{ $organizer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('organizer_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Начало на събитието</label>
                        <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time', $event->start_time->format('Y-m-d\TH:i')) }}" required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Продължителност (минути)</label>
                        <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $event->duration) }}" required>
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $event->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($event->image_path)
                        <div class="mb-3">
                            <label class="form-label">Текущо изображение</label>
                            <div>
                                <img src="{{ Storage::url($event->image_path) }}" alt="Event image" style="max-width: 200px;" class="img-thumbnail">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="image" class="form-label">Ново изображение</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Обнови</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Отказ</a>
                </form>
            </div>
        </div>
    </div>
@endsection