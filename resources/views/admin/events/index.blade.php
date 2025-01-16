@extends('layouts.admin')

@section('title', 'Събития')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Събития</h1>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                Добави ново събитие
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
                            <th>Име на събитие</th>
                            <th>Вид спорт</th>
                            <th>Организатор</th>
                            <th>Дата и час</th>
                            <th>Времетраене</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->sport->name }}</td>
                                <td>{{ $event->organizer->name }}</td>
                                <td>{{ $event->start_time->format('d.m.Y H:i') }}</td>
                                <td>{{ $event->duration }} минути</td>
                                <td>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                        Редактирай
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
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

                {{ $events->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection