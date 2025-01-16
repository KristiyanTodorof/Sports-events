@extends('layouts.admin')

@section('title', 'Спортове')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Спортове</h1>
            <a href="{{ route('admin.sports.create') }}" class="btn btn-primary">
                Добави нов спорт
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Име</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sports as $sport)
                            <tr>
                                <td>{{ $sport->id }}</td>
                                <td>{{ $sport->name }}</td>
                                <td>{{ $sport->description }}</td>
                                <td>
                                    <a href="{{ route('admin.sports.edit', $sport) }}" class="btn btn-sm btn-primary">
                                        Редактирай
                                    </a>
                                    <form action="{{ route('admin.sports.destroy', $sport) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Сигурни ли сте?')">
                                            Изтрий
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection