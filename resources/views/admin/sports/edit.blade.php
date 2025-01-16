@extends('layouts.admin')

@section('title', 'Редактирай спорт')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Редактирай спорт</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.sports.update', $sport) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Име</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $sport->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $sport->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Обнови</button>
                    <a href="{{ route('admin.sports.index') }}" class="btn btn-secondary">Отказ</a>
                </form>
            </div>
        </div>
    </div>
@endsection