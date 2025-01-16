@extends('layouts.admin')

@section('title', 'Организатори')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Организатори</h1>
            <a href="{{ route('admin.organizers.create') }}" class="btn btn-primary">
                Добави нов организатор
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
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizers as $organizer)
                            <tr>
                                <td>{{ $organizer->id }}</td>
                                <td>{{ $organizer->name }}</td>
                                <td>{{ $organizer->email }}</td>
                                <td>{{ $organizer->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.organizers.edit', $organizer) }}" class="btn btn-sm btn-primary">
                                        Редактирай
                                    </a>
                                    <form action="{{ route('admin.organizers.destroy', $organizer) }}" method="POST" class="d-inline">
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